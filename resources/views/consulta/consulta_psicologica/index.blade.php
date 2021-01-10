@extends ('layouts.admin')
@section('content')
{!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
 <script type="text/javascript">
jQuery(function($) {
      
      $('#date').mask('99/99/9999',{placeholder:"mm/dd/yyyy"});
     
   });
</script>




<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12"> 
		
        @can('consulta_psicologica.create')
		<h3><FONT FACE="times new roman" size="6" color="0e4743"> Consulta Psicologica </FONT><a><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="color: #003366; background-color:#99CCFF"><span class="fa fa-plus-circle" color="0e4743"></span> 
        </button></a></h3> 
        @endcan

         
			{!!Form::open(array('url'=>'consulta/
			consulta_psicologica','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div data-backdrop="static" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  				<div class="modal-dialog modal-lg" role="document">
   			 		<div class="modal-content"> 
      					<div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
      						
      						<font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Registro Consulta Psicologica</p></font>
      							@if (count($errors)>0)
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->all() as $error)
												<li>{{$error}}</li>
											@endforeach
										</ul> 
									</div>
								@endif
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          							<span aria-hidden="true">&times;</span>
       							 </button>
       					</div>
       					<div class="modal-body">
      						<form>
      	<div class="row"  style="background-color: #f2f2f1">

		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
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
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="detalle">(*)  Detalle de la Consulta</label>
					<textarea class="form-control" type="text" name="detalle"   rows="5" cols="50" placeholder="Detalle..."></textarea>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="observacion">(*)Observación</label>
					<textarea class="form-control" type="text" name="observacion"   rows="5" cols="50" placeholder="Observación..."></textarea>
                        </div>
				</div>
			</div>
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">	
								 	<div class="form-group">
										<div class="input-group margin-bottom-sm">
									 	<p class="text-danger">(*) Campos Requeridos</p>
										</div>
									</div>
								</div>
			</form>
				</div>

				<div class="modal-footer">
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
								<div class="form-group">
                                    
									<button class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
									 
									<button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
								
									<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
										<span class="fa fa-retweet"></span>
										<span aria-hidden="true">Salir</span>
									</button>
									
								</div>
							</div>
				</div>
				
				</div>
			</div>
      	</div>
      </div>
 	</div>

 	{!!Form::close()!!}


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
		<div type="hidden" class="table-responsive" id="table_list" style="display:block">
			<table class="table datatable" style="text-align:center;">
				<thead style="background-color:#1c779e">
					<th style="color: #FFFFFF" style="text-align:justify">NOMBRE DEL PACIENTE</th>
					<th style="color: #FFFFFF" style="text-align:justify">FECHA DE REGISTRO</th>
					<th style="color: #FFFFFF" style="text-align:justify">DETALLE</th>
					<th style="color: #FFFFFF" style="text-align:justify">OBSERVACIONES</th>
					<th style="color: #FFFFFF" style="text-align:center">OPCIONES</th>
				</thead>
				@foreach ($consultap as $conp) 
				<tr onmouseover='this.style.background="#e5e4e2"' onmouseout='this.style.background="white"'>
					<td>{{$conp->nombre_p}}</td>
					<td ><?php echo formatoFecha($conp->fecha_consulta);?></td>
					<td>{{$conp->detalle}}</td>
					<td>{{$conp->observacion}}</td>
					<td>
					<div style="text-align:center;">
						 @can('consulta.consulta_psicologica.show')
						<a href="{{URL::action('ConsultaPsicologicaController@show',$conp->idconsulta_psicologica)}}"><button type="button" class="btn btn-Secondary " ><span class="fa fa-eye"></span></button></a>
						 @endcan

                          @can('consulta.consulta_psicologica.edit')
						<a href="{{URL::action('ConsultaPsicologicaController@edit',$conp->idconsulta_psicologica)}}"><button type="button" class="btn btn-info" style="color: white; background-color: #d2691e"><span class="fa fa-pencil"></span></button></a>
						 @endcan

					
                          @can('consulta.consulta_psicologica.destroy')
						<a href="" data-target="#modal-delete-{{$conp->idconsulta_psicologica}}" data-toggle="modal"><button type="button" class="btn btn-primary" style="color: white; background-color: #166c66"><span class="fa fa-level-down"></span></button></a>
						@endcan

						
						
						</div>
					</td>
				</tr>
				@endforeach
			</table>
		</div>
		{{$consultap->render()}}
	</div>
</div>
			
	

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
@endsection