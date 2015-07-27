@extends('../Templates/TemplateMantenimiento')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Profesor</th>
                  <th>Estudiante</th>
                  <th>Comentario</th>
                </tr>
              </thead>
              <tbody>
                @foreach($comentarios as $c)
                <tr>
                  <td>{{ $c->id }}</td>
                  <td>{{ $c->id_profesor }}</td>
                  <td>{{ $c->id_estudiante }}</td>
                  <td>{{ $c->comentario }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection