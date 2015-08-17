<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoUser;
use Session;
use App\Http\Requests\TipoUserRules;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TipoUserController extends Controller
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
       

        $tipoUser = TipoUser::all();
        return view('TipoUser.Listar', ['tipoUser' => $tipoUser,'tabs' => $this->tabs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('TipoUser.Agregar',['tabs' => $this->tabs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(TipoUserRules $request)
    {
        $tipoUser = TipoUser::create($request->all());

        if(isset($tipoUser->id)){
            $mensaje = "El Tido de Usuario '".$request->input('nombre')."' fue agregado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }


        return redirect('tipouser')->with('mensaje', $mensaje)
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
        return view('TipoUser.Editar', ['tipoUser' => TipoUser::findOrFail($id),'tabs' => $this->tabs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(TipoUserRules $request, $id)
    {
        $tipoUser = TipoUser::find($id)->update($request->all());

        if(isset($tipoUser)){
            $mensaje = "El Tipo de Usuario '".$request->input('nombre')."' fue editado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('tipouser')->with('mensaje', $mensaje)
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
        $tipoUser = TipoUser::find($id);
        $tipoUser->delete();

        if(isset($tipoUser)){
            $mensaje = "El Tipo de Usuario '".$tipoUser->nombre."' fue eliminado exitosamente.";
            $class = "alert alert-success";
        }
        else{
            $mensaje = "Ocurrio un error, por favor intentar nuevamente.";
            $class = "alert alert-danger";
        }

        return redirect('tipouser')->with('mensaje', $mensaje)
                                   ->with('class', $class);
    }
}
