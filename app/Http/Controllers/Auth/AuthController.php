<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Code;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getSignOut(Request $request, Response $response)
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function getSignIn(Request $request, Response $response)
    {
        return view('auth.signin');
    }

    public function postSignIn(Request $request, Response $response)
    {
        $credentials = $request->only('username', 'password');

        if (!auth()->attempt($credentials)) {
            session()->flash('error', 'Please check your username or password');
            return redirect()->route('auth.signin');
        }

        return redirect()->route('auth.dashboard');
    }

    public function getSignUp(Request $request, Response $response)
    {
        return view('auth.signup');
    }

    public function postSignUp(Request $request, Response $response)
    {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'unique:users', 'min:6'],
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('auth.signup')->withErrors($validator)->withInput();
        }

        $user = User::create([
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'role' => 2
        ]);

        session()->flash('info', 'You have been signed up');

        auth()->login($user);

        return redirect()->route('home');
    }

    public function getDashboard(Request $request, Response $response)
    {
        $role = auth()->user()->role;

        if ($role == 1) {
            return redirect()->route('ra.dashboard');
        }

        if ($role == 2) {
            return redirect()->route('ea.dashboard');
        }
    }
}
