<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niveles;
use Session;
use App\Http\Requests\NivelesRules;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NivelesController extends Controller
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
      
        $niveles = Niveles::all();
        return view('Niveles.listar', ['niveles' => $niveles,'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Niveles.Agregar','tabs' => $this->tabs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(NivelesRules $request)
    {
        
        $nivel = Niveles::create($request->all());

        if(isset($nivel->id)){
            $mensaje = "El Nivel '".$request->input('descripcion')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('niveles')->with('mensaje', $mensaje)
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
        return view('Niveles.Editar', ['nivel' => Niveles::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(NivelesRules $request, $id)
    {
        $nivel = Niveles::find($id)->update($request->all());

        if(isset($nivel)){
            $mensaje = "El Nivel '".$request->input('descripcion')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('niveles')->with('mensaje', $mensaje)
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
        $nivel = Niveles::find($id);
        $nivel->delete();

        if(isset($nivel)){
            $mensaje = "El Nivel '".$nivel->descripcion."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('niveles')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
