<?php

namespace ClinicaMedica\Http\Controllers;

use Illuminate\Http\Request;
use ClinicaMedica\Http\Requests;
use ClinicaMedica\ConsultaPsicologica;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use ClinicaMedica\Http\Requests\ConsultaPsicologicaformRequest;  
use DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ConsultaPsicologicaController extends Controller
{
     public function _construct()
    {
         
        $this->middleware('permission:consulta.consulta_psicologica.create')->only(['create','store']);
        $this->middleware('permission:consulta.consulta_psicologica.index')->only('index');
        $this->middleware('permission:consulta.consulta_psicologica.edit')->only(['edit','update']);
        $this->middleware('permission:consulta.consulta_psicologica.show')->only('show');
        $this->middleware('permission:consulta.consulta_psicologica.destroy')->only('destroy');
                    


    }
    
    public function index (Request $request){
        if($request){

            $query= trim($request->get('searchText'));
            $paciente=DB::table('paciente')->where('estado_p','=','Activo')->get();
            $consultap=DB::table('consulta_psicologica as conm')
            ->join('paciente as paciente','conm.idpaciente','=','paciente.idpaciente')
            ->select('conm.idconsulta_psicologica','conm.detalle','conm.observacion','conm.fecha_consulta','conm.estado','paciente.nombre_p')
            ->where('nombre_p','LIKE','%'.$query.'%')
            ->where('estado','=','1')
            ->orderBy('idconsulta_psicologica','asc')
            ->paginate(10);
           return view('consulta.consulta_psicologica.index',["consultap"=>$consultap,"paciente"=>$paciente,"searchText"=>$query]);

           
        }
    }
   
    public function store (ConsultaPsicologicaformRequest $request){

        $validator= validator::make($request->all(), ['idpaciente'=>'required|unique:consulta_psicologica']);
        if ($validator->fails()) {
            return back()->whithErrors($validator)->whithInput();
        }
        
    $consultap= new ConsultaPsicologica;
        $consultap->detalle=$request->get('detalle');
        $consultap->observacion=$request->get('observacion');
         $mytime = Carbon::now('America/El_Salvador');
        $consultap->fecha_consulta=$mytime->toDateTimeString();
        $consultap->estado='1';
        $consultap->idpaciente=$request ->get('idpaciente');
        $consultap->save();
        return Redirect::to('consulta/consulta_psicologica');
    }

    public function show ($id){

        $paciente=DB::table('paciente as p')->where('estado_p','=','Activo')->get();
        $consultap=DB::table('consulta_psicologica as conp')
            ->select('conp.idpaciente','conp.detalle','conp.observacion')
            ->where('conp.idconsulta_psicologica','=',$id)
            ->get();
        return view("consulta.consulta_psicologica.show", ["consultap"=>$consultap,"paciente"=>$paciente]);
    
    }
    public function edit($id){
        $consultap=ConsultaPsicologica::findOrFail($id);
        $paciente=DB::table('paciente')->where('estado_p','=','Activo')->get();
        return view("consulta.consulta_psicologica.edit",["consultap"=>$consultap,"paciente"=>$paciente]);

    }

    public function update(ConsultaPsicologicaformRequest $request, $id){

        $consultap=ConsultaPsicologica::findOrFail($id);
        $consultap->detalle=$request->get('detalle');
        $consultap->observacion=$request->get('observacion');
        $mytime = Carbon::now('America/El_Salvador');
        $consultap->fecha_consulta=$mytime->toDateTimeString();
        $consultap->estado='1';
        $consultap->idpaciente=$request ->get('idpaciente');
        $consultap->update();
        return Redirect::to('consulta/consulta_psicologica');
    }
     public function destroy($id){
        $consultap=ConsultaPsicologica::findOrFail($id);
        $consultap->estado='0';
        $consultap->update();
        return Redirect::to('consulta/consulta_psicologica');
    }
}
