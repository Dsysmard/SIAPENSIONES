<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pensionado as Pensionado;
use App\EstadoCivil as EstadoCivil;
use App\Estatus as Estatus;
use App\Entidad as Entidad;
use App\Estado as Estado;
use App\Municipio as Municipio;
use App\Localodad as Localodad;
use App\Colonia as Colonia;
use App\Baja as Baja;
use App\Pension as Pension;
class PensionadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pensionado = Pensionado::all();
        $pension = Pension::all();
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        return \View::make('catalogos.pensionado.index', compact('pensionado','pension','ecivil','estatus',
        'entidad','estado','municipio','localidad','colonia','baja'));
    }

    public function search(Request $request){
         //$empleado = Empleado::where('clave','like','%'.$request->clave.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $pensionado = Pensionado::where('clave', '=', $request->clave)->get();
        return \View::make('catalogos.pensionado.index',compact('pensionado'));
    }

    public function create()
    {
        $pensionado = Pensionado::all();
        $pension = Pension::all();
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        return \View::make('catalogos.pensionado.create', compact('pensionado','pension','ecivil','estatus',
        'entidad','estado','municipio','localidad','colonia','baja'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'clave' => 'required',
            'rfc' => 'required',
            'curp' => 'required',
            'ap_paterno' => 'required',
            'ap_materno' => 'required',
            'nombre' => 'required',
            'edo_civil' => 'required',
            'estatus' => 'required',
            'entidad' => 'required',
            'tip_nom' => 'required',
            'edo_res' => 'required',
            'mun_res' => 'required',
            'loc_res' => 'required',
            'colonia' => 'required',
            'Fecha_final_lab' => 'required',
            'fecha_alta' => 'required',
            'fecha_modificacion' => 'required',
            'fecha_baja' => 'required',
            'modo_pension' => 'required',
            'observaciones' => 'required',
          
        ],[
            'clave.required' => 'El campo Clave  es requerido.',
            'curp.required' => 'El campo CURP  es requerido.',
            'ap_paterno.required' => 'El Apellido Paterno   es requerido.',
            'ap_materno.required' => 'El Apellido Materno   es requerido.',
            'nombre.required' => 'El campo Nombre  es requerido.',
            'edo_civil.required' => 'El campo Estado Civil   es requerido.',
            'estatus.required' => 'El campo Estatus  es requerido.',
            'entidad.required' => 'El campo Entidad  es requerido.',
            'tip_nom.required' => 'El campo Tipo De Nomina  es requerido.',
            'edo_res.required' => 'El campo Estado Responsable  es requerido.',
            'mun_res.required' => 'El campo Municipio Responsable  es requerido.',
            'loc_res.required' => 'El campo Localidad Responsable  es requerido.',
            'colonia.required' => 'El campo Colonia  es requerido.',
            'num_calle.required' => 'El campo Numero de Calle  es requerido.',
            'Fecha_final_lab.required' => 'El campo Fecha Final Laborada  es requerido.',
            'fecha_modificacion.required' => 'El campo Fecha de Modificacion  es requerido.',
            'fecha_baja.required' => 'El campo Fecha  es requerido.',
            'modo_pension.required' => 'El campo Modo de Pension  es requerido.',
            'observaciones.required' => 'El campo Observaciones  es requerido.',
        
        ]);

        $pensionado = new Pensionado;
        
        $pensionado->clave = $request->clave;
        $pensionado->rfc = $request->rfc;
        $pensionado->curp = $request->curp;
        $pensionado->ap_paterno = $request->ap_paterno;
        $pensionado->ap_meterno = $request->ap_meterno;
        $pensionado->nombre = $request->nombre;
        $pensionado->edo_civil = $request->edo_civil;
        $pensionado->estatus = $request->estatus;
        $pensionado->tip_nom = $request->tip_nom;
        $pensionado->edo_res = $request->edo_res;
        $pensionado->mun_res = $request->mun_res;
        $pensionado->loc_res = $request->loc_res;
        $pensionado->colonia = $request->colonia;
        $pensionado->calle_num = $request->calle_num;
        $pensionado->Fecha_final_lab = $request->Fecha_final_lab;
        $pensionado->fecha_modificacion = $request->fecha_modificacion;
        $pensionado->fecha_baja = $request->fecha_baja;
        $pensionado->modo_pension = $request->modo_pension;
        $pensionado->observaciones = $request->observaciones;
        
        $pensionado->save();

        return redirect('catalogos/pensionado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pensionado = Pensionado::find($id);
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        $pension = Pension::all();
        return view ('catalogos.pensionado.update',["pensionado" => $pensionado,"ecivil" => $ecivil,"estatus" => $estatus,"entidad" => $entidad,"estado" => $estado,"municipio" => $municipio,"localidad" => $localidad,"colonia" => $colonia,"baja" => $baja,"pension" => $pension]);
    }

    public function update(Request $request, $id)
    {
        $pensionado = Pensionado::find($id);
        
        $pensionado->clave = $request->clave;
        $pensionado->rfc = $request->rfc;
        $pensionado->curp = $request->curp;
        $pensionado->ap_paterno = $request->ap_paterno;
        $pensionado->ap_meterno = $request->ap_meterno;
        $pensionado->nombre = $request->nombre;
        $pensionado->edo_civil = $request->edo_civil;
        $pensionado->estatus = $request->estatus;
        $pensionado->tip_nom = $request->tip_nom;
        $pensionado->edo_res = $request->edo_res;
        $pensionado->mun_res = $request->mun_res;
        $pensionado->loc_res = $request->loc_res;
        $pensionado->colonia = $request->colonia;
        $pensionado->calle_num = $request->calle_num;
        $pensionado->Fecha_final_lab = $request->Fecha_final_lab;
        $pensionado->fecha_modificacion = $request->fecha_modificacion;
        $pensionado->fecha_baja = $request->fecha_baja;
        $pensionado->modo_pension = $request->modo_pension;
        $pensionado->observaciones = $request->observaciones;
        
        if($pensionado->save())
        {
            return redirect("/catalogos/pensionado");
        }
        else{
            return view("catalogos/pensionado.edit", ["pensionado" => $pensionado]);
        }
    }

    public function destroy($id)
    {
        $pensionado = Pensionado::find($id);
        $pensionado->delete();
        return redirect()->back();
    }
}
