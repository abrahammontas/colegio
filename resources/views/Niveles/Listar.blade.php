@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@extends('Templates/TemplateMenu')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Listado de Niveles</h2>
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
                @foreach($niveles as $n)
                <tr>
                  <td>{{ $n->id }}</td>
                  <td>{{ $n->descripcion }}</td>
                  <td>
                       {!! Form::open(array('method' => 'DELETE', 'route' => array('niveles.destroy', $n->id))) !!}
                        <div class="btn-group" role="group" aria-label="..."> 
                            <a href="niveles/{{$n->id}}/edit" class='btn btn-primary'>Editar</a>
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