@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Dashboard</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped" >
            <h4>Materias Como Profesor</h3>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Materia</th>
                  <th>Coordinador</th>
                  <th>Profesor</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($CursosMateriasProf as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->Curso->descripcion }}</td>
                  <td>{{ $c->Materia->descripcion }}</td>
                  <td>{{ $c->Coordinador->name }}</td>
                  <td>{{ $c->Profesor->name }}</td>
                  <td>
                         <div class="btn-group" role="group" aria-label="...">   
                            <a href="../notas/curso-materia/{{$c->id}}" class='btn btn-primary'> Notas </a>
                         </div>
                  </td>
               </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <hr>
          <div class="table-responsive">
            <table class="table table-striped">
            <h4>Materias Como Coordinador</h4>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Materia</th>
                  <th>Coordinador</th>
                  <th>Profesor</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($CursosMateriasCoo as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->Curso->descripcion }}</td>
                  <td>{{ $c->Materia->descripcion }}</td>
                  <td>{{ $c->Coordinador->name }}</td>
                  <td>{{ $c->Profesor->name }}</td>
                  <td>
                         <div class="btn-group" role="group" aria-label="...">   
                            <a href="../notas/curso-materia/{{$c->id}}" class='btn btn-primary'> Notas </a>
                         </div>
                  </td>
               </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection