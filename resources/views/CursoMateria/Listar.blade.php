@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Listado de Cursos/Materias</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
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
                @foreach($CursosMaterias as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->Cursos->descripcion }}</td>
                  <td>{{ $c->Materias->descripcion }}</td>
                  <td>{{ $c->Coordinador->name }}</td>
                  <td>{{ $c->Profesor->name }}</td>
                  <td>
                       {!! Form::open(array('method' => 'DELETE', 'route' => array('cursos-materias.destroy', $c->id))) !!}
                        <div class="btn-group" role="group" aria-label="..."> 
                            <a href="cursos-materias/{{$c->id}}/edit" class='btn btn-primary'>Editar</a>
                            {!! Form::submit('Eliminar', array('class' => 'btn btn-danger')) !!}
                        </div>
                        {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection