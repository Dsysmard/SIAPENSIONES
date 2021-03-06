@extends('layouts.menu')


@section('content')
<div class="container-fluid">
<div class="big-padding text-center blue-grey white-text section-padding">
<h1>REGISTRAR NUEVO ESTADO CIVIL</h1><hr/>
</div>
	<div class="row jumbotron " style="padding-top: 20px;border-top-width: 20px;margin-top: 30px;">
		<div class="col-md-10 col-md-offset-1"style="margin: 2% 50px 75px 100px;">
      {!! Form::open(['route' => 'estadocivil.store', 'method' => 'post', 'novalidate']) !!}
      
      @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> Hubo algunos problemas al momento de guardar.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

            <div class="form-group {{ $errors->has('edo_civil') ? 'has-error' : '' }}">
                      {!! Form::label('ESTADO CIVIL:', 'ESTADO CIVIL:') !!}
                      {!! Form::text('edo_civil', null, ['class' => 'form-control' , 'required' => 'required','placeholder'=>'REGISTRAR EL NUEVO ESTADO CIVIL']) !!}
                      <span class="text-danger">{{ $errors->first('edo_civil') }}</span>
                    </div>

                <div class="form-group">
                      {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                  </div>
            {!! Form::close() !!}
		</div>
	</div>
</div>
   <script type="text/javascript">  
        $('.date').datepicker({  
           format: 'yyyy-mm-dd'
         });  
    </script> 
@endsection