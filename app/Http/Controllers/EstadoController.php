<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estado as Estado;
class EstadoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estado = Estado::all();
        return \View::make('catalogos.estado.index', compact('estado'));
    }

    public function search(Request $request){
         //$estado = Estado::where('edo_res','like','%'.$request->edo_res.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $estado = Estado::where('edo_res', '=', $request->edo_res)->get();
        return \View::make('catalogos.estado.index',compact('estado'));
    }

    public function create()
    {
        return \View::make('catalogos.estado.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'edo_res' => 'required',
          
        ],[
            'edo_res.required' => 'El campo Estado es requerido.',
        
        ]);

        $estado = new Estado;
        $estado->edo_res = $request->edo_res;
        $estado->save();

        return redirect('catalogos/estado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $estado = Estado::find($id);
        return view ('catalogos.estado.update',["estado" => $estado]);
    }

    public function update(Request $request, $id)
    {
        $estado = Estado::find($id);;
        $estado->edo_res = $request->edo_res;   
        if($estado->save())
        {
            return redirect("/catalogos/estado");
        }
        else{
            return view("catalogos/estado.edit", ["estado" => $estado]);
        }
    }

    public function destroy($id)
    {
        $estado = Estado::find($id);
        $estado->delete();
        return redirect()->back();
    }
}
