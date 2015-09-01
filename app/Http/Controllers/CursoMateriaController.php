<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CursosMaterias;
use App\User;
use App\Cursos;
use App\Materias;
use App\Http\Requests;
use Session;
use App\Http\Requests\CursoMateriaRules;
use App\Http\Controllers\Controller;

class CursoMateriaController extends Controller
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
    public function index()
    {
       
        $CursosMaterias = CursosMaterias::with('Curso', 'Materia', 'Coordinador', 'Profesor')->get();
        
        return view('CursoMateria.Listar', ['CursosMaterias' => $CursosMaterias,'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all();
        $cursos = Cursos::all();
        $materias = Materias::all();

        return view('CursoMateria.Agregar',['cursos' => $cursos, 'users' => $users,
                            'materias' => $materias,'tabs' => $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CursoMateriaRules $request)
    {
        $CursoMateria = CursosMaterias::create($request->all());

        if(isset($CursoMateria->id)){
            $mensaje = "La Relacion Curso/Materia '".$request->input('descripcion')."' fue agregada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('cursos-materias')->with('mensaje', $mensaje)
                                   ->with('class', $class);
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

        $users = User::all();
        $cursos = Cursos::all();
        $materias = Materias::all();
        return view('CursoMateria.Editar', ['CursosMaterias' => CursosMaterias::findOrFail($id),
                                         'users' => $users,'cursos' => $cursos,
                                         'materias' => $materias,'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CursoMateriaRules $request, $id)
    {
        $CursosMaterias = CursosMaterias::find($id)->update($request->all());

        if(isset($CursosMaterias)){
            $mensaje = "La Relacion Curso/Materia '".$request->input('descripcion')."' fue editada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('cursos-materias')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $CursosMaterias = CursosMaterias::find($id);
        $CursosMaterias->delete();

        if(isset($CursosMaterias)){
            $mensaje = "La Relacion Curso/Materia fue eliminada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('cursos-materias')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
