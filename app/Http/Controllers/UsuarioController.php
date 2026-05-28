<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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

    public function registrar(Request $request)
    {
        $request->validate([
        'nombre' => ['required', 'string', 'max:255'],
        'apellidos' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
        'password.confirmed' => 'Las contraseñas no coinciden.',
        'email.unique' => 'Este correo ya está registrado en nuestro sistema.',
        'password.min' => 'La contraseña debe tener al menos 6 caracteres.'
        ]);

        $usuario = \App\Models\Usuario::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin' => false
        ]);

        Auth::login($usuario);
        $request->session()->regenerate();
        return redirect('/')->with('status', 'Cuenta creada correctamente');
    }

    public function cerrar_sesion(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('status', 'Has cerrado sesión correctamente.');
    }

    public function ver_perfil()
    {
        $usuario = Auth::user();
        return view('perfil', compact('usuario'));
    }

    public function actualizar_perfil(Request $request)
    {
        $usuario = Auth::user();
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('usuarios')->ignore($usuario->id)],
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;

        if ($request->filled('contraseña_nueva')) {
            $request->validate([
                'contraseña_actual' => ['required'],
                'contraseña_nueva' => ['required', 'string', 'min:6'],
                'contraseña_nueva_2' => ['required', 'same:contraseña_nueva']
            ], 
            [
                'contraseña_actual.required' => 'Debe introducir la contraseña actual',
                'contraseña_nueva.min' => 'La nueva contraseña posee menos de 6 caracteres',
                'contraseña_nueva_2.required' => 'Las contraseñas no coinciden',
                'contraseña_nueva_2.same' => 'Las contraseñas no coinciden'
            ]);

            // Si la contraseña no es correcta devuelve error
            if (!Hash::check($request->contraseña_actual, $usuario->getAuthPassword())) {
                return back()->withErrors(['contraseña_actual' => 'La contraseña actual no es correcta.']);
            }
            $usuario->password = Hash::make($request->contraseña_nueva);
        }

        $usuario->save();
        return back()->with('status', 'Perfil actualizado correctamente.');
    }
}