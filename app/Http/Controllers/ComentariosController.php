<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comentarios;
use App\Http\Controllers\Controller;
use App\Estudiantes;

class ComentariosController extends Controller
{
    public function getListar($id){

        $estudiante = Estudiantes::find($id);
        $comentarios = Comentarios::With('Estudiante')
                                    ->With('Profesor')
                                    ->where('id_estudiante','=',$id)
                                    ->get();

        $estudiante->comentarios = $comentarios;

        return view('Comentarios.Listar', ['estudiante' => $estudiante,'tabs' => $this->tabs]);
    }
}
