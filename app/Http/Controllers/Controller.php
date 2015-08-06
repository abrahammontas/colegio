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

    	$this->tabs = '<ul class="nav navbar-nav navbar-right">
    				<li class="dropdown" >
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Cursos<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/cursos">Listar Cursos</a>
								</li>
								<li>
									<a href="/cursos/create">Crear Cursos</a>
								</li>
							</ul>
					</li>
					<li role="presentation">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Docentes<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/docentes">Listar Docentes</a>
								</li>
								<li>
									<a href="/docentes/create">Crear Docentes</a>
								</li>
							</ul>
					</li>
					<li role="presentation">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Estudiantes<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/estudiantes">Listar Estudiantes</a>
								</li>
								<li>
									<a href="/estudiantes/create">Crear Estudiantes</a>
								</li>
							</ul>
					</li>
					<li role="presentation">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Materias<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/materias">Listar Materias</a>
								</li>
								<li>
									<a href="/materias/create">Crear Materias</a>
								</li>
							</ul>
					</li>
					<li role="presentation">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Niveles<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/niveles">Listar Niveles</a>
								</li>
								<li>
									<a href="/niveles/create">Crear Niveles</a>
								</li>
							</ul>
					</li>
					<li role="presentation">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" 
								role="button" aria-haspopup="true" aria-expanded="false">
								Tipo de Docentes<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a href="/tipodocentes">Listar Tipo de Docentes</a>
								</li>
								<li>
									<a href="/tipodocentes/create">Crear Tipo de Docentes</a>
								</li>
							</ul>
					</li>
					</ul>';		

    }
}
