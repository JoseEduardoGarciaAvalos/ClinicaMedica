<div class="modal fade" id="modal-enfermedad-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="background-image: url({{asset ('img/100.jpg')}});" class="modal-header">
                <font  size="6" face="Comic Sans MS,arial,verdana" color="0e4743"><p align="center">Nueva Enfermedad</p></font> 
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div> 
            {!! Form::open(['route'=>'enfermedad.store','method'=>'POST','autocomplete'=>'off']) !!}
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				    <div class="form-group">
					   <label for="enfermedad">Nombre:</label><div class="input-group margin-bottom-sm"><span class="input-group-addon"><i class="fa fa-wheelchair"></i></span>
  							<input class="form-control" type="text" name="enfermedad" id="enfermedad" placeholder="Nombre">
					   </div>
				    </div> 
                </div>
				<div class="modal-footer">
                @include('layouts.modal_buttons')
                </div>
            {!! Form::close() !!}
		    </div>
	    </div>
    </div>
</div>
