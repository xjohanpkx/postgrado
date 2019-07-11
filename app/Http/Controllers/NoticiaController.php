<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Noticia;
use App\User;
use Illuminate\Support\Facades\Storage;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;


class NoticiaController extends Controller
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
        //

  $global=Noticia::orderBy('fechanoti', 'desc')->paginate(2);


  if($request->Ajax()){

  return response()->json(view ("Noticia/modal.mirarnoti",compact('global'))->render());

  }
  return view ("Noticia.index",compact('global'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function mirar()
      {
    $global=Noticia::orderBy('fechanoti', 'desc')->paginate(2);

      return view("Noticia/modal.mirarnoti",compact('global'));
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
        $validar=validator::make($request->all(),[
          'titulonoti'=>'required',

          'texto'=>'required',
          'fechanoti'=>'required',

        ]);

        if($validar->passes()){

        $entrada=$request->all();
        $archivo=$request->file('imagen');
if($archivo!=""){

  $nombre=$archivo->getClientOriginalName();
$carpeta="img/noticias/".$nombre."";

$data=DB::table('noticias')->where('imagen','like',$nombre)->get();

if(count($data)>=1){
return response()->json(['error'=>'la imagen ya existe']);

}else{
$archivo->move('img/noticias',$nombre);
$entrada['imagen']=$nombre;
$entrada['directorio']=$carpeta;

Noticia::create($entrada);

return response()->json(['success'=>'Registro Agregado']);
}
}else{
  $nombre="1.jpg";
  $carpeta="img/noticias/".$nombre."";
  $entrada['imagen']=$nombre;
  $entrada['directorio']=$carpeta;

  Noticia::create($entrada);

  return response()->json(['success'=>'Registro Agregado']);
}
        }else{

        foreach ($validar->errors()->all() as $message) {

        return response()->json(['error'=>$message]);
        }

        }


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
      $noticia=Noticia::find($id);
      return response()->json($noticia->toArray());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function updatefile(Request $request, $id)
      {
          //

          $validar=validator::make($request->all(),[
            'imagenup'=>'image|mimes:jpeg,jpg,png,gif',
          ]);
  if($validar->passes()){
          $noticiaold=Noticia::find($id);

          //$Tesiold->delete();
          $archivo=$request->file('imagenup');
            $nombre=$archivo->getClientOriginalName();
          $carpeta="img/noticias/".$nombre;
        /*  $fileregistro = new Tesi;
          $fileregistro->documento =$nombre;
          $fileregistro->directorio=$carpeta;
  */
        //  \Storage::disk('local')->put($nombre, \File::get($archivo));
          $archivo->move('img/noticias',$nombre);
        //  $entrada['documento']=$nombre;

          $noticiaold->fill($request->all());
  $noticiaold->save();

          return response()->json();
  }else{
  foreach ($validar->errors()->all() as $message) {

    return response()->json(['error'=>$message]);
  }

  }
      }





    public function update(Request $request, $id)
    {
      $noticia=Noticia::find($id);
      $archivo=$request->imagenpv;
      $archivo2=$noticia->imagen;
      if($archivo!="nada" && $archivo2!="1.jpg"){

      unlink($noticia->directorio);
    //  $tesi->documento=$archivo2;
  }
      $noticia->fill($request->all());
      $noticia->save();
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
      $noticia=Noticia::findOrFail($id);
      if($noticia->imagen!="1.jpg"){
      unlink($noticia->directorio);
    }
      $noticia->delete();
      return response()->json(["success"=>"Noticia borrada"]);
    }


//buscar una noticia por parametros
    public function buscar(Request $request)
      {
        if($request->ajax()){
          $output="";
            $query=$request->get('query');

            if($query!=''){
              $data=DB::table('noticias')
              ->where('titulonoti','like','%'.$query.'%')->paginate(2);

            }else{

            }

            $total_result=$data->count();
            if($total_result>0){


              $output .='
              <div class="academy-blog-posts">
              	<div class="row">';
                foreach($data as $noticia){
                $output.='

                <!-- Single Blog Start -->
               <div class="col-12">
                   <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
                       <!-- Post Thumb -->
                       <div class="blog-post-thumb mb-50">
<input type="hidden" name="_token" value="'.csrf_token().'" id="token2">
                           <img src="'.$noticia->directorio.'" style="max-height:300px; width:100%;" alt="">
                                </div>
                       <!-- Post Title -->
                       <a href="#" class="post-title">'.$noticia->titulonoti.'</a>
                       <!-- Post Meta -->
                       <div class="post-meta">

                           <p>Por <a href="#">'.$noticia->autor.'</a> | <a href="#">'.$noticia->fechanoti.'</a> |</p>
                       </div>
                       <!-- Post Excerpt -->
                       <p style="font-size:14px;">'.$noticia->texto.'</p>
                       <a href="#" class="modinot mt-15" title="Modificar"  name="'.$noticia->id.'"  data-target="#updatemodalnoti" data-toggle="modal"  onclick="mostrarnoti(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
                         <a href="#" class="delnot" title="eliminar"  name="'.$noticia->id.'"  data-toggle="modal"  id="eliminarnoti" >	<i style="color:#61ba6d;" class="fa fa-trash fa-2x"></i></a>
                   </div>


               </div>


    ';}
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


//paginacion de noticias de una busqueda realizada

    public function indexb(Request $request)
    {
  $query=$request->get('query');
  if($query=="maestria"|$query=="doctorado"){

    $data=DB::table('noticias')->where('autor','like','%'.$query.'%')->paginate(2);


  return response()->json(view ("Tesi/modal.buscartesis",compact('data'))->render());


  }else{
      $global=DB::table('noticias')->where('titulonoti','like','%'.$query.'%')->paginate(2);

  return response()->json(view ("Noticia/modal.mirarnoti",compact('global'))->render());
  }


    }










  }
