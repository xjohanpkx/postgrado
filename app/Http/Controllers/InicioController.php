<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Noticia;
use App\User;
use App\admitido;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;


class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $global=Noticia::orderBy('fechanoti', 'asc')->paginate(4);


      if($request->Ajax()){

      return response()->json(view ("Noticia/modal.mirarnoti",compact('global'))->render());

      }
      return view ("index",compact('global'));
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function info(Request $request)
    {
      $funcion=$request->fun;
if($funcion=="mision"){
  return response()->json(view ("inicio/modal.mision")->render());

}else if($funcion=="maestrias"){

  return response()->json(view ("inicio/modal.maestrias")->render());
}else if($funcion=="especia"){

  return response()->json(view ("inicio/modal.Especializaciones")->render());
}else if($funcion=="admision"){

  return response()->json(view ("inicio/modal.admision")->render());
}else if($funcion=="preisncri"){

  return response()->json(view ("inicio/modal.preisncri")->render());
}else if($funcion=="admitidos"){

$global=admitido::all();
  return response()->json(view ("inicio/modal.admitidos",compact("global"))->render());
}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


public function descargardoc($id)
{
 $pdf=admitido::findOrFail($id);
  $nombre=$pdf->pdf;
  $file= public_path(). "/img/admitidos/".$nombre."";
  return response()->download($file);

}
}
