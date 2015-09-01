<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;
use App\User;
use App\Http\Requests;
use Session;
use App\Http\Requests\MateriasRules;
use App\Http\Controllers\Controller;

class MateriasController extends Controller
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
       

        $materias = Materias::with('Users')->get();

        return view('Materias.Listar', ['materias' => $materias,'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::all();
        return view('Materias.Agregar',['users' => $users, 'tabs' => $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MateriasRules $request)
    {
        $materia = Materias::create($request->all());

        if(isset($materia->id)){
            $mensaje = "La Materia '".$request->input('descripcion')."' fue agregada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('materias')->with('mensaje', $mensaje)
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
        return view('Materias.Editar', ['materia' => Materias::findOrFail($id), 'users' => $users, 'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MateriasRules $request, $id)
    {
        $materia = Materias::find($id)->update($request->all());

        if(isset($materia)){
            $mensaje = "La Materia '".$request->input('descripcion')."' fue editada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('materias')->with('mensaje', $mensaje)
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
        $materia = Materias::find($id);
        $materia->delete();

        if(isset($materia)){
            $mensaje = "La Materia '".$materia->descripcion."' fue eliminada exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('materias')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
