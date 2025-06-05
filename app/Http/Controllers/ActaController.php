<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActaController extends Controller
{
    public function seleccionarTipo()
    {
        $tipos = ['Acta de posesión', 'Acta de asamblea', 'Acta de donación'];
        return view('seleccionar_tipo_acta', compact('tipos'));
    }
}
