{!! Form::open(array('url'=>'premio/cliente_premio','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-gruop">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." values="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary" id="mos" value="mos">Buscar Pedido</button>

		</span>
	</div>
</div>

{{Form::close()}}
