@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'almacen/tanque','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<h3>Nuevo Tanque</h3>

	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="capacidad_disponible">Cantidad Disponible</label>
				<input type="text" name="capacidad_disponible"  class="form-control" placeholder="Capacidad Disponible...">

			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="capacidad_minima">Capacidad Minima</label>
				<input type="text" name="capacidad_minima" class="form-control" placeholder="Capacidad Minima...">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="capacidad_maxima">Capacidad Maxima</label>
				<input type="text" name="capacidad_maxima" class="form-control" placeholder="Capacidad Maxima...">
			</div>
		</div>

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Codigo Combustible</label>
				<select name="codigo_combustible" class="form-control">
					@foreach ($combustibles as $cat)
						<option value="{{$cat->CODIGO_C}}" selected>{{$cat->DESCRIPCION}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="estado">Estado de Tanque</label>
				<input type="text" name="estado" class="form-control" placeholder="Estado de Tanque...">
			</div>
		</div>			
		
	</div>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>
		</div>
	</div>
			
			
			

			{!!Form::close()!!}

		</div>
	</div>

@endsection