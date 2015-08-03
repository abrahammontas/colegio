@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@extends('Templates/TemplateMenu')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Listado de Materias</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($materias as $m)
                <tr>
                  <td>{{ $m->id }}</td>
                  <td>{{ $m->codigo }}</td>
                  <td>{{ $m->descripcion }}</td>
                  <td><a href="materias/{{$m->id}}/edit" class='btn btn-primary'>Editar</a>
                       {!! Form::open(array('method' => 'DELETE', 'route' => array('materias.destroy', $m->id))) !!}
                            {!! Form::submit('Eliminar', array('class' => 'btn btn-danger')) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection