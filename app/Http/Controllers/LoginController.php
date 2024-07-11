<?php

namespace App\Http\Controllers;

use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->to('home');
        }
        Alert::error('Upss', 'Mohon periksa email dan password anda!');
        return back();
    }

    public function register()
    {
        return view('register');
    }

    public function actionRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($request->all());
        Alert::success('Daftar berhasil', 'Success Message');
        return redirect()->to('register')->with('success', 'Daftar berhasil');
    }
}
