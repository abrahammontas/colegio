@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Notas</h2>
          <h3><b>Nombre: </b>{{$Estudiante->nombre}}</h3>
          <h3><b>Curso: </b>{{$Estudiante->Curso->descripcion}}</h3>
          <h3><b>Matricula: </b>{{$Estudiante->matricula}}</h3>
          <h3><b>Fecha: </b>{{$Estudiante->matricula}}</h3>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
           <table class="table table-striped">
              <thead>
                <tr>
                  <th>Materia</th>
                  <th>Nota</th>
                </tr>
              </thead>
              <tbody>
                @foreach($Notas as $nota)
                <tr>
                  <td>{{ $nota->CursoMateria->Materia->descripcion }}</td>
                  <td>{{ $nota->nota }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
                <a class="btn btn-primary" href="/home/docente">Volver</a>
                <a class="btn btn-primary" href="/imprimir/nota-estudiante-completa/{{$Estudiante->id}}">Imprimir</a>
          </div>
        </div>

@endsection