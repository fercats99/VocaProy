<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\QuestionEnvironment;
use App\Models\QuestionIntelligence;
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
        $ambLaboral = QuestionEnvironment::all();
        $aptitudes = QuestionIntelligence::all();
        return view('questionTest.index', compact('aptitudes'));
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
        $personalidades = [
            'realista' => self::puntajePersonalidad($request, 're'),
            'cientifico' => self::puntajePersonalidad($request, 'ci'),
            'convencional' => self::puntajePersonalidad($request, 'co'),
            'artistico' => self::puntajePersonalidad($request, 'ar'),
            'social' => self::puntajePersonalidad($request, 'so'),
            'emprendedor' => self::puntajePersonalidad($request, 'em')
        ];
        $aptitudes = [
            'corporalCinestesica' => self::puntajeAptitudes($request, 'cor'),
            'logico-matematica' => self::puntajeAptitudes($request, 'log'),
            'viso-espacial' => self::puntajeAptitudes($request, 'vis'),
            'musical' => self::puntajeAptitudes($request, 'mus'),
            'linguistica' => self::puntajeAptitudes($request, 'lin'),
            'interpersonal' => self::puntajeAptitudes($request, 'inter'),
            'intrapersonal' => self::puntajeAptitudes($request, 'intra'),
            'naturalista' => self::puntajeAptitudes($request, 'nat'),
        ];
        // Busca las tres mayores personalidades basadas en los puntos
        // Si hay un empate retoma todas las que empaten, por lo que pueden ser no solo tres
        dd($aptitudes);
        $aptitudes = self::mayorAptitud($aptitudes);
        $personalidades = self::mayorPersonalidad($personalidades);

        if ($personalidades) {
            return redirect('/home');
        }
        $personalidades = ['cientifico', 'artistico', 'realista'];
        $ambienteLaboral = ['cientifico', 'realista', 'convencional'];
        // $aptitudes = ['naturalista', 'logico-matematica', 'viso-espacial'];
        $carrera = self::buscarCarrera($personalidades, $ambienteLaboral, $aptitudes);
        dd($carrera);
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
    // .................................................................
    // Obtener los puntajes de cada area
    // .................................................................
    public function puntajePersonalidad($request, $tipo)
    {

        //re = relistico
        //ci = cientifico
        //co = convencional
        //ar = artistico
        //so = social
        //em = emprendedor

        $i = 0;
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
        } else {
            return null;
        }

        $suma = 0;
        while ($i <= 96) {
            $questionNumber = "QPer" . strval($i);
            $suma += $request->$questionNumber;
            $i += 6;
        }
        return $suma;
    }
    public function puntajeAptitudes($request, $tipo)
    {
        // Inteligencias multiples
        // corp = corporal-cinestésica
        // log = lógico-matemática
        // vis = viso-espacial
        // mus = musical
        // lin = linguistica
        // inter = interpersonal
        // intra = intrapersonal
        // nat = naturalista
        $i = 0;
        if ($tipo == 'cor') {
            $i = 1;
        } elseif ($tipo == 'log') {
            $i = 2;
        } elseif ($tipo == 'vis') {
            $i = 3;
        } elseif ($tipo == 'mus') {
            $i = 4;
        } elseif ($tipo == 'lin') {
            $i = 5;
        } elseif ($tipo == 'inter') {
            $i = 6;
        } elseif ($tipo == 'intra') {
            $i = 7;
        } elseif ($tipo == 'nat') {
            $i = 8;
        } else {
            return null;
        }
        $suma = 0;
        while ($i <= 64) {

            $questionNumber = "QApt" . strval($i);
            $suma += $request->$questionNumber;
            if ($tipo == 'nat') {
                print($request->$questionNumber . '/............\n');
            }
            $i += 8;
        }
        return $suma;
    }
    // .................................................................
    // Buscar mayores valores para cada area
    // .................................................................
    public function mayorPersonalidad($personalidades)
    {
        // Ordena de mayor a menor el arreglo
        arsort($personalidades);
        // Usamos el bucle para saber si hay valores iguales después del tercer valor
        // para saber los tipos de personalidad que usaremos
        // Según el test deben ser los primeros 3, y en este caso contemplamos que existan
        // tipos de personalidad que puedan empatar con la tercer personalidad ejemplo:
        // personalidad1 = 32 puntos, personalidad2 = 30 puntos, personalidad3 = 30 puntos,
        // personalidad4 = 30 puntos, personalidad5 = 28 puntos
        // Podemos observar que en este caso debemos buscar las primeras 4 personalidades.

        $numPer = 2;
        while ($numPer < count($personalidades)) {
            if (array_values($personalidades)[$numPer] < array_values($personalidades)[$numPer - 1]) {
                break;
            }
            $numPer++;
            if ($numPer == count($personalidades)) {
                return null;
            }
        }
        $maxPersonalidad = [];
        for ($i = 0; $i < $numPer; $i++) {
            $tipo = array_keys($personalidades)[$i];
            array_push($maxPersonalidad, $tipo);
        }
        return $maxPersonalidad;
    }
    public function mayorAptitud($aptitudes)
    {
        // Ordena de mayor a menor el arreglo
        arsort($aptitudes);
        // Usamos el bucle para saber si hay valores iguales después del tercer valor
        // para saber los tipos de personalidad que usaremos
        // Según el test deben ser los primeros 3, y en este caso contemplamos que existan
        // tipos de personalidad que puedan empatar con la tercer personalidad ejemplo:
        // personalidad1 = 32 puntos, personalidad2 = 30 puntos, personalidad3 = 30 puntos,
        // personalidad4 = 30 puntos, personalidad5 = 28 puntos
        // Podemos observar que en este caso debemos buscar las primeras 4 personalidades.

        $numPer = 2;
        while ($numPer < count($aptitudes)) {
            if (array_values($aptitudes)[$numPer] < array_values($aptitudes)[$numPer - 1]) {
                break;
            }
            $numPer++;
            if ($numPer == count($aptitudes)) {
                print('nulo');
                return null;
            }
        }
        $maxPersonalidad = [];
        for ($i = 0; $i < $numPer; $i++) {
            $tipo = array_keys($aptitudes)[$i];
            array_push($maxPersonalidad, $tipo);
        }
        return $maxPersonalidad;
    }
    // .................................................................
    //Buscar carrera
    // .................................................................
    public function buscarCarrera($per, $ambLaboral, $apt)
    {
        $carrera = Carrera::whereIn('personalidad1', $per)->WhereIn('personalidad2', $per)->WhereIn('personalidad3', $per)->get();
        $carrera = $carrera->whereIn('ambienteLaboral1', $ambLaboral)->whereIn('ambienteLaboral2', $ambLaboral)->whereIn('ambienteLaboral3', $ambLaboral);
        $carrera = $carrera->WhereIn('aptitud1', $apt)->WhereIn('aptitud2', $apt)->WhereIn('aptitud3', $apt);
        return $carrera;
    }
}
