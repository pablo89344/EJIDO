<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrosController extends Controller
{
    // Eliminamos el middleware del constructor que valida la sesión
    public function __construct()
    {
        // No se aplica middleware, por lo que las rutas serán accesibles sin importar si se inició sesión correctamente o no.
    }

    // Función que maneja la vista de creación de libros
/*     public function crear()
    {
        return view('libros.crear'); // Retorna la vista para crear un libro
    } */

    // Otras funciones pueden ir aquí...


    
    
    public function welcome()
    {
        return view('welcome'); // Retorna la vista para crear un libro
    }



}



