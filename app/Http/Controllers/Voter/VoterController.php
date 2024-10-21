<?php

namespace App\Http\Controllers\Voter;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use App\Models\Code;
use App\Models\Key;
use App\Models\User;
use App\Models\VoteList;
use Illuminate\Http\Request;

class VoterController extends Controller
{
    public function getData($query)
    {
        $data = [
            "title" => "",
            "item_id" => null,
            "code" => null,
            "public_key" => null,
            "is_started" => null,
            "description" => ""
        ];

        if ($query) {
            $item = Code::where('code' , $query->code)->first();
            $vote_list = VoteList::findOrFail($item->item_id);
            $data["title"] = $vote_list->title;
            $data["item_id"] = $vote_list->id;
            $data["code"] = $item->code;
            $data["public_key"] = $item->public_key;
            $data["is_started"] = $vote_list->is_started;
            $data["description"] = $vote_list->description;
        }

        return $data;
    }

    public function getVote(Request $request)
    {
//        $code = $this->getData($request->getAttribute('code'));
        $data = $this->getData($request);

//        return $data;
        return view('voter.home', compact('data'));
    }

    public function getStarted(Request $request)
    {
        $data = Code::where('code' , 'like' , $request->code)->first();
        $pub = $data->public_key;
        $item = VoteList::where('id' , $data->item_id)->first();

        if ( $item->is_started == '0') {
            if ($pub != '0') {
                return redirect()->route('vote.wait', compact('data'));
            } else {
                return redirect()->route('vote.fill', compact('data'));
            }
        } else {
            if ($pub != '0') {
                return redirect()->route('vote.vote', compact('data'));
            } else {
                return redirect()->route('vote.lost' ,compact('data'));
            }
        }
    }

    public function getFailed(Request $request)
    {
        return view('voter.fail');
    }

    public function getFillForm(Request $request)
    {
//        return $request;
        $item = Code::where('id' , $request->data)->first();
//        dd(item);
        $vote_list = VoteList::findOrFail($item->item_id);
        $data["title"] = $vote_list->title;
        $data["item_id"] = $vote_list->id;
        $data["code"] = $item->code;
        $data["public_key"] = $item->public_key;
        $data["is_started"] = $vote_list->is_started;
        $data["description"] = $vote_list->description;

        return view('voter.fill', compact('data'));
    }

    public function getWait(Request $request)
    {
        $item = Code::where('id' , $request->data)->first();
        if ($item->public_key == '0') {
//            $data = $request->data;
            return redirect()->route('vote.fill', compact('request'));
        }
        $data = $item;
        return view('voter.wait', compact('data'));
    }

    public function getCandidate(Request $request)
    {
//        dd($request);
        $item = Code::where('id' , $request->data)->first();
//        dd($item["item_id"]);
        $vote_list = VoteList::where('id',$item["item_id"])->first();
//        dd($vote_list);

        $data["title"] = $vote_list->title;
        $data["item_id"] = $vote_list->id;
        $data["code"] = $item->code;

        $key = Key::find(1)->first();

        $data["public_key"] = $item->public_key;
        $data["private_key"] = 'Paste your Private Key here';
        $data["eaddress"] = $key->bitcoin_address;

        $data["is_started"] = $vote_list->is_started;
        $data["description"] = $vote_list->description;
        $data['candidates'] = Candidate::where('vote_id' , $vote_list->id)->get();
//        return $data;
        return view('voter.vote', compact('data'));
    }

    public function getTally(Request $request)
    {
        $vote_item = (int) $request->input('vote_item');
        $eaddress = User::select('bitcoin_address')->where('id', 2)->first();
        if (!$vote_item) {
            return redirect()->route('tally.home');
        }

        $result = VoteList::findOrFail($vote_item);
        if (!$result) {
            return redirect()->route('tally.home');
        }

        return view('tally.tally', [
            'item_id' => $vote_item,
            'title' => $result->title,
            'eaaddress' => $eaddress->bitcoin_address
        ]);
    }

    public function getTallyHome()
    {
        $data = VoteList::all();
        return view('tally.home', compact('data'));
    }

    public function getVerify(Request $request)
    {
        $vote_item = (int) $request->input('vote_item');
        $eaddress = User::select('bitcoin_address')->where('id', 2)->first();
        if (!$vote_item) {
            return redirect()->route('verify.home');
        }

        $result = VoteList::findOrFail($vote_item);
        if (!$result) {
            return redirect()->route('verify.home');
        }

        return view('verify.verify', [
            'item_id' => $vote_item,
            'title' => $result->title,
            'eaaddress' => $eaddress->bitcoin_address
        ]);
    }

    public function getVerifyHome(Request $request, $response)
    {
        $data = VoteList::all();
        return view('verify.home', compact('data'));
    }
}
