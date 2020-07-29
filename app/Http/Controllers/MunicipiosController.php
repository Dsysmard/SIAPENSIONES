<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio as Municipio;
class MunicipiosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $municipio = Municipio::all();
        return \View::make('catalogos.municipio.index', compact('municipio'));
    }

    public function search(Request $request){
        // $municipio = Municipio::where('mun_res','like','%'.$request->mun_res.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $municipio = Municipio::where('mun_res', '=', $request->mun_res)->get();
        return \View::make('catalogos.municipio.index',compact('municipio'));
    }

    public function create()
    {
        return \View::make('catalogos.municipio.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'mun_res' => 'required',
          
        ],[
            'mun_res.required' => 'El campo Municipio es requerido.',
        
        ]);

        $municipio = new Municipio;
        $municipio->mun_res = $request->mun_res;
        $municipio->save();

        return redirect('catalogos/municipio');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $municipio = Municipio::find($id);
        return view ('catalogos.municipio.update',["municipio" => $municipio]);
    }

    public function update(Request $request, $id)
    {
        $municipio = Municipio::find($id);;
        $municipio->mun_res = $request->mun_res;   
        if($municipio->save())
        {
            return redirect("/catalogos/municipio");
        }
        else{
            return view("catalogos/municipio.edit", ["municipio" => $municipio]);
        }
    }

    public function destroy($id)
    {
        $municipio = Municipio::find($id);
        $municipio->delete();
        return redirect()->back();
    }
}
