<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = [
            'title' => 'login',
        ];
        if ($request->method() === 'GET') {
            return view('login', $data);
        } elseif ($request->method() === 'POST') {
            $credential = $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);
            if (Auth::attempt($credential)) {
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }
            return back()->with('loginError', 'Login Failed!');
        }
    }
    public function register(Request $request)
    {
        $data = [
            'title' => 'Register',
        ];
        if ($request->method() === 'GET') {
            return view('register', $data);
        } elseif ($request->method() === 'POST') {
            $credential = $request->validate([
                'name' => 'required',
                'username' => 'required',
                'password' => 'required',
                'confirmPassword' => 'required',
            ]);
            if ($credential['password'] !== $credential['confirmPassword']) {
                return session()->flash('registerError', 'Password Doesn\'t match!');
            }
            $credential['password'] = Hash::make($credential['password']);
            User::create($credential);
            redirect('/');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
