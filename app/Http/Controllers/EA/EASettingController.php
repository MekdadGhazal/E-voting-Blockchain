<?php

namespace App\Http\Controllers\EA;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EASettingController extends Controller
{
    public function getSetting(Request $request, Response $response)
    {
        $user = auth()->user();
        return view('ea.setting', compact('user'));
    }

    public function postSetting(Request $request, Response $response)
    {

        $user = auth()->user();
        $user->setBitcoinAddress($request->input('address'));
        $user->setPrivkey($request->input('pubkey'));
        $user->update([
            'network' =>($request->network == 'testnet' ? 0 : 1),
        ]);

        // Flash message
        $request->session()->flash('info', 'Your settings have been updated.');

        return redirect()->route('ea.setting');
    }
}
