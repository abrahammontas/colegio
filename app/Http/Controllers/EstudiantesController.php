<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiantes;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstudiantesRules;
use App\Cursos;
use Session;


class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $mensaje = Session::get('mensaje');
        $class = Session::get('class');

         $estudiantes = Estudiantes::all();
         $cursos = Cursos::all();

         foreach($estudiantes as $d){
            foreach($cursos as $n){
                if($d->id_cursos == $n->id){
                    $d->curso = $n->descripcion;
                }
            }
        }
        
        return view('Estudiantes.Listar', ['estudiantes' => $estudiantes,'mensaje' => $mensaje,
                                                                    'class' => $class,
                                                                    'tabs' => $this->tabs]);
        //
        //$estudiantes = Estudiantes::all();
        //return view('Estudiantes.listar', ['estudiantes' => $estudiantes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
           //
         $cursos = Cursos::all();
        return view('Estudiantes.Agregar', ['cursos' => $cursos, 'tabs' => $this->tabs]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(EstudiantesRules $request)
    {
          
        $estudiante = Estudiantes::create($request->all());

        if(isset($estudiante->id)){
            $mensaje = "El Estudiante '".$request->input('nombre')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('estudiantes')->with('mensaje', $mensaje)
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
        
        $cursos = Cursos::all();
        return view('Estudiantes.Editar', ['estudiante' => Estudiantes::findOrFail($id), 'cursos' => $cursos,
                                                                    'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EstudiantesRules $request, $id)
    {
        $estudiante = Estudiantes::find($id)->update($request->all());

        if(isset($estudiante)){
            $mensaje = "El Estudiante '".$request->input('nombre')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('estudiantes')->with('mensaje', $mensaje)
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
        $estudiante = Estudiantes::find($id);
        $estudiante->delete();

        if(isset($estudiante)){
            $mensaje = "El Estudiante '".$estudiante->nombre."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('estudiantes')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
