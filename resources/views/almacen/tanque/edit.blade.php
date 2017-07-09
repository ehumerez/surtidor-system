@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Tanque : {{$tanque->CODIGO_T}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($tanque,['method'=>'PATCH','route'=>['tanque.update',$tanque->CODIGO_T]])!!}
			{{Form::token()}}
		
			
			<div class="form-group">
				<label for="estado">Estado de Tanque 1=activo 0=inactivo</label>
				<input type="text" name="estado" class="form-control" value="{{$tanque->ESTADO}}">

			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection