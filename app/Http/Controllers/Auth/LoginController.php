<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'user_pass');
        
        // Buscar el usuario por correo
        $user = Usuarios::where('correo', $credentials['correo'])->first();

        // Si el usuario existe y la contraseña es correcta
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            Auth::login($user);
            Log::debug('User logged in: ' . $user->user_name);

            // Verifica si el tipo de usuario es 1 (administrador)
            if ($user->user_tipo == 1) {
                return redirect()->intended('/welcome'); // Redirige a la ruta deseada si el tipo es 1
            } else {
                return redirect()->intended('/secretario'); // Redirige a otra ruta si el tipo no es 1
            }
        }

        // Si el usuario no existe o la contraseña es incorrecta, mostrar un mensaje de error
        if (!$user) {
            return back()->withErrors(['correo' => 'El correo no está registrado.'])->withInput();
        }

        // Si la contraseña no es correcta
        return back()->withErrors(['user_pass' => 'La contraseña es incorrecta.'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::guard('usuarios')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }

    public function secretario()
    {
        return view('libros/secretario'); // Retorna la vista para crear un libro
    }
}
