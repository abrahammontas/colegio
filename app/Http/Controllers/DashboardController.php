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
     * Responds to requests to GET /docente
     */
    public function getDocente()
    {
        $user = \Auth::user();
        $CursosMateriasProf = CursosMaterias::with('Curso', 'Materia', 'Coordinador', 'Profesor')
                                ->where('id_profesor', '=', $user->id)
                                ->where('id_coordinador', '!=', $user->id)
                                ->get();

        $CursosMateriasCoo = CursosMaterias::with('Curso', 'Materia', 'Coordinador', 'Profesor')
                                ->where('id_coordinador', '=', $user->id)
                                ->get();                                

        return view('Dashboard.ListarDocentes', 
            ['CursosMateriasProf' => $CursosMateriasProf,
            'CursosMateriasCoo' => $CursosMateriasCoo,
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