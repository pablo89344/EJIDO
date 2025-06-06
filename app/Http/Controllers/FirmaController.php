<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class FirmaController extends Controller
{
    public function mostrarFormulario()
    {
        return view('formulario');
    }

    public function procesarFormulario(Request $request)
    {
        // Validación de campos
        $request->validate([
            'folio' => 'required|string|max:255',
            'hora' => 'required|string|max:10',
            'dia' => 'required|string|max:20',
            'mes' => 'required|string|max:20',
            'anio' => 'required|integer|min:1900|max:2100',

            'nombre_cede' => 'required|string|max:255',
            'nombre_recibe' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',

            'norte_medida' => 'required|string|max:50',
            'norte_colindancia' => 'required|string|max:255',
            'sur_medida' => 'required|string|max:50',
            'sur_colindancia' => 'required|string|max:255',
            'oriente_medida' => 'required|string|max:50',
            'oriente_colindancia' => 'required|string|max:255',
            'poniente_medida' => 'required|string|max:50',
            'poniente_colindancia' => 'required|string|max:255',

            'firma1' => 'required|image',
            'firma2' => 'required|image',
            'firma3' => 'required|image',
            'firma_cede' => 'required|image',
            'firma_recibe' => 'required|image',
            'firma_vigilante' => 'required|image',
        ]);

        // Captura de datos
        $datos = $request->only([
            'folio', 'hora', 'dia', 'mes', 'anio',
            'nombre_cede', 'nombre_recibe', 'colonia',
            'norte_medida', 'norte_colindancia',
            'sur_medida', 'sur_colindancia',
            'oriente_medida', 'oriente_colindancia',
            'poniente_medida', 'poniente_colindancia',
        ]);

        // Guardar firmas en /storage/app/public/firmas
        $datos['firma1'] = $request->file('firma1')->store('firmas', 'public');
        $datos['firma2'] = $request->file('firma2')->store('firmas', 'public');
        $datos['firma3'] = $request->file('firma3')->store('firmas', 'public');
        $datos['firma_cede'] = $request->file('firma_cede')->store('firmas', 'public');
        $datos['firma_recibe'] = $request->file('firma_recibe')->store('firmas', 'public');
        $datos['firma_vigilante'] = $request->file('firma_vigilante')->store('firmas', 'public');

        // Generar PDF a partir de la vista
        $pdf = Pdf::loadView('vista_pdf', compact('datos'));

        // Nombre del archivo
        $nombreArchivo = 'acta_' . $datos['folio'] . '.pdf';

        // Guardar el PDF en storage/app/public/actas/
        Storage::disk('public')->put('actas/' . $nombreArchivo, $pdf->output());

        // Guardar los datos en JSON para futuras consultas
        Storage::disk('public')->put('actas_json/' . $datos['folio'] . '.json', json_encode($datos));

        // Redirigir a vista que muestra el PDF embebido
        return view('previsualizar', [
            'nombreArchivoPDF' => $nombreArchivo,
            'folio' => $datos['folio'],
            'nombre_recibe' => $datos['nombre_recibe'] // ✅ Se incluye para evitar error
        ]);
    }

    public function previsualizar($folio)
    {
        $ruta = 'actas_json/' . $folio . '.json';

        if (!Storage::disk('public')->exists($ruta)) {
            abort(404, 'El acta no fue encontrada.');
        }

        $contenido = Storage::disk('public')->get($ruta);
        $datos = json_decode($contenido, true);

        $nombreArchivoPDF = 'acta_' . $folio . '.pdf';

        return view('previsualizar', [
            'nombreArchivoPDF' => $nombreArchivoPDF,
            'folio' => $folio,
            'nombre_recibe' => $datos['nombre_recibe']
        ]);
    }
}
