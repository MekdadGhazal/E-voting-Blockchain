<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function getChangePassword(Request $request, Response $response)
    {
        return view('auth.password.change');
    }

    public function postChangePassword(Request $request, Response $response)
    {
        $validator = Validator::make($request->all(), [
            'password_old' => ['required', 'string', 'min:6', function ($attribute, $value, $fail) use ($request) {
                if (!Hash::check($value, $request->user()->password)) {
                    $fail('The old password is incorrect.');
                }
            }],
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.password.change')->withErrors($validator)->withInput();
        }

        $user = $request->user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        $request->session()->flash('info', 'Your password has been changed.');

        return redirect()->route('home');
    }
}
