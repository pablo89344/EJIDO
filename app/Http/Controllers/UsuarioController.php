<?php





//  funcionalidades del crud




namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios; // Asegúrate de importar el modelo correcto

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuarios::all(); // Obtener todos los usuarios
        return view('libros.usuarios', compact('usuarios'));
    }
//agregar
    public function store(Request $request)
{
    // Validar los campos requeridos
    $request->validate([
        'user_name' => 'required',
        'user_pass' => 'required|unique:usuarios',
        'user_tipo' => 'required|in:0,1', // Validar que el tipo sea 0 o 1
    ]);

    // Crear el nuevo usuario con el nombre, la contraseña y tipo seleccionado
    Usuarios::create([
        'user_name' => $request->user_name,
        'user_pass' => bcrypt($request->user_pass), // Se encripta la contraseña antes de guardarla
        'user_tipo' => $request->user_tipo, // Asignar el valor seleccionado al campo 'user_tipo'
    ]);

    return redirect()->route('usuarios.index');
}

//actualizar
public function update(Request $request, $id)
{
    // Buscar el usuario por su ID
    $usuario = Usuarios::findOrFail($id);

    // Validar los campos recibidos
    $validatedData = $request->validate([
        'user_name' => 'required',
        'user_pass' => 'nullable|min:6', // Contraseña es opcional, pero si se proporciona debe tener mínimo 6 caracteres
        'user_tipo' => 'required|in:0,1', // Validar que el tipo sea 0 o 1
    ]);

    // Si la contraseña fue proporcionada, la encriptamos
    if ($request->filled('user_pass')) {
        $validatedData['user_pass'] = bcrypt($request->user_pass);
    } else {
        // Si no se proporciona una nueva contraseña, se mantiene la anterior
        unset($validatedData['user_pass']);
    }

    // Actualizar los datos del usuario
    $usuario->update($validatedData);

    // Redirigir al índice de usuarios
    return redirect()->route('usuarios.index');
}

//eliminar
    public function destroy($id)
    {
        Usuarios::destroy($id);
        return redirect()->route('usuarios.index');
    }
}
