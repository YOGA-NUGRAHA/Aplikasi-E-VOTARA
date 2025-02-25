<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }
    
    function login(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'password' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong',
        ]);
    
        $credentials = $request->only('nama', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->role == 'siswa') {
                Alert::success('Login Berhasil', 'Selamat datang');
                return redirect()->intended('/Voting-Osis')->with('success', 'Login Berhasil');
            } elseif ($user->role == 'admin') {
                Alert::success('Login Berhasil', 'Selamat datang, ');
                return redirect()->intended('/admin')->with('success', 'Login Berhasil');
            }            
        }
        
        return back()
        ->withErrors('Oops! Salah input nih. Coba cek lagi username atau password kamu, ya. 😉')
        ->withInput();
    }
    
    public function logout()
    {
        
        Auth::logout();
        return redirect('/')->with('logout', 'Logout Berhasil');
    }
}
