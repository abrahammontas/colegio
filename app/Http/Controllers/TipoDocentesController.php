<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDocentes;
use Session;
use App\Http\Requests\TipoDocentesRules;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoDocentesController extends Controller
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

        $tipoDocente = TipoDocentes::all();
        return view('TipoDocentes.Listar', ['tipoDocentes' => $tipoDocente, 'mensaje' => $mensaje,
                                                                    'class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('TipoDocentes.Agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TipoDocentesRules $request)
    {
        $tipoDocente = TipoDocentes::create($request->all());

        if(isset($tipoDocente->id)){
            $mensaje = "El Tido de Docente '".$request->input('descripcion')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('tipodocentes')->with('mensaje', $mensaje)
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
        return view('TipoDocentes.Editar', ['tipoDocente' => TipoDocentes::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TipoDocentesRules $request, $id)
    {
        $tipoDocente = TipoDocentes::find($id)->update($request->all());

        if(isset($tipoDocente)){
            $mensaje = "El Tipo de Docente '".$request->input('descripcion')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('tipodocentes')->with('mensaje', $mensaje)
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
        $tipoDocente = TipoDocentes::find($id);
        $tipoDocente->delete();

        if(isset($tipoDocente)){
            $mensaje = "El Tipo de Docente '".$tipoDocente->descripcion."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('tipodocentes')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
