<div class="academy-blog-posts">
	<div class="row">
	@foreach($global as $tesi)
		<div class="col-md-4 col-lg-4">
						<div class="block-2">
							<div class="flipper">
								<div class="front" style="background-image: url(../img/clients-img/libro1.jpg);">
									<div class="box">
										<h2>{{$tesi->titulo}}</h2>
										<p>{{$tesi->fecha}}</p>
									</div>
								</div>
								<div class="back" >
									<!-- back content -->

									<blockquote>
									<p style="text-align: justify; color: hsl(11, 1%, 92%);">	Por: {{ $tesi->autores}}</p>
									</blockquote>
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token2">
	<a href="http://127.0.0.1:8000/mirar/descargar/{{$tesi->id}}" class="algo"  title="Descargar" name="{{$tesi->id}}" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
		<a href="#" class="esto" title="más Información" name="{{$tesi->id}}"  data-target='#moreinfomodal' data-toggle='modal'  onclick="infotesi(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>
	<!--<button  value="{{$tesi->id}}" type="button" class="modi" name="button" data-target='#updatemodal' data-toggle='modal' id="dale" onclick="mostrar(this)"><i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></button>-->
		<a href="#" class="modi" title="Modificar"  name="{{$tesi->id}}"  data-target='#updatemodal' data-toggle='modal'  onclick="mostrar(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
			<a href="#" class="del" title="eliminar"  name="{{$tesi->id}}"  data-toggle='modal'  id="eliminartes" >	<i style="color:#61ba6d;" class="fa fa-trash fa-2x"></i></a>

																	<div class="author d-flex">
										<div class="image mr-3 align-self-center">
										<a href="#" class="icon-dowload"></a>
										</div>
										<div class="name align-self-center"> <span class="position">{{$tesi->instituto}}</span></div>
									</div>
								</div>
							</div>
						</div> <!-- .flip-container -->
				</div>
	@endforeach
</div>
</div>
<!-- Pagination Area Start -->
		<nav>
{{$global->onEachSide(2)->render()}}
		</nav>
