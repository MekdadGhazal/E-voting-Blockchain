<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\Code;
use App\Models\Key;
use App\Models\VoteList;
use App\Models\User;
use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BallotController extends Controller
{
    public function getDashboard(Request $request, Response $response)
    {
        $data = auth()->user();
        $eaddress = User::select('bitcoin_address')->where('id', 2)->first();
        $voters = Code::count();

        return view('ra.dashboard', compact('data','eaddress', 'voters'));
    }

    public function getAddVoter(Request $request, Response $response)
    {
        $data = VoteList::all();
        return view('ra.addVoter', compact('data'));
    }

    public function getBallot(Request $request, Response $response)
    {
        $data = Code::all();
        return view('ra.ballot', compact('data'));
    }

    public function postBallot(Request $request, Response $response)
    {
        $code = new Code();
        $code->generateCode($request->input('number'), $request->input('item_id'));
        return redirect()->route('ra.ballot');
    }


    public function gen(){

        // Instantiate the BitcoinECDSA object
        $bitcoinECDSA = new BitcoinECDSA();

        // Set the network prefix to '6f' for Bitcoin testnet
        $bitcoinECDSA->setNetworkPrefix('6f'); // Testnet

        // Generate a new private key
        $privateKey = $bitcoinECDSA->generateRandomPrivateKey();

        // Derive the corresponding public key and address
        $publicKey = $bitcoinECDSA->getPubKey();
        $address = $bitcoinECDSA->getAddress();

        // Return the details (for testing/demo purposes)
        return response()->json([
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
            'address'    => $address
        ]);


//        // Instantiate the BitcoinECDSA object
//        $bitcoinECDSA = new BitcoinECDSA();
//
//        // Set the network prefix to '6f' for Bitcoin testnet
//        $bitcoinECDSA->setNetworkPrefix('6f'); // Testnet
//
//        // Generate a new private key
//        $privateKey = $bitcoinECDSA->generateRandomPrivateKey();
//
//        // Make sure to get the private key after generating it
//        $retrievedPrivateKey = $bitcoinECDSA->getPrivateKey();
//
//        // Derive the corresponding public key and address
//        $publicKey = $bitcoinECDSA->getPubKey();
//        $address = $bitcoinECDSA->getAddress();
//
//        // Return the details (for testing/demo purposes)
//        return response()->json([
//            'privateKey' => $retrievedPrivateKey, // Now the private key should not be null
//            'publicKey' => $publicKey,
//            'address'    => $address
//        ]);
    }
}
