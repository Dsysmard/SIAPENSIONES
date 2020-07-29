<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estatus as Estatus;
class EstatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estatus = Estatus::all();
        return \View::make('catalogos.estatus.index', compact('estatus'));
    }

    public function search(Request $request){
         //$estatus = Estatus::where('estatus','like','%'.$request->estatus.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $estatus = Pedido::where('estatus', '=', $request->estatus)->get();
        return \View::make('catalogos.estatus.index',compact('estatus'));
    }

    public function create()
    {
        return \View::make('catalogos.estatus.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'estatus' => 'required',
          
        ],[
            'estatus.required' => 'El campo Estatus es requerido.',
        
        ]);

        $estatus = new Estatus;
        $estatus->estatus = $request->estatus;
        $estatus->save();

        return redirect('catalogos/bajas');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $estatus = Estatus::find($id);
        return view ('catalogos.estatus.update',["estatus" => $estatus]);
    }

    public function update(Request $request, $id)
    {
        $estatus = Estatus::find($id);;
        $estatus->estatus = $request->estatus;   
        if($estatus->save())
        {
            return redirect("/catalogos/estatus");
        }
        else{
            return view("catalogos/estatus.edit", ["estatus" => $estatus]);
        }
    }

    public function destroy($id)
    {
        $estatus = Estatus::find($id);
        $estatus->delete();
        return redirect()->back();
    }
}
