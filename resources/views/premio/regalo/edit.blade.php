@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Premio : {{$regalo->ID_PR}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($regalo,['method'=>'PATCH','route'=>['regalo.update',$regalo->ID_PR]])!!}
			{{Form::token()}}
		
			
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="cantidad">Cantidad</label>
				<input type="text" name="cantidad" class="form-control" value="{{$regalo->CANTIDAD}}">
			</div>
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$regalo->DESCRIPCION}}">
			</div>
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="valor">Valor</label>
				<input type="text" name="valor" class="form-control" value="{{$regalo->VALOR}}">
			</div>
		</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}

		</div>
	</div>
@endsection