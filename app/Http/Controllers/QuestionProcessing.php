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
        $personalidades = QuestionRoute::All();
        $ambLaboral = QuestionEnvironment::all();
        $aptitudes = QuestionIntelligence::all();
return  compact('aptitudes', 'ambLaboral', 'personalidades');  
         /* return view('questionTest.index', compact('aptitudes', 'ambLaboral', 'personalidades')); */

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

        // Busca las tres mayores personalidades basadas en los puntos
        // Si hay un empate retoma todas las que empaten, por lo que pueden ser no solo tres
        $aptitudes = self::mayorAptitud($request);
        $personalidades = self::mayorPersonalidad($request);
        $ambLaboral = self::mayorAmbLaboral($request);
        // En caso de que no haya ninguna personalidad regresará nulo diciedo que no hay ninún match
        // if (empty($personalidades) || $aptitudes || ambLaboral) {
        //     $mensaje = true;
        //     return redirect('/resultado')->with(compact('mensaje'));
        // }
        $carreras = self::buscarCarrera($personalidades, $ambLaboral, $aptitudes);
        return with(compact('carreras'));
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
    // Devolver un arreglo con los puntajes de un area
    // .................................................................
    public function puntajes($request, $tipo)
    {
        if ($tipo == 'per') {
            return [
                'realista' => self::puntajePersonalidad($request, 're'),
                'cientifico' => self::puntajePersonalidad($request, 'ci'),
                'convencional' => self::puntajePersonalidad($request, 'co'),
                'artistico' => self::puntajePersonalidad($request, 'ar'),
                'social' => self::puntajePersonalidad($request, 'so'),
                'emprendedor' => self::puntajePersonalidad($request, 'em')
            ];
        } elseif ($tipo == 'apt') {
            return [
                'corporalCinestesica' => self::puntajeAptitudes($request, 'cor'),
                'logico-matematica' => self::puntajeAptitudes($request, 'log'),
                'viso-espacial' => self::puntajeAptitudes($request, 'vis'),
                'musical' => self::puntajeAptitudes($request, 'mus'),
                'linguistica' => self::puntajeAptitudes($request, 'lin'),
                'interpersonal' => self::puntajeAptitudes($request, 'inter'),
                'intrapersonal' => self::puntajeAptitudes($request, 'intra'),
                'naturalista' => self::puntajeAptitudes($request, 'nat'),
            ];
        } elseif ($tipo == 'amb') {
            return [
                'realista' => self::puntajeAmbLaboral($request, 'rea'),
                'cientifico' => self::puntajeAmbLaboral($request, 'cie'),
                'convencional' => self::puntajeAmbLaboral($request, 'con'),
                'artistico' => self::puntajeAmbLaboral($request, 'art'),
                'social' => self::puntajeAmbLaboral($request, 'soc'),
                'emprendedor' => self::puntajeAmbLaboral($request, 'emp'),
            ];
        } else {
            return null;
        }
    }
    // .................................................................
    // Obtener los puntajes de cada sub-area
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
            $i += 8;
        }
        return $suma;
    }
    public function puntajeAmbLaboral($request, $tipo)
    {
        // Ambientes laborales
        // rea = Realista
        // cie = Científico
        // con = Convencional
        // art = Artistico
        // soc = social
        // emp = emprendedor
        $i = 0;
        if ($tipo == 'rea') {
            $i = 1;
        } elseif ($tipo == 'cie') {
            $i = 2;
        } elseif ($tipo == 'con') {
            $i = 3;
        } elseif ($tipo == 'art') {
            $i = 4;
        } elseif ($tipo == 'soc') {
            $i = 5;
        } elseif ($tipo == 'emp') {
            $i = 6;
        } else {
            return null;
        }
        $suma = 0;
        while ($i <= 42) {
            $questionNumber = "QAmb" . strval($i);
            $suma += $request->$questionNumber;
            $i += 6;
        }
        return $suma;
    }
    // .................................................................
    // Buscar mayores valores para cada area
    // .................................................................
    public function mayorPersonalidad($request)
    {
        // Obtiene los puntajes de personalidades
        $personalidades = self::puntajes($request, 'per');
        if (empty($personalidades)) {
            return null;
        }
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
            if ($numPer == count($personalidades) && array_values($personalidades)[$numPer - 1] <= 0) {
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
    public function mayorAptitud($request)
    {
        // Obtiene los puntajes de aptitudes
        $aptitudes = self::puntajes($request, 'apt');
        if (empty($aptitudes)) {
            return null;
        }
        // Ordena de mayor a menor el arreglo
        arsort($aptitudes);

        $numApt = 2;
        while ($numApt < count($aptitudes)) {
            if (array_values($aptitudes)[$numApt] < array_values($aptitudes)[$numApt - 1]) {
                break;
            }
            $numApt++;
            if ($numApt == count($aptitudes) && array_values($aptitudes)[$numApt - 1] <= 0) {
                return null;
            }
        }
        $maxApt = [];
        for ($i = 0; $i < $numApt; $i++) {
            $tipo = array_keys($aptitudes)[$i];
            array_push($maxApt, $tipo);
        }
        return $maxApt;
    }
    public function mayorAmbLaboral($request)
    {
        // Obtiene los puntajes de ambientes laborales
        $ambLaboral = self::puntajes($request, 'amb');
        if (empty($ambLaboral)) {
            return null;
        }
        // Ordena de mayor a menor el arreglo
        arsort($ambLaboral);

        $numAmb = 2;
        while ($numAmb < count($ambLaboral)) {
            if (array_values($ambLaboral)[$numAmb] < array_values($ambLaboral)[$numAmb - 1]) {
                break;
            }
            $numAmb++;
            if ($numAmb == count($ambLaboral) && array_values($ambLaboral)[$numAmb - 1] <= 0) {
                return null;
            }
        }
        $maxAmb = [];
        for ($i = 0; $i < $numAmb; $i++) {
            $tipo = array_keys($ambLaboral)[$i];
            array_push($maxAmb, $tipo);
        }

        return $maxAmb;
    }
    // .................................................................
    //Buscar carrera
    // .................................................................
    public function buscarCarrera($per, $ambLaboral, $apt)
    {
        $carrera = Carrera::whereIn('personalidad1', $per)->WhereIn('personalidad2', $per)->WhereIn('personalidad3', $per)->get();
        $carrera = $carrera->whereIn('ambienteLaboral1', $ambLaboral)->whereIn('ambienteLaboral3', $ambLaboral)->WhereIn('ambienteLaboral2', $ambLaboral);
        $carrera = $carrera->WhereIn('aptitud1', $apt)->WhereIn('aptitud2', $apt)->WhereIn('aptitud3', $apt);
        return $carrera;
    }
}