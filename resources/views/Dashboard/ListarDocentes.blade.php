@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Dashboard</h2>
            <?php if(!isset($CursosMaterias[0])){?>
                <div class="alert alert-info">
                  Este perfil no tiene Materias asignadas.
                </div>
            <?php }?>
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
                         <div class="btn-group" role="group" aria-label="...">   
                            <a href="notas/{{$c->id}}" class='btn btn-primary'> Notas </a>
                         </div>
                  </td>
               </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection