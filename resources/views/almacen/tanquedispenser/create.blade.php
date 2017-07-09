@extends ('layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'almacen/tanquedispenser','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<h3>Nuevo Detalle Manguera-Dispenser-Tanque</h3>


	<div class="row">

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
			
				<label for="id_tanque">Tanque</label>
				<input type="text" name="id_tanque"  class="form-control" placeholder="Tanque...">

			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
			
				<label for="id_dispenser">Dispenser</label>
				<input type="text" name="id_dispenser"  class="form-control" placeholder="Dispenser...">

			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
			
				<label for="id_manguera">Manguera</label>
				<input type="text" name="id_manguera"  class="form-control" placeholder="Manguera...">

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