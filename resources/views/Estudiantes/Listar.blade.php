@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Listado de  Estudiantes</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Matricula</th>
                  <th>Nombre</th>
                  <th>Curso</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($estudiantes as $e)
                <tr>
                  <td>{{ $e->id }}</td>
                  <td>{{ $e->id_curso }}</td>
                  <td>{{ $e->matricula }}</td>
                  <td>{{ $e->nombre }}</td>
                  <td>{{ $e->curso->descripcion }}</td>                  
                  <td>
                        <div class="btn-group" role="group" aria-label="..."> 
                            <a href="estudiantes/{{$e->id}}/edit" class='btn btn-primary'>Editar</a>
                            <a href="comentarios/listar/{{$e->id}}" class='btn btn-success'>Comentarios</a>
                        </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection