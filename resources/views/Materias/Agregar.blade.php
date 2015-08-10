@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Agregar Materia</h2>
          {!! Form::open(array('url' => 'materias')) !!}
          	<div class="form-group">
			    {!! Form::label('Descripcion') !!}
			    {!! Form::text('descripcion', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'Literatura')) !!}
			</div>
			<div class="form-group">
			    {!! Form::label('Codigo') !!}
			    {!! Form::text('codigo', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'M08-234')) !!}
			</div>
			<div class="form-group">             	
			    {!! Form::label('Coordinador') !!}
        		<select class= "form-control" name="id_coordinador" id="id_coordinador">
        			@foreach($docentes as $d)
                	<option value="{{$d->id}}">{{ $d->nombre }}</option>
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