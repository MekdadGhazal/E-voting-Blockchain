<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\VoteList;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CandidateController extends Controller
{
    public function getAddCandidate(Request $request, Response $response)
    {
        $data = VoteList::all();
        return view('ra.addCandidate', compact('data'));
    }

    public function getCandidatesList(Request $request, Response $response)
    {
        $data = VoteList::all();
        return view('ra.candidates', compact('data'));
    }
}
