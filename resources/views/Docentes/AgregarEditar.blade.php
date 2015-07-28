@extends('../Templates/TemplateResourse')
@extends('../Templates/TemplateBarra')
@extends('../Templates/TemplateMenu')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<div class="col-lg-4">
          <h2 class="sub-header">Section title</h2>
          {!! Form::open(array('url' => 'docentes')) !!}
          	<div class="form-group">
			    {!! Form::label('Nombre') !!}
			    {!! Form::text('nombre', null, 
			        array('class'=>'form-control', 
			              'placeholder'=>'Juan Perez Martinez')) !!}
			</div>
        		<button class="btn btn-primary btn-block" type="submit">Sign in</button>
		  {!! Form::close() !!}
		</div>	

		<div class="col-lg-4">
      		<ul>
			    @foreach($errors->all() as $error)
			        <li> 
				        <div class="alert alert-info">
				        {{ $error }}
	    				</div>
	    			</li>
			    @endforeach
			</ul>
		</div>	

</div>

@endsection