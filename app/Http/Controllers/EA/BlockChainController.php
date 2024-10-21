<?php

namespace App\Http\Controllers\EA;

use App\Http\Controllers\Controller;
use App\Models\VoteList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlockChainController extends Controller
{
    public function getBalanceList(Request $request, Response $response)
    {
        $data = VoteList::all();
        return view('ea.balance', compact('data'));
    }

    public function getFeeList(Request $request, Response $response)
    {
        $data = VoteList::all();
        $user = auth()->user();
        return view('ea.fee', compact('data' , 'user'));
    }
}
