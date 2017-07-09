@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<h3>Editar Pedido : {{$cliente_premio->ID_CP}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cliente_premio,['method'=>'PATCH','route'=>['cliente_premio.update',$cliente_premio->ID_CP]])!!}
			{{Form::token()}}
		
			

				<div class="form-group">
					<label for="estado">Estado</label>
					<input type="text" name="estado" class="form-control" value="{{$cliente_premio->ESTADO}}">
				</div>


		
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection