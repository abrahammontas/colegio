<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use App\CursosMaterias;
use App\Cursos;
use App\Materias;
use App\Http\Requests;
use Session;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Responds to requests to GET /users
     */
    public function getIndexDocente()
    {
        $user = \Auth::user();
        $CursosMaterias = CursosMaterias::with('Cursos', 'Materias', 'Coordinador', 'Profesor')->get();

        return view('Dashboard.ListarDocentes', 
            ['CursosMaterias' => $CursosMaterias,
            'tabs' => $this->tabs]);
        
    }


     /**
     * Responds to requests to GET /users
     */
    public function getIndexCoordinador()
    {
        $user = \Auth::user();
        $CursosMaterias = CursosMaterias::where('id_profesor', '=', $user->id);
        $MateriasCoordinador = CursosMaterias::where('id_profesor', '=', $user->id);
        $cursos = Cursos::all();
        $materias = Materias::all();

        return view('Dashboard.ListarDocentes', 
            ['CursosMaterias' => $CursosMaterias,
            'MateriasCoordinador' => $MateriasCoordinador,
            'cursos' => $cursos,
            'materias' => $materias,
            'tabs' => $this->tabs]);
        
    }

    /**
     * Responds to requests to GET /users/show/1
     */
    public function getShow($id)
    {
        //
    }

    /**
     * Responds to requests to GET /users/admin-profile
     */
    public function getAdminProfile()
    {
        //
    }

    /**
     * Responds to requests to POST /users/profile
     */
    public function postProfile()
    {
        //
    }
}