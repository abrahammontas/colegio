@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Notas</h2>
          <h3><b>Profesor: </b>{{$cursoMateria->Profesor->name}}</h3>
          <h3><b>Curso: </b>{{$cursoMateria->Curso->descripcion}}</h3>
          <h3><b>Materia: </b>{{$cursoMateria->Materia->descripcion}}</h3>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
          {!! Form::open(array('action' =>  array('NotasController@postGuardar',$cursoMateria->id), 'method' => 'post')) !!}
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Matricula</th>
                  <th>Estudiante</th>
                  <th>Nota</th>
                </tr>
              </thead>
              <tbody>
                @foreach($cursoMateria->Curso->Estudiantes as $estudiante)
                <tr>
                  <td>{{ $estudiante->matricula }}</td>
                  <td>{{ $estudiante->nombre }}</td>
                  @if($user->coordinador)
                  <td>{!! Form::number('notas[' . $estudiante->id . ']',  $notas[$estudiante->id]) !!}</td>
                  @elseif( isset($notas[$estudiante->id]))
                  <td>{!! Form::number('notas[' . $estudiante->id . ']',  $notas[$estudiante->id] , array('disabled')) !!}</td>
                  @else
                  <td>{!! Form::number('notas[' . $estudiante->id . ']', 0 ) !!}</td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
                {!! Form::submit('Publicar!', array('class'=>'btn btn-primary')) !!}

                <a class="btn btn-primary" href="home/docente">Volver</a>
                {!! Form::close() !!}
          </div>
        </div>

@endsection