@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Persona/Cliente : {{$personaadmi->NOMBRE}} {{$personaadmi->APELLIDO_PATERNO}} {{$personaadmi->APELLIDO_MATERNO}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($personaadmi,['method'=>'PATCH','route'=>['personaadmi.update',$personaadmi->CI_NIT_P]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$personaadmi->NOMBRE}}">

			</div>
			<div class="form-group">
				<label for="descripcion">Apellido Paterno</label>
				<input type="text" name="apellido_paterno" class="form-control" value="{{$personaadmi->APELLIDO_PATERNO}}">
			</div>
			<div class="form-group">
				<label for="apellido_materno">Apellido Materno</label>
				<input type="text" name="apellido_materno" class="form-control" value="{{$personaadmi->APELLIDO_MATERNO}}">

			</div>
			
			<div class="form-group">
				<label>Tipo Persona</label>
				<select name="tipo_p" class="form-control">
					@foreach ($tipo_personas as $tpp)
						@if ($tpp->CODIGO_G==$personaadmi->TIPO_P)
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