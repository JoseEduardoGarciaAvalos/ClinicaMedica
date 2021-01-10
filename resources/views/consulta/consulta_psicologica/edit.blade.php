<div data-backdrop="static" class="modal fade" id="modal-consulta_psicologica-edit-{{ $consultap->}}"> 
<div class="modal-dialog modal-lg">
        <div class="modal-content"> 
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                            <!--<h3>NUEVO PRODUCTO</h3>-->
                            <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Producto</p></font>
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

@extends('layouts.admin')
@section('content') 
 {!!Html::script('js/jQuery-2.1.4.min.js')!!}
  {!!Html::script('js/jquery.mask.min.js')!!}
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
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
      {!!Form::model($consultap, ['method'=>'PATCH', 'url'=>['consulta/consulta_psicologica', $consultap->idconsulta_psicologica],'files'=>'true'])!!}
      {{Form::token()}}
      <div class="row" style="background-color: #d3e8ef">
        <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Editar Consulta Psicologica</p></font>
            </div>
        </div> 
      <div class="row" style="background-color: #f2f2f1"> 
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">   
      <div class="form-group">
        <label>Paciente:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-user"></i></span>
        <select name="idpaciente" class="form-control">
          @foreach ($paciente as $pac)
            @if ($pac->idpaciente==$consultap->idpaciente) 
              <option value="{{$pac->idpaciente}}" selected>{{$pac->nombre_p}}</option>
            @else
              <option value="{{$pac->idpaciente}}">{{$pac->nombre_p}}</option>
            @endif
          @endforeach
        </select>
        </div>
      </div>
    </div>

        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
          <div class="form-group">
            <label for="detalle">(*) Detalle:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-heartbeat"></i></span>
            <input type="text" name="detalle" required value="{{$consultap->detalle}}" class="form-control"  onkeypress="return soloLetras(event)"  placeholder="Detalle">
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
          <div class="form-group">
            <label for="observacion">(*) Observacion:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-medkit"></i></span>
            <textarea class="form-control" type="text" name="observacion" id="sintomas" rows="4" cols="40"  onkeypress="return soloLetras(event)"  placeholder="Observacion">{{$consultap->observacion}}</textarea>
            </div>
          </div>
        </div>
        
          <div class="col-lg-22 col-sm-22 col-md-22 col-xs-12">
          <div class="form-group">
            <div style="text-align: right;">
              <button  class="btn btn-primary" style="color: white; background-color: #0a302d" type="submit "><span class="fa fa-floppy-o"></span> Guardar </button>
              <button type="reset" class="btn btn-primary" style="color: white; background-color: #98bff9"><span class="fa fa-ban"></span> Cancelar </button>
              <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> <span class="fa fa-retweet"></span><span aria-hidden="true">Salir</span></button>
            </div>
          </div>
        </div>
    </div>
  
        {!!Form::close()!!} 
 
        @push('scripts')
        <script>
          function soloLetras(e) {
            key = e.keyCode || e.which;
              tecla = String.fromCharCode(key).toLowerCase();
              letras = " áéíóúabcdefghijklmnñopqrstuvwxyz,";
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
    return date('Y-m-d',strtotime($fecha));
  } 
?>


