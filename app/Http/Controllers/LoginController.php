<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $token = auth()->user()->token;
            $request->session()->regenerate();
            if (auth()->user()->check == 0) {
                return redirect()->intended('/users_details/' . $token);
            }
            if (auth()->user()->level == 'admin') {
                return redirect()->intended('/dashboard-admin');
            }
            return redirect()->intended('/dashboard');
        }

        return back()->with('LoginError', 'Email/Password yang anda Masukan salah');
    }


    public function store(Request $request)
    {
        try {
            $validateData = $request->validate([
                'first_name' => 'required|min:3|max:50',
                'last_name' => 'required|min:3|max:50',
                'nohp' => 'required|min:9|max:15|unique:users',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255',
            ]);

            $validateData['full_name'] = $validateData['first_name'] . ' ' . $validateData['last_name'];
            $validateData['level'] = 'users';
            $validateData['password'] = bcrypt($validateData['password']);
            $validateData['token'] = Str::uuid();

            User::create($validateData);

            return redirect('/login')->with('RegisBerhasil', 'Akun Anda Berhasil di Buat');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            $uniqueEmailErrors = $errors->get('email');
            $uniqueNohpErrors = $errors->get('nohp');

            if (!empty($uniqueEmailErrors)) {
                // Notifikasi untuk email yang sudah ada
                return redirect('/login')->with('RegisError', 'Email/Nomer Hp sudah digunakan');
            } elseif (!empty($uniqueNohpErrors)) {
                // Notifikasi untuk nomor HP yang sudah ada
                return redirect('/login')->with('RegisError', 'Email/Nomer Hp sudah digunakan');
            }

            // Notifikasi untuk validasi lainnya
            return redirect('/login')->with('RegisError', 'Gagal mendaftar. Periksa kembali isian Anda.');
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
