<?php

namespace App\Models;

use BitcoinPHP\BitcoinECDSA\BitcoinECDSA;
use Illuminate\Database\Eloquent\Model;

use AsymmetriCrypt\Crypter;


class Key extends Model
{
    protected $table = 'keys';
    public $timestamps = false;

    protected $fillable = [
        'bitcoin_public_key',
        'bitcoin_private_key',
        'bitcoin_address',
        'is_used',
        'used_for'
    ];

    public function generateBitcoin($numbers, $item_id)
    {

         //Instantiate the BitcoinECDSA object
        $bitcoinECDSA = new BitcoinECDSA();
        // Set the network prefix to '6f' for Bitcoin testnet
        $bitcoinECDSA->setNetworkPrefix('6f'); // Testnet
        // Generate a new private key
        $privateKey = $bitcoinECDSA->generateRandomPrivateKey();
        // Make sure to get the private key after generating it
        $retrievedPrivateKey = $bitcoinECDSA->getPrivateKey();
        // Derive the corresponding public key and address
        $publicKey = $bitcoinECDSA->getPubKey();
        $address = $bitcoinECDSA->getAddress();
//        // Return the details (for testing/demo purposes)
//        return response()->json([
//            'privateKey' => $retrievedPrivateKey, // Now the private key should not be null
//            'publicKey' => $publicKey,
//            'address'    => $address
//        ]);

        $this->create([
            'bitcoin_private_key' => $retrievedPrivateKey, // Now the private key should not be null
            'bitcoin_public_key' => $publicKey,
            'bitcoin_address'    => $address,
            'is_used' => 0,
            'used_for' => $item_id,
            'is_paid' => 0 ,
        ]);

    }

}
