@extends('Templates/TemplateResource')
@extends('Templates/TemplateBarra')


@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Editar Nivel ({{$nivel->descripcion}})</h2>
          {!! Form::model($nivel, array('route' => array('niveles.update', $nivel->id),'method' => 'put')) !!}
          	<div class="form-group">
			    {!! Form::label('Descripcion') !!}
			    {!! Form::text('descripcion', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'Profesor')) !!}

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