<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * UserVote Model
 * @author  Yifan Wu
 * @package Model
 */
class UserVote extends Model
{

	protected $table = 'vote_user_pivot';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'candidate_id'
    ];

    public function numberVoter($id){
        $number = DB::table('vote_user_pivot')
            ->where('candidate_id' , $id)
            ->get()
            ->count();
        return $number;
    }
}
