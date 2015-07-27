@extends('../Templates/TemplateMantenimiento')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Curso</th>
                  <th>Matricula</th>
                  <th>Nombre</th>
                </tr>
              </thead>
              <tbody>
                @foreach($estudiantes as $e)
                <tr>
                  <td>{{ $e->id }}</td>
                  <td>{{ $e->id_curso }}</td>
                  <td>{{ $e->matricula }}</td>
                  <td>{{ $e->nombre }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection