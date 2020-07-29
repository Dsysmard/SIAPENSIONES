<?php

namespace App\Http\Controllers;
use App\Baja as Baja;
use Illuminate\Http\Request;

class BajasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $baja = Baja::all();
        return \View::make('catalogos.bajas.index', compact('baja'));
    }

    public function search(Request $request){
         //$baja = Baja::where('motivo_baja','like','%'.$request->motivo_baja.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $bajas = Baja::where('motivo_baja', '=', $request->motivo_baja)->get();
        return \View::make('catalogos.bajas.index',compact('baja'));
    }

    public function create()
    {
        return \View::make('catalogos.bajas.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'motivo_baja' => 'required',
          
        ],[
            'motivo_baja.required' => 'El campo Motivo de Baja es requerido.',
        
        ]);
        
            $baja = new Baja();
            $baja->motivo_baja = $request->motivo_baja;
            $baja->save();
            return response()->json($baja);
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        
        $baja = Baja::find($id);
        return view ('catalogos.bajas.update',["baja" => $baja]);
    }

    public function update(Request $request, $id)
    {
        $baja = Baja::find($id);;
        $baja->motivo_baja = $request->motivo_baja;   
        if($baja->save())
        {
            return redirect("/catalogos/bajas");
        }
        else{
            return view("catalogos/bajas.edit", ["baja" => $baja]);
        }
    }

    public function destroy($id)
    {
        $baja = Baja::find($id);
        $baja->delete();
        return redirect()->back();
    }
}
