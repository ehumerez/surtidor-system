@extends ('layouts.oper')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			

			{!!Form::open(array('url'=>'operador/factura','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}

			<h3>Nueva Factura</h3>

	<div class="row">

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				@foreach ($inventarios as $tra)
						@if( $tra->CANTIDAD_DISPONIBLE<1000)
							<div>
								<FONT FACE="arial" SIZE=5 COLOR=red>Combustible Agotado  {{$tra->CODIGO_COMBUSTIBLE}}</FONT>		
							</div>	
						@endif
				@endforeach	
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Operador</label>
				<select name="ci_trabajador" class="form-control">
					@foreach ($trabajadores as $tra)
						<option value="{{$tra->CI_T}}" selected>{{$tra->NOMBRE}} {{$tra->APELLIDO_PATERNO}} {{$tra->APELLIDO_MATERNO}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Cliente</label>
				<select name="ci_persona" class="form-control">
					@foreach ($personas as $per)
						<option value="{{$per->CI_NIT_P}}" selected>{{$per->NOMBRE}} {{$per->APELLIDO_PATERNO}} {{$per->APELLIDO_MATERNO}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="cantidad_combustible">Cantidad Combustible</label>
				<input type="text" name="cantidad_combustible"  class="form-control" placeholder="Cantidad...">

			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Detalle</label>
				<select name="detalle" class="form-control">
					@foreach ($combustibles as $cat)
						<option value="{{$cat->CODIGO_C}}" selected>{{$cat->DESCRIPCION}}</option>
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label>Manguera</label>
				<select name="id_manguera" class="form-control">
					@foreach ($mangueras as $tra)
						<option value="{{$tra->ID_M}}" selected>{{$tra->ID_M}}</option>	
					@endforeach
				</select>
			</div>
		</div>
		
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label>Placa</label>
				<select name="placa_v" class="form-control">
					@foreach ($vehiculos as $veh)
						<option value="{{$veh->PLACA}}" selected>{{$veh->PLACA}}</option>	
					@endforeach
				</select>
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