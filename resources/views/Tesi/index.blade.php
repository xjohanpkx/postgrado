<script src="../js/jquery/ajax.js"></script>


@extends('layouts.plantilla')
@section('cabecera')
@endsection

@section('contenido')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
		<div class="bradcumbContent">
				<h2>Centro de Administración</h2>
		</div>
</div>
<!-- ##### Breadcumb Area End ##### -->


<div class="contenidob">
@include('Tesi/modal.modalup')
@include('Noticia/modal.modalupnoti')
</div>
<div class="contenidoc">
@include('Tesi/modal.show')
@include('Noticia/modal.creanoti')
@include('Tesi/modal.creartesi')
</div>






				<div class="blog-area mt-50 section-padding-100">
						<div class="container">
								<div class="row">
										<div class="col-12 col-md-8">
													<div id="contenidoa">
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
													</div>
												</div>
										<div class="col-12 col-md-4">
												<div class="academy-blog-sidebar">
														<!-- Blog Post Widget -->
														<div class="blog-post-search-widget mb-30">
																<form >

																		<input type="search" name="search" id="Searchtesis" placeholder="buscar">
																			<button type="submit" id="buscartesis" form="buscartes"><i class="fa fa-search" aria-hidden="true"></i></button>
																</form>

														</div>


														<!-- Blog Post Catagories -->
														<div class="blog-post-categories mb-30">
																<h5>Grado</h5>
																<ul>
																		<li><a href="#" name="maestria" id="maestriabus" onclick="categoriabus(this)">Maestría</a></li>
																		<li><a href="#" name="doctorado" id="doctoradobus" onclick="categoriabus(this)">Doctorado</a></li>
																		</ul>
														</div>
														<div class="blog-post-categories mb-30">
																<h5>Formato</h5>
																<ul>
																		<li><a href="#" name="tesisr" id="tesisreload" onclick="reload(this)">Tesis</a></li>
																		<li><a href="#" name="noticiasr" id="noticiasreload" onclick="reload(this)">Noticias</a></li>
																		</ul>
														</div>
														<div class="blog-post-categories mb-80">
												<a href="#createmodal" id="botoncreatemodal" role="button" class="btn academy-btn btn-6" data-toggle="modal">Nueva Tesis</a>
													<a href="#createmodalnoti" id="botoncreatemodalnoti" role="button" class="btn academy-btn btn-6" data-toggle="modal">Nueva Noticia</a>
														</div>

														<!-- Add Widget -->
														<div class="add-widget">

														</div>
												</div>
										</div>
										<div class="top-popular-courses-area section-padding-100-70"  id="contenidos">
												<div class="container" id="contenedora">

												</div>
										</div>


								</div>
						</div>
				</div>
				<!-- ##### Blog Area End ##### -->


@endsection



@section('pie')
@endsection

<script src="../js/algo.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#tesisinicio").hide();
});

</script>
