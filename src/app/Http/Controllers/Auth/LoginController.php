<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('auth.login'); // login.blade.php を表示
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'email'],
    //         'password' => ['required'],
    //     ]);

    //     if (Auth::attempt($credentials)) {
    //         $request->session()->regenerate();
    //         return redirect()->route('contacts.index');
    //     }

    //     return back()->withErrors([
    //         'email' => 'メールアドレスかパスワードが違います。',
    //     ]);
    // }

    public function login(Request $request)
    {
        $request->session()->forget('url.intended'); // ← これで Laravel の記憶を消す！

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('contacts.index');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが違います。',
        ]);
    }
}
