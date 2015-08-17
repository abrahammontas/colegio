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
        $cursos = Cursos::all();


        return view('Cursos.Listar', ['cursos' => $cursos,'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Cursos.Agregar',['tabs' => $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(CursosRules $request)
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
        return view('Cursos.Editar', ['curso' => Cursos::findOrFail($id),
                                                                    'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(CursosRules $request, $id)
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
