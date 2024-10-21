<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('votes')->insert([
            [
                'id' => 1,
                'title' => '2017 Student Union Election',
                'number' => 10,
                'is_started' => '1',
                'created_at' => '2017-08-05 23:51:06',
                'updated_at' => '2017-08-16 10:38:05',
                'network' => null,
                'description' => '<p>The <b>University of Birmingham Guild of Students</b> (previously <b>Birmingham University Guild of Students</b>; <b>BUGS</b>) is the officially recognised body that represents around 34,000 students at the <a href=\"/wiki/University_of_Birmingham\" title=\"University of Birmingham\">University of Birmingham</a>. The Guild functions as a <a href=\"/wiki/Students%27_union\" title=\"Students\' union\">students\' union</a> as per the <a href=\"/wiki/Education_Act_1994\" title=\"Education Act 1994\">Education Act 1994</a>.</p><p>The Guild provides representation to all students at the University and campaigns to create change on issues affecting students at a local and national level. This is achieved through regular meetings with University Senior Officers and Managers, as well as through lobbying Birmingham City Council, the Government and other bodies. The Guild also runs campaigns focused on particular issues; recent campaigns have included a drive to see wheelie bins across the city, an initiative to improve campus security and have the University install CCTV across all halls of residence, and strong participation in the <a href=\"/wiki/National_Union_of_Students_(United_Kingdom)\" title=\"National Union of Students (United Kingdom)\">NUS</a> campaign against the introduction of £3,000 top-up fees (a campaign that continues, despite the measure being approved by Parliament in January 2004).</p><p class=\"button-right\"><img alt=\"Birmingham guild of students logo.gif\" src=\"//upload.wikimedia.org/wikipedia/en/thumb/f/ff/Birmingham_guild_of_students_logo.gif/250px-Birmingham_guild_of_students_logo.gif\" width=\"250\" height=\"71\" srcset=\"//upload.wikimedia.org/wikipedia/en/f/ff/Birmingham_guild_of_students_logo.gif 1.5x\" data-file-width=\"311\" data-file-height=\"88\"></p>'
            ],
            [
                'id' => 2,
                'title' => 'Business Meeting Proposal',
                'number' => 5,
                'is_started' => '0',
                'created_at' => '2017-08-09 02:23:55',
                'updated_at' => '2017-09-04 04:23:14',
                'network' => null,
                'description' => 'This is a business meeting proposal to decide the direction of our company.\nPlease vote for your choice.'
            ],
            [
                'id' => 3,
                'title' => 'A test voting',
                'number' => 2,
                'is_started' => '1',
                'created_at' => '2017-08-15 21:31:59',
                'updated_at' => '2017-08-16 00:59:07',
                'network' => null,
                'description' => 'A test for voting'
            ],
            [
                'id' => 4,
                'title' => 'Test',
                'number' => 10,
                'is_started' => '1',
                'created_at' => '2017-08-16 12:00:58',
                'updated_at' => '2017-08-20 08:19:50',
                'network' => '',
                'description' => 'Test!!!'
            ],
            [
                'id' => 5,
                'title' => 'A test voting for demo',
                'number' => 2,
                'is_started' => '1',
                'created_at' => '2017-08-21 10:25:08',
                'updated_at' => '2017-08-21 10:26:27',
                'network' => null,
                'description' => null
            ]
        ]);
    }
}
