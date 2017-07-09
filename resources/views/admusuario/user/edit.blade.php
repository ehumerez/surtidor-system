@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario : {{$usuario->USUARIO}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($usuario,['method'=>'PATCH','route'=>['user.update',$usuario->USUARIO]])!!}
			{{Form::token()}}

			<div class="form-group">
				<label for="contraseña">Contraseña</label>
				<input type="text" name="contraseña" class="form-control" value="{{$usuario->CONTRASENA}}">

			</div>

			<div class="form-group">
				<label>Codigo Grupo</label>
				<select name="codigo_grupo" class="form-control">

					@foreach ($grupos as $tpp)
						@if ($tpp->CODIGO_G==$usuario->CODIGO_GRUPO)
						<option value="{{$tpp->CODIGO_G}}" selected>{{$tpp->CODIGO_G}}</option>
						@else
						<option value="{{$tpp->CODIGO_G}}">{{$tpp->CODIGO_G}}</option>
						@endif
					@endforeach
						
				</select>
			</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>



			{!!Form::close()!!}

		</div>
	</div>
@endsection