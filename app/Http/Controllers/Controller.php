<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController
{
    use DispatchesJobs, ValidatesRequests;

    public $tabs;

    public function __construct()
    {

    	$uri = $request->path();

    	$arreglo['cursos'] = '
    				<li role="presentation" >
						<a href="/cursos">Cursos</a>
							<ul class="">
								<li>
									<a href="/cursos">Listar Cursos</a>
								</li>
								<li>
									<a href="/cursos/create">Crear Cursos</a>
								</li>
							</ul>
					</li>';

		$arreglo['docentes'] = '
					<li role="presentation">
						<a href="/docentes">Docentes</a>
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="/docentes">Listar Docentes</a>
								</li>
								<li>
									<a href="/docentes/create">Crear Docentes</a>
								</li>
							</ul>
					</li>';

		$arreglo['estudiantes'] = '
					<li role="presentation">
						<a href="/estudiantes">Estudiantes</a>
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="/estudiantes">Listar Estudiantes</a>
								</li>
								<li>
									<a href="/estudiantes/create">Crear Estudiantes</a>
								</li>
							</ul>
					</li>';

		$arreglo['materias'] = '
					<li role="presentation">
						<a href="/materias">Materias</a>
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="/materias">Listar Materias</a>
								</li>
								<li>
									<a href="/materias/create">Crear Materias</a>
								</li>
							</ul>
					</li>';

		$arreglo['niveles'] = '
					<li role="presentation">
						<a href="/niveles">Niveles</a>
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="/niveles">Listar Niveles</a>
								</li>
								<li>
									<a href="/niveles/create">Crear Niveles</a>
								</li>
							</ul>
					</li>';

		$arreglo['tipodocentes'] = '
					<li role="presentation">
						<a href="/tipodocentes">Tipo de Docentes</a>
							<ul class="nav nav-pills nav-stacked">
								<li>
									<a href="/tipodocentes">Listar Tipo de Docentes</a>
								</li>
								<li>
									<a href="/tipodocentes/create">Crear Tipo de Docentes</a>
								</li>
							</ul>
					</li>';		
		foreach($arreglo as $a){
			
		}

					$this->
    	class="disabled" class="active"
		$this->tabs = '<ul class="nav nav-pills nav-stacked">'.'</ul>';

    }
}
