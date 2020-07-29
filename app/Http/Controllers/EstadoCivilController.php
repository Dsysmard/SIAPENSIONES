<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoCivil as EstadoCivil;
class EstadoCivilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ecivil = EstadoCivil::all();
        return \View::make('catalogos.estadocivil.index', compact('ecivil'));
    }

    public function search(Request $request){
        // $ecivil = EstadoCivil::where('edo_civil','like','%'.$request->edo_civil.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $ecivil = EstadoCivil::where('edo_civil', '=', $request->edo_civil)->get();
        return \View::make('catalogos.estadocivil.index',compact('ecivil'));
    }

    public function create()
    {
        return \View::make('catalogos.estadocivil.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'edo_civil' => 'required',
          
        ],[
            'edo_civil.required' => 'El campo Estado Civil es requerido.',
        
        ]);

        $ecivil = new EstadoCivil;
        $ecivil->edo_civil = $request->edo_civil;
        $ecivil->save();

        return redirect('catalogos/estadocivil');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ecivil = EstadoCivil::find($id);
        return view ('catalogos.estadocivil.update',["ecivil" => $ecivil]);
    }

    public function update(Request $request, $id)
    {
        $ecivil = EstadoCivil::find($id);;
        $ecivil->edo_civil = $request->edo_civil;  
        if($ecivil->save())
        {
            return redirect("/catalogos/estadocivil");
        }
        else{
            return view("catalogos/estadocivil.edit", ["ecivil" => $ecivil]);
        }
    }

    public function destroy($id)
    {
        $ecivil = EstadoCivil::find($id);
        $ecivil->delete();
        return redirect()->back();
    }
}
