@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')
@extends('Templates/TemplateMenu')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Agregar Estudiante</h2>
          {!! Form::open(array('url' => 'estudiantes')) !!}
          	<div class="form-group">
			    {!! Form::label('Matricula') !!}
			    {!! Form::text('matricula', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'2009-7115')) !!}
			</div> 

			<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'Juan Perez')) !!}
			</div> 

			<div class="form-group">             	
			    {!! Form::label('Curso') !!}
        		<select class= "form-control" name="id_curso" id="Curso">
        			@foreach($cursos as $n)
                	<option value="{{$n->id}}">{{ $n->descripcion }}</option>
                	@endforeach
    			</select>		              
			</div>
        		<button class="btn btn-primary btn-block" type="submit">Agregar</button>
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