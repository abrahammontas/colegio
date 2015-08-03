<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Cursos;
use App\Http\Requests;
use Session;
use App\Http\Requests\CursosRules;
use App\Http\Controllers\Controller;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        
        //
        $mensaje = Session::get('mensaje');
        $class = Session::get('class');

        $cursos = Cursos::all();


        return view('Cursos.listar', ['cursos' => $cursos, 'mensaje' => $mensaje,
                                                                    'class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Cursos.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $curso = Cursos::create($request->all());

        if(isset($curso->id)){
            $mensaje = "El Curso '".$request->input('descripcion')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('cursos')->with('mensaje', $mensaje)
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
        return view('Cursos.Editar', ['curso' => Cursos::findOrFail($id)]);
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
        
        $curso = Cursos::find($id)->update($request->all());

        if(isset($curso)){
            $mensaje = "El Curso '".$request->input('descripcion')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('cursos')->with('mensaje', $mensaje)
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
        $curso = Cursos::find($id);
        $curso->delete();

        if(isset($curso)){
            $mensaje = "El Curso '".$curso->descripcion."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('cursos')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
