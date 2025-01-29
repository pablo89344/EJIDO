<?php

//codigo para identificar si es usuario tipo 0 o 1 


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
        $credentials = $request->only('user_name', 'user_pass');
        
        $user = Usuarios::where('user_name', $credentials['user_name'])->first();
        
        if ($user && Hash::check($credentials['user_pass'], $user->user_pass)) {
            Auth::login($user);
            Log::debug('User logged in: ' . $user->user_name);
    
            // Verifica si el tipo de usuario es 1
            if ($user->user_tipo == 1) {
                return redirect()->intended('/usuarios'); // Redirige a la ruta deseada si el tipo es 1
            } else {
                return redirect()->intended('/secretario'); // Redirige a otra ruta si el tipo no es 1
            }
        }
    
        return back()->withErrors(['user_name' => 'Las credenciales no coinciden con nuestros registros']);
    }
    
    

    public function logout(Request $request)
    {
        Auth::guard('usuarios  ')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('login');
    }
    public function secretario()    
    {
        return view('libros/secretario'); // Retorna la vista para crear un libro
    }

   

}


