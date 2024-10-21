<?php

namespace App\Http\Controllers\EA;

use App\Http\Controllers\Controller;
use App\Models\VoteList;
use App\Models\Code;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class VoteController extends Controller
{
    public function getDashboard(Request $request, Response $response)
    {
        $data = auth()->user();
        $data["items"] = VoteList::count();
        $data["voters"] = Code::where('public_key', '<>', '0')->count();
//        $vote = VoteList::where('is_started', '1')->get();
        $vote = VoteList::get();
        return view('ea.dashboard', compact('data' , 'vote' ));
    }

    public function getVoteList(Request $request, Response $response)
    {
        $data = VoteList::all();

        return view('ea.vote', compact('data'));
    }

    public function getAddVote(Request $request, Response $response)
    {
        return view('ea.addVote');
    }

    public function postVote(Request $request, Response $response)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'number' => 'required|numeric|min:0',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('ea.addVote')->withErrors($validator)->withInput();
        }

        $voteItem = VoteList::create([
            'title' => $request->input('title'),
            'number' => $request->input('number'),
            'description' => $request->input('description')
        ]);

        // Code::useCode($user->id, $request->input('code'));
        return redirect()->route('ea.vote');
    }
}
