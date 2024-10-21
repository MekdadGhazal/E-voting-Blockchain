<?php

namespace App\Http\Controllers\EA;

use App\Http\Controllers\Controller;
use App\Models\Key;
use App\Models\VoteList;
use Illuminate\Http\Request;

class VoteAPIController extends Controller
{
    public function generateJson($success, $message, $param = null): \Illuminate\Http\JsonResponse
    {
        $return_message = [
            "success" => $success,
            "content" => $message,
            "param" => $param
        ];
        return response()->json($return_message);
    }


    public function getToggleVoting(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = (int) $request->input('vote_id');
        $vote = VoteList::where('id', $id)->first()->is_started;
        VoteList::where('id', $id)->update([
            'is_started' => ($vote + 1) % 2
        ]);
        return $this->generateJson('1', $vote, '');
    }

    public function getKeysList(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = (int) $request->input('id');
        $data = Key::where('used_for', $id)->get();
        return response()->json($data);
    }

    public function getProfile(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = VoteList::where('id', (int) $request->input('id'))->first();
        return $this->generateJson('1', $data, '');
    }

    public function postProfile(Request $request): \Illuminate\Http\JsonResponse
    {
        $query = VoteList::where('id', (int) $request->input('id'))->update([
            'title' => $request->input('title'),
            'number' => (int) $request->input('number'),
            'description' => $request->input('description')
        ]);

        if (!$query) {
            return $this->generateJson('0', 'error', '');
        }
        return $this->generateJson('1', 'This vote has been updated', '');
    }

}
