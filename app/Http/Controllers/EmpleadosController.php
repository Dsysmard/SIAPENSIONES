<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado as Empleado;
use App\EstadoCivil as EstadoCivil;
use App\Estatus as Estatus;
use App\Entidad as Entidad;
use App\Estado as Estado;
use App\Municipio as Municipio;
use App\Localodad as Localodad;
use App\Colonia as Colonia;
use App\Baja as Baja;
use App\Pension as Pension;
class EmpleadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $empleado = Empleado::all();
        $pension = Pension::all();
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        return \View::make('catalogos.empleado.index', compact('empleado','pension','ecivil','estatus',
        'entidad','estado','municipio','localidad','colonia','baja'));
    }

    public function search(Request $request){
         //$empleado = Empleado::where('clave','like','%'.$request->clave.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $empleado = Empleado::where('clave', '=', $request->clave)->get();
        return \View::make('catalogos.empleado.index',compact('empleado'));
    }

    public function create()
    {
        $empleado = Empleado::all();
        $pension = Pension::all();
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        return \View::make('catalogos.empleado.create', compact('empleado','pension','ecivil','estatus',
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
            'num_calle' => 'required',
            'fecha_alta' => 'required',
            'fecha_modificacion' => 'required',
            'fecha_baja' => 'required',
            'motivo_baja' => 'required',
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
            'fecha_alta.required' => 'El campo Fecha de Alta  es requerido.',
            'fecha_modificacion.required' => 'El campo Fecha de Modificacion  es requerido.',
            'fecha_baja.required' => 'El campo Fecha  es requerido.',
            'motivo_baja.required' => 'El campo Motivo  es requerido.',
            'observaciones.required' => 'El campo Observaciones  es requerido.',
        
        ]);

        $empleado = new Empleado;
        $empleado->clave = $request->clave;
        $empleado->rfc = $request->rfc;
        $empleado->curp = $request->curp;
        $empleado->ap_paterno = $request->ap_paterno;
        $empleado->materno = $request->materno;
        $empleado->nombre = $request->nombre;
        $empleado->edo_civil = $request->edo_civil;
        $empleado->estatus = $request->estatus;
        $empleado->entidad = $request->entidad;
        $empleado->tip_nom = $request->tip_nom;
        $empleado->edo_res = $request->edo_res;
        $empleado->mun_res = $request->mun_res;
        $empleado->loc_res = $request->loc_res;
        $empleado->colonia = $request->colonia;
        $empleado->num_calle = $request->num_calle;
        $empleado->fecha_alta = $request->fecha_alta;
        $empleado->fecha_modificacion = $request->fecha_modificacion;
        $empleado->fecha_baja = $request->fecha_baja;
        $empleado->motivo_baja = $request->motivo_baja;
        $empleado->observaciones = $request->observaciones;
        $empleado->save();

        return redirect('catalogos/empleado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $empleado = Empleado::find($id);
        $ecivil = EstadoCivil::all();
        $estatus = Estatus::all();
        $entidad = Entidad::all();
        $estado = Estado::all();
        $municipio = Municipio::all();
        $localidad = Localodad::all();
        $colonia = Colonia::all();
        $baja = Baja::all();
        return view ('catalogos.empleado.update',["empleado" => $empleado,"ecivil" => $ecivil,"estatus" => $estatus,"entidad" => $entidad,"estado" => $estado,"municipio" => $municipio,"localidad" => $localidad,"colonia" => $colonia,"baja" => $baja]);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);
        $empleado->clave = $request->clave;
        $empleado->rfc = $request->rfc;
        $empleado->curp = $request->curp;
        $empleado->ap_paterno = $request->ap_materno;
        $empleado->nombre = $request->nombre;
        $empleado->edo_civil = $request->edo_civil;
        $empleado->estatus = $request->estatus;
        $empleado->entidad = $request->entidad;
        $empleado->tip_nom = $request->tip_nom;
        $empleado->edo_res = $request->edo_res;
        $empleado->mun_res = $request->mun_res;
        $empleado->loc_res = $request->loc_res;
        $empleado->colonia = $request->colonia;
        $empleado->num_calle = $request->num_calle;
        $empleado->fecha_alta = $request->fecha_alta;
        $empleado->fecha_modificacion = $request->fecha_modificacion;
        $empleado->fecha_baja = $request->fecha_baja;
        $empleado->motivo_baja = $request->motivo_baja;
        $empleado->observaciones = $request->observaciones;
        if($empleado->save())
        {
            return redirect("/catalogos/empleado");
        }
        else{
            return view("catalogos/empleado.edit", ["empleado" => $empleado]);
        }
    }

    public function destroy($id)
    {
        $empleado = Empleado::find($id);
        $empleado->delete();
        return redirect()->back();
    }
}
