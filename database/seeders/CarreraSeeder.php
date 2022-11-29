<?php

namespace Database\Seeders;

use App\Models\Carrera;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 
        Carrera::create([
            'nombre' => 'Licenciatura en Fisica',
            'personalidad1' => 'artistico', 'personalidad2' => 'realista',
            'personalidad3' => 'cientifico', 'ambienteLaboral1' => 'convencional',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'cientifico',
            'aptitud1' => 'naturalista', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Matemáticas',
            'personalidad1' => 'artistico', 'personalidad2' => 'realista',
            'personalidad3' => 'cientifico', 'ambienteLaboral1' => 'convencional',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'cientifico',
            'aptitud1' => 'linguistica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Química',
            'personalidad1' => 'artistico', 'personalidad2' => 'realista',
            'personalidad3' => 'cientifico', 'ambienteLaboral1' => 'convencional',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'cientifico',
            'aptitud1' => 'naturalista', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Químico Farmacéutico Biólogo',
            'personalidad1' => 'artistico', 'personalidad2' => 'realista',
            'personalidad3' => 'cientifico', 'ambienteLaboral1' => 'emprendedor',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'cientifico',
            'aptitud1' => 'naturalista', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería Civil',
            'personalidad1' => 'emprendedor', 'personalidad2' => 'realista',
            'personalidad3' => 'cientifico', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'artistico',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería en Topografía',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'artistico', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'artistico',
            'aptitud1' => 'naturalista', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería Industrial',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'emprendedor', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'artistico',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería Mecánica Eléctrica',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'emprendedor', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería Química',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'emprendedor', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Informática',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'artistico', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'linguistica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería Biomédica',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'artistico', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería en Computación',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'artistico', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
        Carrera::create([
            'nombre' => 'Licenciatura en Ingeniería en Comunicaciones y Electrónica',
            'personalidad1' => 'cientifico', 'personalidad2' => 'realista',
            'personalidad3' => 'emprendedor', 'ambienteLaboral1' => 'cientifico',
            'ambienteLaboral2' => 'realista', 'ambienteLaboral3' => 'convencional',
            'aptitud1' => 'corporalCinestesica', 'aptitud2' => 'logico-matematica',
            'aptitud3' => 'viso-espacial'
        ]);
    }
}
