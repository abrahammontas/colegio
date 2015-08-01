@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@extends('Templates/TemplateMenu')
@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Section title</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Nivel</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($docentes as $d)
                <tr>
                  <td>{{ $d->id }}</td>
                  <td>{{ $d->nombre }}</td>
                  <td>{{ $d->nivel }}</td>
                  <td><a href="docentes/{{$d->id}}/edit">Editar</a>
                       {!! Form::open(array('method' => 'DELETE', 'route' => array('docentes.destroy', $d->id))) !!}
                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection