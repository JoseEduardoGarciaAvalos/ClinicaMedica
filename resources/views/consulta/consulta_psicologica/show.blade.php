@extends ('layouts.admin')
@section ('content')

 
<div >
	<div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        	<br>
            	<font size="6" face="Comic Sans MS,arial,verdana" color="blue"><p align="center" aling="center"> Información de la Consulta Psicologica</p><br></font>

        </div>
    </div>
</div>

	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-body">
			@foreach ($consultap as $conp)
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="idpaciente">Paciente</label>
					@foreach ($paciente as $pac) 
						@if ($conp->idpaciente==$pac->idpaciente)
							<option value="{{$pac->idpaciente}}" selected>{{$pac->nombre_p}}</option>
						@endif
					@endforeach
				</div>
				</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Detalle</label>
					<p>{{$conp->detalle}}</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="serie_comprobante">Serie Comprobante</label>
					<p>{{$conp->observacion}}</p>
				</div>
			</div>	
						</thead>
					</table>
				</div>
			</div>
			@endforeach
			</div>
		</div>
	</div>
			@push('scripts')
				<script>
					function soloLetras(e) {
						key = e.keyCode || e.which;
    					tecla = String.fromCharCode(key).toLowerCase();
    					letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    					especiales = [8, 37, 39, 46];

    					tecla_especial = false
    					for(var i in especiales) {
    						if(key == especiales[i]) {
    							tecla_especial = true;
            					break;
            				}
            			}
            			if(letras.indexOf(tecla) == -1 && !tecla_especial)
            				return false;
            		}
            	</script>
            @endpush



@endsection

<?php 
$time=time();
    
    function dameFecha($fecha,$dia){
        list($year,$mon,$day)=explode('-',$fecha);
        return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));    
    }
   $total=0; 
   function formatoFecha($fecha){
    return date("d-m-Y",strtotime($fecha));
  } 
?>