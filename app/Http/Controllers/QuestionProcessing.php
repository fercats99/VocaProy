<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\QuestionRoute;
use Illuminate\Http\Request;

class QuestionProcessing extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = QuestionRoute::All();
        return view('questionTest.index', compact('route'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $realista = self::tipo($request, 're');
        $cientifico = self::tipo($request, 'ci');
        $convencional = self::tipo($request, 'co');
        $artistico = self::tipo($request, 'ar');
        $social = self::tipo($request, 'so');
        $emprendedor = self::tipo($request, 'em');
        $rutas = [
            'realista' => $realista, 'cientifico' => $cientifico,
            'convencional' => $convencional, 'artistico' => $artistico,
            'social' => $social, 'emprendedor' => $emprendedor
        ];
        // Ordena de mayor a menor el arreglo
        arsort($rutas);

        // Usamos el bucle para saber si hay valores iguales después del 3 valor
        // para saber los tipos de personalidad que usaremos
        // Según el test deben ser los primeros 3, y en este caso contemplamos que existan
        // tipos de personalidad que puedan empatar con la 3 personalidad
        $numPersonalidades = 2;
        while ($numPersonalidades < count($rutas)) {
            if (array_values($rutas)[$numPersonalidades] < array_values($rutas)[$numPersonalidades - 1]) {
                print(array_keys($rutas)[$numPersonalidades]);
                break;
            }
            $numPersonalidades++;
        }
        $tipoPersonalidad = [];
        for ($i = 0; $i < $numPersonalidades; $i++) {
            $tipo = array_keys($rutas)[$i];
            array_push($tipoPersonalidad, $tipo);
            print($tipoPersonalidad[$i]);
        }
        $personalidad = ['cientifico', 'artistico', 'realista'];
        $ambienteLaboral = ['cientifico', 'realista', 'convencional'];
        $aptitud = ['naturalista', 'logico-matematica', 'viso-espacial'];
        $carrera = Carrera::whereIn('personalidad1', $personalidad)->WhereIn('personalidad2', $personalidad)->WhereIn('personalidad3', $personalidad)->get();
        $carrera = $carrera->whereIn('ambienteLaboral1', $ambienteLaboral)->whereIn('ambienteLaboral2', $ambienteLaboral)->whereIn('ambienteLaboral3', $ambienteLaboral);
        $carrera = $carrera->WhereIn('aptitud1', $aptitud)->WhereIn('aptitud2', $aptitud)->WhereIn('aptitud3', $aptitud);
        dd($carrera);
        dd(array_values($rutas)[0]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function tipo($request, $tipo)
    {
        $i = 0;

        //re = relistico
        //ci = cientifico
        //co = convencional
        //ar = artistico
        //so = social
        //em = emprendedor

        if ($tipo == 're') {
            $i = 1;
        } elseif ($tipo == 'ci') {
            $i = 2;
        } elseif ($tipo == 'co') {
            $i = 3;
        } elseif ($tipo == 'ar') {
            $i = 4;
        } elseif ($tipo == 'so') {
            $i = 5;
        } elseif ($tipo == 'em') {
            $i = 6;
        }

        $suma = 0;
        while ($i <= 96) {
            $questionNumber = "Q" . strval($i);
            $suma += $request->$questionNumber;
            $i += 6;
        }
        return $suma;
    }

    public function cientifico($request)
    {
        $suma = 0;
        for ($i = 2; $i <= 96; $i += 6) {
            $questionNumber = "Q" . strval($i);
            $suma += $request->$questionNumber;
        }
        return $suma;
    }
}
