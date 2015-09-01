@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Editar Docente ({{$docente->nombre}})</h2>
          {!! Form::model($docente, array('route' => array('docentes.update', $docente->id),'method' => 'put')) !!}
          	<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'Juan Perez Martinez')) !!}
			</div> 
			<div class="form-group">             	
			    {!! Form::label('Nivel') !!}
        		<select class= "form-control" name="id_nivel" id="id_nivel">
        			@foreach($niveles as $n)
                	<option value="{{$n->id}}">{{ $n->descripcion }}</option>
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