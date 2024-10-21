<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('codes')->insert([
            [
                'code' => 'A8HJITZHRNFWHY44',
                'is_used' => '0',
                'public_key' => '-----BEGIN PUBLIC KEY-----\nMIGeMA0GCSqGSIb3DQEBAQUAA4GMADCBiAKBgGiN7dW66rduseHR4VV85fkKRG7x\nvkgtHUVokNC6DjEPZCkEU3nwW6pjt5rhzevgF3+9WhCeJHiAnfq+taLNGftnhUNd\nrzNxWXitZxrDVMrOPjjQ5sxSBgxNK0OxwQJneySl9/1uy3CkjtT7MzynPukkMU36\nG3vGi5Jbpd7Y+ccjAgMBAAE=\n-----END PUBLIC KEY-----',
                'item_id' => 1,
                'user_id' => 0,
                'created_at' => '2017-08-15 11:16:29',
                'updated_at' => '2017-08-16 10:40:34'
            ],
            [
                'code' => 'MH3L8FSFUTKT5BTP',
                'is_used' => '1',
                'public_key' => '-----BEGIN PUBLIC KEY-----\nMIGeMA0GCSqGSIb3DQEBAQUAA4GMADCBiAKBgGnbYMwn6f9YWZF8z3nvpN4zmkAw\np1UHCaSHjL+pTVwaLl+svLhrUjzMrUHDgFktLNq9AqFzdesEXJmYQvu1Ri9n6hX7\n44APL0t7kcCC1vy36Z0IqVGToedNQHUNh2rhOAK3nniEfJApnKTM3qHmT1CRLv0+\ncQKJZrt7QVZtRTRlAgMBAAE=\n-----END PUBLIC KEY-----',
                'item_id' => 1,
                'user_id' => 0,
                'created_at' => '2017-08-15 11:16:35',
                'updated_at' => '2017-08-16 10:43:25'
            ]
        ]);
    }
}
