<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entidad as Entidad;
class EntidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $entidad = Entidad::all();
        return \View::make('catalogos.entidad.index', compact('entidad'));
    }

    public function search(Request $request){
        // $entidad = Entidad::where('entidad','like','%'.$request->entidad.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $entidad = Entidad::where('entidad', '=', $request->entidad)->get();
        return \View::make('catalogos.entidad.index',compact('entidad'));
    }

    public function create()
    {
        return \View::make('catalogos.entidad.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'entidad' => 'required',
          
        ],[
            'entidad.required' => 'El campo Entidad es requerido.',
        
        ]);

        $entidad = new Entidad;
        $entidad->entidad = $request->entidad;
        $entidad->save();

        return redirect('catalogos/entidad');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $entidad = Entidad::find($id);
        return view ('catalogos.entidad.update',["entidad" => $entidad]);
    }

    public function update(Request $request, $id)
    {
        $entidad = Entidad::find($id);;
        $entidad->entidad = $request->entidad;   
        if($entidad->save())
        {
            return redirect("/catalogos/entidad");
        }
        else{
            return view("catalogos/entidad.edit", ["entidad" => $entidad]);
        }
    }

    public function destroy($id)
    {
        $entidad = Entidad::find($id);
        $entidad->delete();
        return redirect()->back();
    }
}