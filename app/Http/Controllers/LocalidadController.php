<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localodad as Localodad;
class LocalidadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $localidad = Localodad::all();
        return \View::make('catalogos.localidad.index', compact('localidad'));
    }

    public function search(Request $request){
         //$localidad = Localodad::where('loc_res','like','%'.$request->loc_res.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $localidad = Localodad::where('loc_res', '=', $request->loc_res)->get();
        return \View::make('catalogos.localidad.index',compact('localidad'));
    }

    public function create()
    {
        return \View::make('catalogos.localidad.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'loc_res' => 'required',
          
        ],[
            'loc_res.required' => 'El campo Localidad es requerido.',
        
        ]);

        $localidad = new Localodad;
        $localidad->loc_res = $request->loc_res;
        $localidad->save();

        return redirect('catalogos/localidad');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $localidad = Localodad::find($id);
        return view ('catalogos.localidad.update',["localidad" => $localidad]);
    }

    public function update(Request $request, $id)
    {
        $localidad = Localodad::find($id);;
        $localidad->loc_res = $request->loc_res;   
        if($localidad->save())
        {
            return redirect("/catalogos/localidad");
        }
        else{
            return view("catalogos/localidad.edit", ["localidad" => $localidad]);
        }
    }

    public function destroy($id)
    {
        $localidad = Localodad::find($id);
        $localidad->delete();
        return redirect()->back();
    }
}
