<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Tesi;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;
class TesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function index(Request $request)
    {
      $global=Tesi::paginate(2);
if($request->Ajax()){

return response()->json(view ("Tesi/modal.mirar",compact('global'))->render());

}
return view ("Tesi.index",compact('global'));

    }


    public function indexb(Request $request)
    {
  $query=$request->get('query');
    $querycat=$request->cate;

    if($querycat==""){
      $global=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);


    return response()->json(view ("Tesi/modal.mirar",compact('global'))->render());

  }else if($querycat=="maestria"|$querycat=="doctorado" && $query==""){

    $global=DB::table('tesis')->where('grado','like','%'.$querycat.'%')->paginate(2);


  return response()->json(view ("Tesi/modal.mirar",compact('global'))->render());


}else if($querycat=="maestria"|$querycat=="doctorado" && $query!="") {
  $global=DB::table('tesis')->where('titulo','like','%'.$query.'%')->where('grado','like','%'.$querycat.'%')->paginate(2);

return response()->json(view ("Tesi/modal.mirar",compact('global'))->render());
}else{
  $global=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);

  return response()->json(view ("Tesi/modal.mirar",compact('global'))->render());

}


    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  $global=Tesi::all();
    return view("Tesi/modal.mirar",compact('global'));
        }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mirar()
      {
          $global=Tesi::paginate(2);

      return view("Tesi/modal.mirar",compact('global'));
    }


    public function categoriabus(Request $request)
    {
      if($request->ajax()){
  $query=$request->get('query');
  $output="";
  if($query=="todo"){

   $data=Tesi::orderBy('fecha', 'asc')->paginate(2);

  }else{
  $data=DB::table('tesis')->where('grado','like',$query)->paginate(2);
}
$total_result=$data->count();
  if($total_result>0){

                  $output .='
                  <div class="academy-blog-posts">
                  	<div class="row">';
                    foreach($data as $tesi){
                    $output.='
                  		<div class="col-md-4 col-lg-4">
                  						<div class="block-2">
                  							<div class="flipper">
                  								<div class="front" style="background-image: url(../img/clients-img/libro1.jpg);">
                  									<div class="box">
                  										<h2 id="tilt">'.$tesi->titulo.'</h2>
                  										<p>'.$tesi->fecha.'</p>
                  									</div>
                  								</div>
                  								<div class="back" >
                  									<!-- back content -->

                  									<blockquote>
                  									<p style="text-align: justify; color: hsl(11, 1%, 92%);">	Por:'.$tesi->autores.'</p>
                  									</blockquote>
                  	<input type="hidden" name="_token" value="'.csrf_token().'"  id="token2">
                  		<a href="http://127.0.0.1:8000/mirar/descargar/'.$tesi->id.'" class="algo"  title="Descargar" name="'.$tesi->id.'" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
                  		<a href="#" class="esto" title="más Información" name="'.$tesi->id.'"  data-target="#moreinfomodal" data-toggle="modal"  onclick="infotesi(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>

                  		<a href="#" class="modi" title="Modificar"  name="'.$tesi->id.'"  data-target="#updatemodal" data-toggle="modal"  onclick="mostrar(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
                  			<a href="#" class="del" title="eliminar"  name="'.$tesi->id.'"  data-toggle="modal"  id="eliminartes" >	<i style="color:#61ba6d;" class="fa fa-trash fa-2x"></i></a>

                  																	<div class="author d-flex">
                  										<div class="image mr-3 align-self-center">
                  										<a href="#" class="icon-dowload"></a>
                  										</div>
                  										<div class="name align-self-center"> <span class="position">'.$tesi->instituto.'</span></div>
                  									</div>
                  								</div>
                  							</div>
                  						</div> <!-- .flip-container -->
                  				</div>
    ';
    }
                $output .='
                  </div>
                  </div>



                  <!-- Pagination Area Start -->
                  		<nav>
                  '.$data->render().'
                  		</nav>
                  ';

  }else {
                $output='  <tr>
            <td align="center" colspan="5">Busqueda no encontrada</td>
            </tr>';
  }

  $data=array('table_data'=>$output);

echo json_encode($data);

      }
}




    public function buscar(Request $request)
      {
        if($request->ajax()){
          $output="";
            $query=$request->get('query');
            $querycat=$request->cate;
            if($query!='' && $querycat=="maestria"||$querycat=="doctorado"){

              $data=DB::table('tesis')->where('titulo','like','%'.$query.'%')->where('grado','like','%'.$querycat.'%')->paginate(2);

            }else if($query!="" && $querycat=="nulo"){

              $data=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);
            }else{

              $data=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);

            }


            $total_result=$data->count();
            if($total_result>0){


              $output .='
              <div class="academy-blog-posts">
              	<div class="row">';
                foreach($data as $tesi){
                $output.='
              		<div class="col-md-4 col-lg-4">
              						<div class="block-2">
              							<div class="flipper">
              								<div class="front" style="background-image: url(../img/clients-img/libro1.jpg);">
              									<div class="box">
              										<h2 id="tilt">'.$tesi->titulo.'</h2>
              										<p>'.$tesi->fecha.'</p>
              									</div>
              								</div>
              								<div class="back" >
              									<!-- back content -->

              									<blockquote>
              									<p style="text-align: justify; color: hsl(11, 1%, 92%);">	Por:'.$tesi->autores.'</p>
              									</blockquote>
              	<input type="hidden" name="_token" value="'.csrf_token().'" id="token2">
              			<a href="http://127.0.0.1:8000/mirar/descargar/'.$tesi->id.'" class="algo"  title="Descargar" name="'.$tesi->id.'" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
              		<a href="#" class="esto" title="más Información" name="'.$tesi->id.'"  data-target="#moreinfomodal" data-toggle="modal"  onclick="infotesi(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>

              		<a href="#" class="modi" title="Modificar"  name="'.$tesi->id.'"  data-target="#updatemodal" data-toggle="modal"  onclick="mostrar(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
              			<a href="#" class="del" title="eliminar"  name="'.$tesi->id.'"  data-toggle="modal"  id="eliminartes" >	<i style="color:#61ba6d;" class="fa fa-trash fa-2x"></i></a>

              																	<div class="author d-flex">
              										<div class="image mr-3 align-self-center">
              										<a href="#" class="icon-dowload"></a>
              										</div>
              										<div class="name align-self-center"> <span class="position">'.$tesi->instituto.'</span></div>
              									</div>
              								</div>
              							</div>
              						</div> <!-- .flip-container -->
              				</div>
';
}
            $output .='
              </div>
              </div>



              <!-- Pagination Area Start -->
              		<nav>
              '.$data->render().'
              		</nav>
              ';

            }else{
            $output='none';

            }
            $data=array('table_data'=>$output);

          echo json_encode($data);


    }}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validar=validator::make($request->all(),[
        'titulo'=>'required',
        'fecha'=>'required',
        'resumen'=>'required',
        'grado'=>'required',
        'documento'=>'required|mimes:pdf',
      ]);

if($validar->passes()){

  $entrada=$request->all();
  $archivo=$request->file('documento');
  $nombre=$archivo->getClientOriginalName();
  $carpeta="img/repositorio/".$nombre."";

$data=DB::table('tesis')->where('documento','like',$nombre)->get();

if(count($data)>=1){
return response()->json(['success'=>'El registro ya existe']);

}else{
$archivo->move('img/repositorio',$nombre);
$entrada['documento']=$nombre;
$entrada['directorio']=$carpeta;

Tesi::create($entrada);

return response()->json(['success'=>'Registro Agregado']);
}


}else{

foreach ($validar->errors()->all() as $message) {

  return response()->json(['error'=>$message]);
}

}





//\Storage::disk('local')->put($nombre, \File::get($archivo));

/*
    $tesis= new Tesi;
    $tesis->titulo=$request->titulo;
   $tesis->autores=$request->autores;
    $tesis->instituto=$request->instituto;
    $tesis->fecha=$request->fecha;
    $tesis->resumen=$request->resumen;
    $tesis->grado=$request->grado;
    $tesis->documento=$request->documento;
    $tesis->directorio=$request->directorio;
*/



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
$tesis=Tesi::find($id);
return response()->json($tesis->toArray());
//return view("Tesi/modal.show",compact('tesis'));


    }
    public function actualizar($id)
    {
        //


$tesis=Tesi::findOrFail($id);
return response()->json($tesis);
//return view("Tesi/modal.show",compact('tesis'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function updatefile(Request $request, $id)
      {
          //

          $validar=validator::make($request->all(),[
            'documentoup'=>'mimes:pdf',
          ]);
if($validar->passes()){
          $Tesiold=Tesi::find($id);

          //$Tesiold->delete();
          $archivo=$request->file('documentoup');
            $nombre=$archivo->getClientOriginalName();
          $carpeta="img/repositorio/".$nombre;
        /*  $fileregistro = new Tesi;
          $fileregistro->documento =$nombre;
          $fileregistro->directorio=$carpeta;
  */
        //  \Storage::disk('local')->put($nombre, \File::get($archivo));
          $archivo->move('img/repositorio',$nombre);
        //  $entrada['documento']=$nombre;

          $Tesiold->fill($request->all());
  $Tesiold->save();

          return response()->json();
}else{
  foreach ($validar->errors()->all() as $message) {

    return response()->json(['error'=>$message]);
  }

}
      }




    public function edit($id)
    {
        //

        $tesis=Tesi::find($id);
        return response()->json($tesis->toArray());
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


        $Tesi=Tesi::find($id);
        $archivo=$request->documentopv;
        $archivo2=$Tesi->documento;
        if($archivo!="nulo"){
        unlink($Tesi->directorio);
      //  $tesi->documento=$archivo2;
      }
        $Tesi->fill($request->all());
        $Tesi->save();
    return response()->json(['success'=>'Registro Modificado']);


}




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $tesi=Tesi::findOrFail($id);
      unlink($tesi->directorio);
      $tesi->delete();
      return response()->json(["success"=>"Tesis borrada"]);
    }


    public function descargardoc($id)
    {
     $tesi=Tesi::findOrFail($id);
      $nombre=$tesi->documento;
      $file= public_path(). "/img/repositorio/".$nombre."";
      return response()->download($file);

    }

}
