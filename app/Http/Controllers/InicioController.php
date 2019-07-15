<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Noticia;
use App\Tesi;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Route;

use App\User;
use App\admitido;





class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $global=Noticia::orderBy('fechanoti', 'asc')->paginate(2);

      if($request->Ajax()){

      return response()->json(view ("inicio/modal.seminoticia",compact('global'))->render());

      }
      return view ("index");
    }
    public function load_data(Request $request)
    {
            if($request->Ajax()){
            if($request->id > 0){

              $global=DB::table('noticias')->where('id','<',$request->id)->orderBy('id','DESC')->limit(2)->get();


            }else{

              $global=DB::table('noticias')->orderBy('id','DESC')->limit(2)->get();
            }
            $output="";
            $last_id="";
            if(!$global->isEmpty()){

              foreach($global as $noticia){
                $output.='
                        <!-- Single Top Popular Course -->
                              <div class="col-12 col-lg-6">
                                  <div class="single-top-popular-course d-flex align-items-center flex-wrap">
                                      <div class="popular-course-content">
                                          <h5 style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3;-webkit-box-orient: vertical;">'.$noticia->titulonoti.'</h5>
                                          <span>Por '.$noticia->autor.' |'.$noticia->fechanoti.'</span>

                                          <p style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 6;-webkit-box-orient: vertical;">'.$noticia->texto.'</p>
                                          <a href="#" class="btn academy-btn btn-sm">Leer Màs</a>
                                      </div>
                                      <div class="popular-course-thumb bg-img" style="background-image: url('.$noticia->directorio.');"></div>
                                  </div>
                              </div>
                          ';}

$last_id=$noticia->id;
$output.='

    <div id="load_more" class="col-12">
        <div class="load-more-btn text-center">

              <button type="button" id="load_more_boton" data-id="'.$last_id.'"  class="btn academy-btn">Mira más</button>
        </div>
        </div>
  ';
            }else{
              $output.='

              <div id="load_more" class="col-12">
                  <div class="load-more-btn text-center">

              <button type="button" name"load_more_boton" id"load_more_boton" class="btn academy-btn">no hay más noticias</button>
              </div>
              </div>
          ';

            }

      }
echo $output;
    }

    public function indexb(Request $request)
    {
  $query=$request->get('query');
  if($query=="maestria"|$query=="doctorado"){

    $global=DB::table('tesis')->where('grado','like','%'.$query.'%')->paginate(2);


  return response()->json(view ("inicio/modal.mirarpagina",compact('global'))->render());


  }else{
      $global=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);


  return response()->json(view ("inicio/modal.mirarpagina",compact('global'))->render());
  }


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
}else  if($funcion=="noticias"){
$global=Noticia::orderBy('fechanoti', 'desc')->paginate(2);

if($request->Ajax()){

return response()->json(view ("inicio/modal.mirarnoticiainicio",compact('global'))->render());

}
return response()->json(view ("inicio/modal.mirarnoticiainicio",compact('global'))->render());
}else  if($funcion=="noticiasload"){
       $global=Noticia::orderBy('fechanoti', 'desc')->paginate(2);

       if($request->Ajax()){

       return response()->json(view ("inicio/modal.mirarpaginanoti",compact('global'))->render());

       }
        return response()->json(view ("inicio/modal.mirarpaginanoti",compact('global'))->render());

     }else  if($funcion=="tesis"){
       $global=Tesi::orderBy('fecha', 'asc')->paginate(2);

       if($request->Ajax()){

       return response()->json(view ("inicio/modal.mirartesiinicio",compact('global'))->render());

       }
        return response()->json(view ("inicio/modal.mirartesiinicio",compact('global'))->render());

     }else{
       $global=Tesi::orderBy('fecha', 'asc')->paginate(2);

       if($request->Ajax()){

       return response()->json(view ("inicio/modal.mirarpagina",compact('global'))->render());

       }
        return response()->json(view ("inicio/modal.mirarpagina",compact('global'))->render());

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
      $tesis=Tesi::find($id);
      return response()->json($tesis->toArray());
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

public function descargartesi($id)
{
 $tesi=Tesi::findOrFail($id);
  $nombre=$tesi->documento;
  $file= public_path(). "/img/repositorio/".$nombre."";
  return response()->download($file);

}


    public function buscar(Request $request)
      {
        if($request->ajax()){
          $output="";
            $query=$request->get('query');

            if($query!=''){
              $data=DB::table('tesis')
              ->where('titulo','like','%'.$query.'%')->paginate(2);

            }else{

              $data=DB::table('tesis')
              ->where('titulo','like','%'.$query.'%')->paginate(2);
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
              			<a href="http://127.0.0.1:8000/tesis/descargar/'.$tesi->id.'" class="algo"  title="Descargar" name="'.$tesi->id.'" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
              		<a href="#" class="esto" title="más Información" name="'.$tesi->id.'"  data-target="#moreinfomodal" data-toggle="modal"  onclick="infotesiinicio(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>

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



        public function categoriabus(Request $request)
        {
          if($request->ajax()){
      $query=$request->get('query');
      $output="";
      $data=DB::table('tesis')->where('grado','like',$query)->paginate(2);
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
                      		<a href="http://127.0.0.1:8000/tesis/descargar/'.$tesi->id.'" class="algo"  title="Descargar" name="'.$tesi->id.'" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
                      		<a href="#" class="esto" title="más Información" name="'.$tesi->id.'"  data-target="#moreinfomodal" data-toggle="modal"  onclick="infotesiinicio(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>

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

    public function indexc(Request $request)
    {
      $query=$request->get('query');

          $global=DB::table('noticias')->where('titulonoti','like','%'.$query.'%')->paginate(2);

      return response()->json(view ("inicio/modal.mirarpaginanoti",compact('global'))->render());

    }

    public function buscarnoticia(Request $request)
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








}
