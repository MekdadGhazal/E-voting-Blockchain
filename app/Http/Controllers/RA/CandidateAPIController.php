<?php

namespace App\Http\Controllers\RA;

use App\Http\Controllers\Controller;
use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateAPIController extends Controller
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

        public function getCandidates(Request $request): \Illuminate\Http\JsonResponse
        {
            $data = Candidate::where('vote_id', (int) $request->input('vote_id'))->get();
            return $this->generateJson('1', $data, '');
        }

        public function postAddCandidate(Request $request): \Illuminate\Http\JsonResponse
        {
            $candidate = new Candidate();
            $candidate->addCandidate(
                $request->input('name'),
                $request->input('des'),
                (int) $request->input('vote_id')
            );
            //
//            Candidate::create([
//                'name' => $request->input('name'),
//                'des' => $request->input('des'),
//                'vote_id' => (int) $request->input('vote_id')
//            ]);
            return $this->generateJson('1', 'This candidate has been added', '');
        }

        public function postUpdateCandidate(Request $request): \Illuminate\Http\JsonResponse
        {
            $candidate = new Candidate();
            $query = $candidate->where('id', (int) $request->input('id'))->first();
            if (!$query) {
                return $this->generateJson('0', 'The candidate does not exist', '');
            }

            $query->updateCandidate(
                $request->input('name'),
                $request->input('des')
            );
            return $this->generateJson('1', 'This candidate has been updated', '');
        }

        public function postDelCandidate(Request $request): \Illuminate\Http\JsonResponse
        {
            $candidate = new Candidate();
            $candidate->delCandidate(
                (int) $request->input('id')
            );
            return $this->generateJson('1', 'This candidate has been deleted', '');
        }
}
