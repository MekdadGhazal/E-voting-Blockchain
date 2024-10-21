<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;

use App\Models\Code;
use App\Models\Signatures;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\VoteList;
use App\Models\Key;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class PublicAPIController extends Controller
{
    public function generateJson($success, $message, $param = null): JsonResponse
    {
        $return_message = [
            "success" => $success,
            "content" => $message,
            "param" => $param
        ];
        return response()->json($return_message);
    }

    public function isStarted($id): bool
    {
        return VoteList::all()->where('id', $id)->first()->is_started == '1';
    }

    public function getBitcoinAddress(Request $request): JsonResponse
    {
        $id = $request->input('item_id');
        $data = Key::select('id', 'bitcoin_address', 'is_paid')
            ->where('used_for', $id)
            ->where('is_used', '0')
            ->get();

        if ($data) {
            return $this->generateJson('1', $data, $data->count());
        } else {
            return $this->generateJson('0', ["content" => 'Failed']);
        }
    }

    public function getAllBitcoinAddress(Request $request): JsonResponse
    {
        $id = $request->input('item_id');
        $data = Key::select('id', 'bitcoin_address', 'is_paid')
            ->where('used_for', $id)
            ->get();

        if ($data) {
            return $this->generateJson('1', $data, $data->count());
        } else {
            return $this->generateJson('0', ["content" => 'Failed']);
        }
    }

    public function getEABitcoinAddress(Request $request): JsonResponse
    {
        $data = User::select('bitcoin_address')->where('id', '2')->get();

        if ($data) {
            return $this->generateJson('1', $data, $data->count());
        } else {
            return $this->generateJson('0', ["content" => 'Failed']);
        }
    }

    public function postPubKey(Request $request)
    {
        try {
            $code = $request->code;

            $validator = Validator::make($request->all(), [
                'public_key' => 'required|string' ,
            ]);

            if ($validator->fails()) {
                return $this->generateJson('0', "Have you generated a correct public key? Try again!");
            }

            $public_key = base64_decode($request['public_key']);

            $item = Code::where('code', "like",  $code)->first();

            if (!$item) {
                return $this->generateJson('0', "Invalid code provided.");
            }
            $itemId = $item->item_id;

            if (VoteList::where('id' , $itemId)->first()->is_started) {
                return $this->generateJson('0', "The voting has started, the system cannot update or save your keys.");
            }
            $item->update([
                'public_key' => $public_key
            ]);
            return $this->generateJson('1', "Your public key has been updated");

        } catch (\Exception $e) {
            return response()->json(['success' => '0', 'content' => "An error occurred: " . $e->getMessage()]);
        }
    }

    public function postSigPair(Request $request)
    {

//        return response()->json(['success' => '0', 'content' => $request]) ;

        $sig = $request->input('sig');
        $hash = sha1($sig);
        $signatures = new Signatures();
        $signatures->setSigPair($sig, $hash);
        return $this->generateJson('1', 'Your signature and sha1(sig) has been saved into our system');
    }

    public function getSigPair(Request $request): JsonResponse
    {
        $hash = $request->input('hash');
        $signatures = new Signatures();
        $query = $signatures->where('sig_hash', $hash)->first();
        if (!$query) {
            return $this->generateJson('0', 'Fetch error');
        }
        return $this->generateJson('1', $query);
    }

    public function getAllPubKeys(Request $request): JsonResponse
    {
        $id = $request->input('item_id');
        $query = new Code();

        $data = $query->select('public_key')->where([
            ['item_id', '=', $id],
            ['public_key', '<>', '0']
        ]);

        if ($code = $request->input('code')) {
            $data = $data->where('code', '<>', $code);
        }

        return $this->generateJson('1', $data->get());
    }

    public function getBitCoinPriv(Request $request)
    {

//        return response()->json([
//            'success' => '1',
//            'content' => $request->all() // Capture all incoming data
//        ]);

        // Validate that the request contains the necessary data
//        $request->validate([
//            'bitcoin_address' => 'required|string',
//            'code' => 'required|string',
//            'sig' => 'required|string',
//        ]);
//        dd($request->all());
        $id = $request->input('bitcoin_address');
        $codeInput = $request->input('code');

        // Fetch the bitcoin key data
        $data = Key::where('id', $id)->first();

        // Check if the bitcoin address is available and unused
        if ($data && $data->is_used == '0') {
            // Update the code to mark it as used
            $codeUpdated = Code::where('code', $codeInput)->update([
                'is_used' => 1
            ]);

            // Check if the code update was successful
            if (!$codeUpdated) {
                return $this->generateJson('0', 'There is something wrong with your code');
            }

            // Mark the bitcoin key as used
            $data->update([
                'is_used' => 1
            ]);

            dd($data);

            // Return the bitcoin key data
            return $this->generateJson('1', $data, '');
        }

        // If the bitcoin address has already been used
        return $this->generateJson('0', 'Your bitcoin address has been used, please select another one');
    }

}
