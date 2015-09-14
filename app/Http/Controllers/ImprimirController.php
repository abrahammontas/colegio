<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CursosMaterias;
use App\User;
use App\Cursos;
use App\Notas;
use App\Materias;
use App\Estudiantes;
use App\Http\Requests;
use Session;
use App\Http\Requests\CursoMateriaRules;
use App\Http\Requests\NotasRules;
use App\Http\Controllers\Controller;

class ImprimirController extends Controller
{
         public function __construct()
    {
        parent::__construct();
    }


    public function getNotaEstudiante($id,$fecha = 0)
    {
        if($fecha == 0 )
        {
            $fecha = date('Y-m-d');
        }
        $fecha = explode('-',$fecha);
        $fecha1 = strtotime($fecha[0].'-'.$fecha[1].'-'.'01');
        $fecha1 = date('Y-m-d',$fecha1);
        $fecha2 = strtotime('+1 month' , strtotime($fecha[0].'-'.$fecha[1].'-'.'01'));
        $fecha2 = date('Y-m-d', $fecha2);

        $Notas = Notas::with('CursoMateria.Materia')
                    ->where('notas.id_estudiante', '=',$id)
                    ->where('notas.created_at', '>', $fecha1)
                    ->where('notas.created_at', '<', $fecha2)
                    ->where('notas.activo', '=', 1)
                    ->get();

        $Estudiante = Estudiantes::find($id)
                            ->with('Curso')
                            ->where('id', '=',$id)
                            ->first();
  
        return view('Imprimir.Nota', [
            'Estudiante' => $Estudiante,
            'Notas' => $Notas,
            'tabs' => $this->tabs
            ]);


    }

    public function getNotaEstudianteCompleta($id){

                return view('Imprimir.NotaCompleta');

    }
    
    public function getEstudianteMes()
    {

    }

}
