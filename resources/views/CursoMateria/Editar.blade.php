@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Editar Curso/Materia</h2>
          {!! Form::model($CursosMaterias, array('route' => array('cursos-materias.update', $CursosMaterias->id),'method' => 'put')) !!}
          	<div class="form-group">             	
			    {!! Form::label('Curso') !!}
        		<select class= "form-control" name="id_curso" id="id_curso">
        			@foreach($cursos as $c)
                	<option value="{{$c->id}}">{{ $c->descripcion }}</option>
                	@endforeach
    			</select>		              
			</div>
			<div class="form-group">             	
			    {!! Form::label('Materia') !!}
        		<select class= "form-control" name="id_materia" id="id_materia">
        			@foreach($materias as $m)
                	<option value="{{$m->id}}">{{ $m->descripcion }}</option>
                	@endforeach
    			</select>		              
			</div>
			
			<div class="form-group">             	
			    {!! Form::label('Coordinador') !!}
        		<select class= "form-control" name="id_coordinador" id="id_coordinador">
        			@foreach($users as $u)
                	<option value="{{$u->id}}">{{ $u->name }}</option>
                	@endforeach
    			</select>		              
			</div>
			<div class="form-group">             	
			    {!! Form::label('Profesor') !!}
        		<select class= "form-control" name="id_profesor" id="id_profesor">
        			@foreach($users as $u)
                	<option value="{{$u->id}}">{{ $u->name }}</option>
                	@endforeach
    			</select>		              
			</div>
        		<button class="btn btn-primary btn-block" type="submit">Editar</button>
		  {!! Form::close() !!}
		</div>	
</div>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
		    @if (count($errors) > 0)
				<div class="alert alert-danger">
						<ul>
			    		@foreach($errors->all() as $error)
				     	   <li>{{ $error }}</li>
			    		@endforeach
			    	</ul>
			    </div>
			@endif
		</div>	

</div>

@endsection