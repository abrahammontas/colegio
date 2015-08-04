@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@extends('Templates/TemplateMenu')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Listado de Tipo de Docentes</h2>
          <div class='<?php if(isset($class)){echo $class;}?>'>
            <?php if(isset($mensaje)){echo $mensaje;}?>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripcion</th>
                  <th>Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($tipoDocentes as $t)
                <tr>
                  <td>{{ $t->id }}</td>
                  <td>{{ $t->descripcion }}</td>
                  <td>
                       {!! Form::open(array('method' => 'DELETE', 'route' => array('tipodocentes.destroy', $t->id))) !!}
                        <div class="btn-group" role="group" aria-label="..."> 
                            <a href="tipodocentes/{{$t->id}}/edit" class='btn btn-primary'>Editar</a>
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