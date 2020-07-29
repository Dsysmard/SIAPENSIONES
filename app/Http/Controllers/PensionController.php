<?php

namespace App\Http\Controllers;
use App\Pension as Pension;
use Illuminate\Http\Request;

class PensionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pension = Pension::all();
        return \View::make('catalogos.pension.index', compact('pension'));
    }

    public function search(Request $request){
         $pension = Pension::where('clave','like','%'.$request->clave.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        //$municipio = Municipio::where('mun_res', '=', $request->mun_res)->get();
        return \View::make('catalogos.pension.index',compact('pension'));
    }

    public function create()
    {
        return \View::make('catalogos.pension.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'descripcion' => 'required',
            'clave' => 'required',
          
        ],[
            'descripcion.required' => 'El campo Descripcion es requerido.',
            'clave.required' => 'El campo clave es requerido.',
        
        ]);

        $pension = new Pension;
        $pension->descripcion = $request->descripcion;
        $pension->clave = $request->clave;
        $pension->save();

        return redirect('catalogos/pension');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $pension = Pension::find($id);
        return view ('catalogos.pension.update',["pension" => $pension]);
    }

    public function update(Request $request, $id)
    {
        $pension = Pension::find($id);;
        $pension->descripcion = $request->descripcion;
        $pension->clave = $request->clave;   
        if($pension->save())
        {
            return redirect("/catalogos/pension");
        }
        else{
            return view("catalogos/pension.edit", ["pension" => $pension]);
        }
    }

    public function destroy($id)
    {
        $pension = Pension::find($id);
        $pension->delete();
        return redirect()->back();
    }
}
