@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Trabajador : {{$trabajador->CI_T}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($trabajador,['method'=>'PATCH','route'=>['trabajador.update',$trabajador->CI_T]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="direccion">Direccion</label>
				<input type="text" name="direccion" class="form-control" value="{{$trabajador->DIRECCION}}">

			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" name="email" class="form-control" value="{{$trabajador->EMAIL}}">
			</div>
			
			<div class="form-group">
				<label>Tipo Trabajador</label>
				<select name="tipo" class="form-control">

						<option value="{{$trabajador->TIPO}}" selected>{{$trabajador->TIPO}}</option>
						<option value="A">A</option>
						<option value="O">O</option>
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