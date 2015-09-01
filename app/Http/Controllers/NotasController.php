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

class NotasController extends Controller
{
         public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getCursoMateria($id)
    {
        //

        $cursoMateria = CursosMaterias::with('Profesor', 'Curso', 'Curso.Estudiantes', 'Notas', 'Materia')
                                        ->where('id', $id)
                                        ->first();

        $notas = $cursoMateria->Notas->lists('nota', 'id_estudiante');

        $user = \Auth::user();
        $CursosMateriasCoordinador = CursosMaterias::find($id);

        if($CursosMateriasCoordinador->id_coordinador == $user->id){
            $user->coordinador = true;
        }
        else{
            $user->coordinador = false;
        }

        return view('Notas.CursoMateria', [
            'user' => $user,
            'cursoMateria' => $cursoMateria,
            'notas' => $notas,
            'tabs' => $this->tabs
            ]);

    }


    /**
     * Save the grades of a specific class.
     *
     * @return Message to the getCursoMateria
     */

    public function postGuardar(NotasRules $notasRequest, $id)
    {

       $notaEstudiante = [];
       $notas = $notasRequest->notas;
       $fecha = date('Y-m-d');
       $fecha = explode('-',$fecha);

       foreach ($notas as $idEstudiante => $puntuacion) {

                $NotasMes = Notas::where('id_cursomateria', '=', $id)
                                        ->where('id_estudiante', '=', $idEstudiante)
                                        ->where('created_at', '>=', $fecha[0].'-'.$fecha[1].'-'.'00')
                                        ->first();

           if(!isset($NotasMes))
           {
               $notaEstudiante[] = [
                 'id_cursomateria' => $id, 
                 'id_estudiante' => $idEstudiante, 
                 'nota' => $puntuacion
               ];
           }

       }

       if($notaEstudiante != null){
            \DB::table('notas')->insert($notaEstudiante);
            $mensaje = "La nota fue publicada exitosamente.";
            $class = "alert alert-success";

       }else{
            $mensaje = "Hubo un error, intente nuevamente";
            $class = "alert alert-danger";
       }

           return redirect('home/docente')->with('mensaje', $mensaje)
                                   ->with('class', $class);


// $notas = collect($notasRequest->notas);
       
//        $notas = $notas->map(function ($puntuacion, $idEstudiante) use ($id){
//          return [
//            'id_cursomateria' => $id,
//            'id_estudiante' => $idEstudiante, 
//            'nota' => $puntuacion
//          ];
//        });
       
//        \DB::table('notas')->insert($notas);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getEstudiante($id)
    {
                //
        $notas = Notas::where('id_estudiante', '=', $id)->with('Materias', 'Profesor')->get();
        $estudiante = Estudiantes::where('id', '=', $id)->first();
        $curso = Cursos::where('id', '=', $estudiante->id_curso)->first();

        return view('Notas.Estudiante', ['notas' => $notas,'curso' => $curso,
            'estudiante' => $estudiante,'tabs' => 
            $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
