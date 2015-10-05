@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-8">
          <h2 class="sub-header">Agregar Comentario de <b>{{$comentario['estudiante']->nombre}}</b></h2>
          {!! Form::open(array('url' => 'comentarios/agregar/')) !!}
          	<div class="form-group">
			    {!! Form::label('Comentario') !!}
			    {!! Form::textarea('comentario', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'El joven presenta una actitud inadecuada.')) !!}
			</div> 
			<div class="form-group">
			   {!! Form::hidden('id_estudiante', $comentario['estudiante']->id) !!}
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