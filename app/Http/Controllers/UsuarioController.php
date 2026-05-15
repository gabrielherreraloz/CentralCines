<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function inicio_sesion(Request $request)
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required']]);

        // Si es correcto, inicia sesion
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('status', '¡Bienvenido de nuevo!');
        }

        // Si no es correcto, devuelve un error
        return back()->withErrors(['email' => 'Las credenciales no coinciden con nuestros registros.',])->onlyInput('email');
    }

    public function cerrar_sesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Has cerrado sesión correctamente.');
    }
}