{{-- Eliminar al finalizar Pruebas
El objetivo de esta vista es crear la lógica para procesar las preguntas y obtener un resultado
con el controlador QuestionProcessing --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
</head>

<body>
    <table>
        <tr>
            <th>Carrera</th>
        </tr>
        @if (session('carreras'))
            @foreach (session('carreras') as $carrera)
                <tr>
                    <td>{{ $carrera->nombre }}</td>
                </tr>
            @endforeach
        @elseif(session('mensaje'))
            <tr>
                <td>No hay ninguna carrera que te haga match en este centro universitario</td>
            </tr>
        @endif
    </table>
</body>

</html>
