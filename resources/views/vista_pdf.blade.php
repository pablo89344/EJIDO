<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acta de Posesión Ejidal</title>
    <style>
        @page {
            size: legal portrait;
            margin: 25mm 20mm 25mm 20mm;
        }

        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 11px;
            color: #000;
            line-height: 1.4;
        }

        h1, h2 {
            text-align: center;
            margin: 0;
        }

        h1 {
            font-size: 16px;
            text-transform: uppercase;
        }

        h2 {
            font-size: 13px;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 12px;
        }

        .text-justify {
            text-align: justify;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
        }

        th, td {
            border: 1px solid #000;
            padding: 4px;
        }

        .firmas {
            margin-top: 25px;
        }

        .firmas-table td {
            border: none;
            text-align: center;
            vertical-align: top;
            padding: 10px 5px;
        }

        .firmas-table img {
            max-height: 80px;
            object-fit: contain;
        }

        .firmas-titulo {
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 3px;
            display: block;
        }

        .firmas-nombre {
            margin-top: 5px;
            font-size: 11px;
        }
    </style>
</head>
<body>

    <h1>Ejido "Villa de Huetamo"</h1>
    <h2>Acta de Posesión de un Sitio Rústico Ejidal</h2>

    <div class="section">
        <p><strong>Folio:</strong> {{ $datos['folio'] }}</p>
       
    </div>

    <div class="section text-justify">
        <p>En la Ciudad de Huetamo, Municipio del mismo nombre, Estado de Michoacán, siendo las {{ $datos['hora'] }} horas del día {{ $datos['dia'] }} de {{ $datos['mes'] }} del año {{ $datos['anio'] }}, comparecen los CC. ...
 <strong>{{ $datos['nombre_cede'] }}</strong> y <strong>{{ $datos['nombre_recibe'] }}</strong>, con la finalidad de llevar a cabo la cesión de derechos de posesión de un sitio rústico ejidal ubicado en la <strong>colonia {{ $datos['colonia'] }}</strong>, correspondiente al Lote 8 Manzana 4, según el plano general del ejido.</p>

        <p>Una vez verificada la solicitud, y conforme a las facultades conferidas por la Ley Agraria en vigor, las autoridades ejidales se trasladan al sitio señalado para realizar la diligencia correspondiente. El predio será adjudicado al C. <strong>{{ $datos['nombre_recibe'] }}</strong>, mexicano, mayor de edad, originario y vecino de esta ciudad, bajo las siguientes colindancias:</p>
    </div>

    <div class="section">
        <h3 style="text-align:center;">Medidas y Colindancias</h3>
        <table>
            <tr>
                <th>Lado</th>
                <th>Medida</th>
                <th>Colindancia</th>
            </tr>
            <tr>
                <td>Norte</td>
                <td>{{ $datos['norte_medida'] }}</td>
                <td>{{ $datos['norte_colindancia'] }}</td>
            </tr>
            <tr>
                <td>Sur</td>
                <td>{{ $datos['sur_medida'] }}</td>
                <td>{{ $datos['sur_colindancia'] }}</td>
            </tr>
            <tr>
                <td>Oriente</td>
                <td>{{ $datos['oriente_medida'] }}</td>
                <td>{{ $datos['oriente_colindancia'] }}</td>
            </tr>
            <tr>
                <td>Poniente</td>
                <td>{{ $datos['poniente_medida'] }}</td>
                <td>{{ $datos['poniente_colindancia'] }}</td>
            </tr>
        </table>
    </div>

    <div class="section text-justify">
        <p>Concluido el procedimiento y no existiendo objeción por las partes, se levanta la presente acta para los fines legales correspondientes, firmando quienes en ella intervinieron para constancia de conformidad.</p>
    </div>

    <div class="firmas" style="margin-top: 40px;">
    <table class="firmas-table">
        <tr>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma_vigilante']) }}"><br>
                <strong>ERIBERTO ALMAZAN GOMEZ</strong><br>
                <em>Consejo de Vigilancia</em>
            </td>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma1']) }}"><br>
                <strong>MARIA NOHEMI CONEJO MALDONADO</strong><br>
                <em>Presidenta</em>
            </td>
        </tr>
        <tr>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma3']) }}"><br>
                <strong>ELIAS SANTANA AMARO</strong><br>
                <em>Tesorero</em>
            </td>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma2']) }}"><br>
                <strong>VIRGILIO SAUCEDO ARELLANO</strong><br>
                <em>Secretario</em>
            </td>
        </tr>
        <tr>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma_cede']) }}"><br>
                <strong>{{ $datos['nombre_cede'] }}</strong><br>
                <em>Cede Derechos</em>
            </td>
            <td>
                <img src="{{ public_path('storage/' . $datos['firma_recibe']) }}"><br>
                <strong>{{ $datos['nombre_recibe'] }}</strong><br>
                <em>Recibe Derechos</em>
            </td>
        </tr>
    </table>
</div>

</body>
</html>
