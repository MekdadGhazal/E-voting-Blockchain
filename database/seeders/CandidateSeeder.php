<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            ['name' => 'Tanno Tom', 'des' => 'I can lead you to the future.', 'vote_id' => 1],
            ['name' => 'Yifan Wu', 'des' => 'Please vote me!', 'vote_id' => 1],
            ['name' => 'Taylor Hayward', 'des' => 'I love you guys', 'vote_id' => 1],
            ['name' => 'Rhys Scott', 'des' => 'Vote me! Vote me!', 'vote_id' => 1],
            ['name' => 'Andrew Phillips', 'des' => 'No reasons', 'vote_id' => 1],
            ['name' => 'Fernando Arcuri', 'des' => 'For the future of student life ', 'vote_id' => 1],
            ['name' => 'Jorrin Colak', 'des' => 'Listen your voice and vote me now!', 'vote_id' => 1],
            ['name' => 'Fauna Lécuyer', 'des' => 'For a better life!', 'vote_id' => 1],
            ['name' => 'Candidate A', 'des' => 'Vote me', 'vote_id' => 3],
            ['name' => 'Fire Yifan', 'des' => 'He is so lazy when working.', 'vote_id' => 2],
            ['name' => 'Fire Alex', 'des' => 'He\'s always late', 'vote_id' => 2],
            ['name' => 'Candidate B', 'des' => 'VOOOOO', 'vote_id' => 3],
            ['name' => 'Test', 'des' => '', 'vote_id' => 4],
        ]);
    }
}
