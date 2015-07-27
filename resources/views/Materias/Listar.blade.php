@extends('../Templates/TemplateMantenimiento')

@section('content')

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="sub-header">Section title</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Codigo</th>
                  <th>Descripcion</th>
                </tr>
              </thead>
              <tbody>
                @foreach($materias as $m)
                <tr>
                  <td>{{ $m->id }}</td>
                  <td>{{ $m->codigo }}</td>
                  <td>{{ $m->descripcion }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

@endsection