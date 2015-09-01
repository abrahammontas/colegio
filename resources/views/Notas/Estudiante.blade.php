@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Notas</h2>
          <h3><b>Curso: </b>{{$curso->descripcion}}</h3>
          <h3><b>Estudiante: </b>{{$estudiante->nombre}}</h3>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Materia</th>
                  <th>Profesor</th>
                  <th>Nota</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                @foreach($notas as $n)
                <tr>
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->Materias->descripcion }}</td>
                  <td>{{ $n->Profesor->name }}</td>
                  <td>{{ $n->nota }}</td>
                  <td>{{ $d->created_at }}</td>
                  <td>
                      {!! Form::open(array('method' => 'DELETE', 'route' => array('docentes.destroy', $d->id))) !!}
                        <div class="btn-group" role="group" aria-label="...">  
                            <a href="docentes/{{$d->id}}/edit" class='btn btn-primary'>Editar</a>
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