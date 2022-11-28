{{-- Eliminar al finalizar Pruebas
El objetivo de esta vista es crear la lógica para procesar las preguntas y obtener un resultado
con el controlador QuestionProcessing --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pruebas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <h1>Pruebas para el test</h1>
    <form action="/questionProcessing" method="POST">
        @csrf
        <ol>
            @foreach ($aptitudes as $item)
                <div>
                    <label>
                        <li>{{ $item->pregunta }}</li>
                    </label>
                    <br>
                    <label for="mucho">Mucho</label>
                    <input type="radio" checked class="radio" name="QApt{{ $item->id }}" id=""
                        value="2">
                    <label for="mucho">Poco</label>
                    <input type="radio" class="radio" name="QApt{{ $item->id }}" id="" value="1">
                    <label for="mucho">Nada</label>
                    <input type="radio" class="radio" name="QApt{{ $item->id }}" id="" value="0">
                </div>
            @endforeach
        </ol>
        <button
            class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Enviar</button>

    </form>

</body>

</html>
