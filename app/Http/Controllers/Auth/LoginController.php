<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm() {
        return view('auth.login'); // Jūsų forma yra main.blade.php faile
    }

    //
    public function login(Request $request) {
        // 1. Validuojame 'email' (nes toks yra name="email" jūsų formoje)
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. KLAIDOS TAISYMAS: Naudojame $credentials kintamąjį tiesiogiai
        // Tai automatiškai paims 'email' ir 'password' iš užklausos
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->isAdmin()) {
                return redirect('/admin');
            }

            if ($user->role === 'employee') {
                return redirect()->route('employee.index');
            }

            return redirect()->intended('/');
        }

        // 3. Jei nepavyko, grąžiname klaidą tam pačiam 'email' laukeliui
        return back()->withErrors(['email' => 'Neteisingi duomenys.']);
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 3. Po atsijungimo – iškart į login formą
        return redirect()->route('login');
    }
}
