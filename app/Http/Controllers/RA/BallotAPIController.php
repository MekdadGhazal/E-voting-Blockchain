<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Mail\sendCodeMail;
use App\Models\Code;
use App\Models\Key;
use App\Models\User;
use App\Models\VoteList;
use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class BallotAPIController extends Controller
{
    public function generateJson($success, $message, $param = null): \Illuminate\Http\JsonResponse
    {
        $return_message = [
            "success" => $success,
            "content" => $message,
            "param" => $param
        ];
        return response()->json($return_message);
    }

    public function postAddVoter(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = ['success' => '0'];
        $email = $request->input('email');
        $firstname = $request->input('firstname');
        $vote_id = $request->input("vote_id");

        $vote_item = $this->getVoteTitle($vote_id);
        $code = new Code();
        $codeId = $code->generateCode(1, $vote_id);

        Mail::to($email)->send(new sendCodeMail($email, $firstname, $codeId, $vote_item));

        $key = new Key();
        $key->generateBitcoin(1 , $vote_id);

        return $this->generateJson(1 , $data, '');
    }

    public function getVoteTitle(int $id): string
    {
        $result = VoteList::where('id', $id)->first();
        return $result->title;
    }


    public function generateBitcoin($numbers, $item_id){
        $bitcoinECDSA = new BitcoinECDSA();

        $bitcoinECDSA->setNetworkPrefix('6f'); //testnet
        for($i=0;$i<$numbers;$i++){
            $bitcoinECDSA->generateRandomPrivateKey();
            $this->create([
                'bitcoin_private_key' =>  $bitcoinECDSA-> getWif(),
                'bitcoin_public_key' => $bitcoinECDSA->getPubKey(),
                'bitcoin_address' => $bitcoinECDSA->getAddress(),
                'is_used' => '0',
                'used_for' => $item_id
            ]);
        }
    }
}
