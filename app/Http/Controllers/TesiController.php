<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tesi;
use DB;
use Illuminate\Routing\Route;
class TesiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
  if($query=="maestria"|$query=="doctorado"){

    $data=DB::table('tesis')->where('grado','like','%'.$query.'%')->paginate(2);


  return response()->json(view ("Tesi/modal.buscartesis",compact('data'))->render());


}else{
      $data=DB::table('tesis')->where('titulo','like','%'.$query.'%')->paginate(2);


return response()->json(view ("Tesi/modal.buscartesis",compact('data'))->render());
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
                  	<input type="hidden" name="_token" value="'.csrf_token().'" id="token2">
                  		<a href="#" class="algo"  title="Descargar"  >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
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

            if($query!=''){
              $data=DB::table('tesis')
              ->where('titulo','like','%'.$query.'%')->paginate(2);

            }else{

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
              		<a href="#" class="algo"  title="Descargar"  >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
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
            $output='  <tr>
        <td align="center" colspan="5">Busqueda no encontrada</td>
       </tr>';

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

    $tesis= new Tesi;
    $tesis->titulo=$request->titulo;
   $tesis->autores=$request->autores;
    $tesis->instituto=$request->instituto;
    $tesis->fecha=$request->fecha;
    $tesis->resumen=$request->resumen;
    $tesis->grado=$request->grado;
    $tesis->documento=$request->documento;
    $tesis->directorio=$request->directorio;

    $tesis->save();
    return response()->json($tesis);
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
        //
        $Tesi=Tesi::find($id);
        $Tesi->fill($request->all());
        $Tesi->save();
        return response()->json();

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
      $tesi->delete();
      return response()->json(["mensaje"=>"borrado"]);
    }
}
