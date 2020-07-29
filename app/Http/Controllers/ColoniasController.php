<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colonia as Colonia;
class ColoniasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $colonia = Colonia::all();
        return \View::make('catalogos.colonia.index', compact('colonia'));
    }

    public function search(Request $request){
         //$colonia = Colonia::where('colonia','like','%'.$request->colonia.'%')->get(); 

        //Cambiando la clausula de conexion soportada por Heroku ya que utiliza postgresql y no mysql
        $colonia = Colonia::where('colonia', '=', $request->colonia)->get();
        return \View::make('catalogos.colonia.index',compact('colonia'));
    }

    public function create()
    {
        return \View::make('catalogos.colonia.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'colonia' => 'required',
          
        ],[
            'colonia.required' => 'El campo Colonia es requerido.',
        
        ]);

        $colonia = new Colonia;
        $colonia->colonia = $request->colonia;
        $colonia->save();

        return redirect('catalogos/colonia');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $colonia = Colonia::find($id);
        return view ('catalogos.colonia.update',["colonia" => $colonia]);
    }

    public function update(Request $request, $id)
    {
        $colonia = Colonia::find($id);;
        $colonia->colonia = $request->colonia;
        if($colonia->save())
        {
            return redirect("/catalogos/colonia");
        }
        else{
            return view("catalogos/colonia.edit", ["colonia" => $colonia]);
        }
    }

    public function destroy($id)
    {
        $colonia = Colonia::find($id);
        $colonia->delete();
        return redirect()->back();
    }
}
