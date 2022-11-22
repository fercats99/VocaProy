<?php

namespace Database\Seeders;

use App\Models\QuestionEnvironment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionEnvironmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Me gustaría trabajar en un lugar donde...
        QuestionEnvironment::create(['pregunta' => 'Utilice diferentes máquinas y herramientas.']);
        QuestionEnvironment::create(['pregunta' => 'Observe e investigue.']);
        QuestionEnvironment::create(['pregunta' => 'Ordene datos.']);
        QuestionEnvironment::create(['pregunta' => 'Utilice los sentimientos y la imaginación
para crear e interpretar en forma artística.']);
        QuestionEnvironment::create(['pregunta' => 'Realice actividades sociales.']);
        QuestionEnvironment::create(['pregunta' => 'Exijan y ofrezcan oportunidades.']);
        QuestionEnvironment::create(['pregunta' => 'Ordene objetos.']);
        QuestionEnvironment::create(['pregunta' => 'Utilice el método científico.']);
        QuestionEnvironment::create(['pregunta' => 'Archive documentos.']);
        QuestionEnvironment::create(['pregunta' => ' Valore la independencia, la intuición y las
habilidades artísticas.']);
        //La siguiente pregunta es la 11
        QuestionEnvironment::create(['pregunta' => 'Promueva los valores sociales.']);
        QuestionEnvironment::create(['pregunta' => 'Organice actividades.']);
        QuestionEnvironment::create(['pregunta' => 'Trabajar con animales.']);
        QuestionEnvironment::create(['pregunta' => 'Use las habilidades matemáticas.']);
        QuestionEnvironment::create(['pregunta' => 'Realiza actividades propias de oficina.']);
        QuestionEnvironment::create(['pregunta' => 'Diseñe productos creativos.']);
        QuestionEnvironment::create(['pregunta' => 'Participe en actividades humanitarias.']);
        QuestionEnvironment::create(['pregunta' => 'Pueda dirigir a los demás.']);
        QuestionEnvironment::create(['pregunta' => 'Estimule habilidades mecánicas.']);
        QuestionEnvironment::create(['pregunta' => 'Trabaje en solución de problemas.']);
        //La siguiente pregunta es la 21
        QuestionEnvironment::create(['pregunta' => 'Organice datos escritos y numéricos.']);
        QuestionEnvironment::create(['pregunta' => 'Muestre habilidades artísticas.']);
        QuestionEnvironment::create(['pregunta' => 'Brinde un servicio a otras personas.']);
        QuestionEnvironment::create(['pregunta' => 'Muestre capacidad de liderazgo.']);
        QuestionEnvironment::create(['pregunta' => 'Use métodos sencillos y directos.']);
        QuestionEnvironment::create(['pregunta' => 'Utilice ideas, lenguaje y símbolos.']);
        QuestionEnvironment::create(['pregunta' => 'Trabaje mis actividades en computadora.']);
        QuestionEnvironment::create(['pregunta' => 'Motive a expresar pensamientos y
sentimientos.']);
        QuestionEnvironment::create(['pregunta' => 'Trabaje con la conducta humana.']);
        QuestionEnvironment::create(['pregunta' => 'Desempeñe el cargo de supervisor de
ventas.']);
        //La siguiente pregunta es la 31
        QuestionEnvironment::create(['pregunta' => 'Crear y reparar objetos con las manos.']);
        QuestionEnvironment::create(['pregunta' => 'Valore la capacidad crítica.']);
        QuestionEnvironment::create(['pregunta' => 'Se respeten las normas institucionales.']);
        QuestionEnvironment::create(['pregunta' => 'Se vea el mundo de manera flexible.']);
        QuestionEnvironment::create(['pregunta' => 'Ayude a las personas.']);
        QuestionEnvironment::create(['pregunta' => 'Tenga la facilidad verbal para convencer a
        otros.']);
        QuestionEnvironment::create(['pregunta' => 'Las actividades se realicen al aire libre.']);
        QuestionEnvironment::create(['pregunta' => 'Analice la información.']);
        QuestionEnvironment::create(['pregunta' => 'Exista una rutina establecida.']);
        QuestionEnvironment::create(['pregunta' => 'Cuente con valores e influencia personal.']);
        //La siguiente pregunta es la 41
        QuestionEnvironment::create(['pregunta' => 'Valore el servicio, la cooperación y la
comprensión.']);
        QuestionEnvironment::create(['pregunta' => 'Demuestre inteligencia práctica.']);
    }
}
