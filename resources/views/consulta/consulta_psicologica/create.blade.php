@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Consulta Psicologica</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'consulta/consulta_psicologica','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idpaciente">Paciente</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-street-view"></i></span>
					<select name="idpaciente" class="form-control selectpicker" id="idpaciente" data-live-search="true">
						@foreach($paciente as $pac)
						<option value="{{$pac->idpaciente}}">{{$pac->nombre_p}}</option>
						@endforeach
					</select>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="detalle">Detalle de la Consulta</label>
					<textarea name="detalle" rows="3" cols="50" class="form-control" placeholder="Detalle..."></textarea> 
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="observacion">Observación</label>
					<input type="text" name="observacion" class="form-control" placeholder="Observación...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="fecha_consulta">Fecha Consulta</label>
					<input type="date" name="fecha_consulta"  class="form-control" placeholder="Fecha Consulta...">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					<label for="idusuario">Usuario</label>
					<div class="input-group margin-bottom-sm">
  						<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<select name="idusuario" class="form-control selectpicker" id="idusuario" data-live-search="true">
						@foreach($usuario as $us)
						<option value="{{$us->idusuario}}">{{$us->nombre}}</option>
						@endforeach
					</select>
					</div>
				</div>
					<label > (*) Campos Obligatorios</label>
			</div>
			<div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>
		</div>
			
			{!!Form::close()!!}
			
@endsection
