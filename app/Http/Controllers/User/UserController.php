<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        $title = 'Dashboard';
        return view('user.index', compact('title'));
    }
    public function loginScreen()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password]) || Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            if (Auth::user()->delete == 0 && Auth::user()->active == 1)
                return redirect()->route('user.user')->with('success', 'Welcome!');
            else Auth::logout();
        }
    }

    public function registerScreen()
    {
        return view('user.register');
    }

    public function profileScreen() {}

    public function changeProfileSettings() {}

    public function changePassword() {}

    public function logout() {}
}
