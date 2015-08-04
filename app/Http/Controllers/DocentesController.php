<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docentes;
use App\Niveles;
use App\Http\Requests;
use Session;
use App\Http\Requests\DocentesRules;
use App\Http\Controllers\Controller;

class DocentesController extends Controller
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

        $docentes = Docentes::all();
        $niveles = Niveles::all();
        foreach($docentes as $d){
            foreach($niveles as $n){
                if($d->id_nivel == $n->id){
                    $d->nivel = $n->descripcion;
                }
            }
        }

        return view('Docentes.Listar', ['docentes' => $docentes,'mensaje' => $mensaje,
                                                                    'class' => $class,
                                                                    'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $niveles = Niveles::all();
        return view('Docentes.Agregar', ['niveles' => $niveles, 'tabs' => $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(DocentesRules $request)
    {
        
        $docente = Docentes::create($request->all());

        if(isset($docente->id)){
            $mensaje = "El Docente '".$request->input('matricula')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('docentes')->with('mensaje', $mensaje)
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

        $niveles = Niveles::all();
        return view('Docentes.Editar', ['docente' => Docentes::findOrFail($id), 'niveles' => $niveles,
                                                                    'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(DocentesRules $request, $id)
    {
        $docente = Docentes::find($id)->update($request->all());

        if(isset($docente)){
            $mensaje = "El Docente '".$request->input('nombre')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('docentes')->with('mensaje', $mensaje)
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
        $docente = Docentes::find($id);
        $docente->delete();

        if(isset($docente)){
            $mensaje = "El Docente '".$docente->nombre."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('docentes')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
