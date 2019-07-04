<script src="../js/jquery/ajax.js"></script>
@extends('layouts.plantilla')
@section('cabecera')
@endsection

@section('contenido')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
		<div class="bradcumbContent">
				<h2>Administraciòn de Tesis</h2>
		</div>
</div>
<!-- ##### Breadcumb Area End ##### -->


<div class="contenidob">
@include('Tesi/modal.modalup')
</div>
<div class="contenidoc">
@include('Tesi/modal.show')
</div>


<!-- modal crear -->

<div id="createmodal" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="padding-left:-10px;"  type="button" class="close" id="cerrar_ac" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" style="padding-bottom: 2px; padding-top: 20px;">

							<!-- ##### Contact Area Start ##### -->
						<section class="contact-area">
								<div class="container">

														<div class="insertar-content">

																		<!-- Contact Form Area -->
																		<div class="insertar-form-area wow fadeInUp" style="visibility:visible; animation-name=fadeInUp;">
																						<form action="/tesis" method="POST" id="insertar" enctype="multipart/form-data">
																									{{ csrf_field() }}
																								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
																								<input type="text" class="form-control" id="autores" name="autores" placeholder="Autores">
																								<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
																								<input type="text" class="form-control" id="Instituto" name="instituto" placeholder="Instituto">
																								<textarea name="resumen" class="form-control" id="resumen"  cols="30" rows="10" placeholder="Resumen"></textarea>
																								<select class="form-control" name="grado" id="grado" value="">
																									<option class="form-control" value="maestria">Maestrìa</option>
																									<option class="form-control" value="doctorado">Doctorado</option>
																									<option class="form-control"  value="diplomado">Diplomado</option>
																								</select>
																								<input type="file" name="documento" id="documento" class="form-control" placeholder="Documento">
	 </form>
																				</div>
														</div>

								</div>
						</section>
						<!-- ##### Contact Area End ##### -->

					</div>
				 <div class="modal-footer" style="padding-bottom: 10px; padding-top: 5px;">
					 <button class="btn insertar-btn" type="submit" form="insertar" id="insertarb">Subir</button>

						</div>
						</div>
				</div>
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
														<a href="#" class="algo"  title="Descargar"  >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
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
																<h5>Categorias</h5>
																<ul>
																		<li><a href="#" name="maestria" id="maestriabus" onclick="categoriabus(this)">Maestría</a></li>
																		<li><a href="#" name="doctorado" id="doctoradobus" onclick="categoriabus(this)">Doctorado</a></li>
																		</ul>
														</div>
														<div class="blog-post-categories mb-80">
												<a href="#createmodal" role="button" class="btn academy-btn btn-5 m-5" data-toggle="modal">Nueva Tesis</a>
														</div>

														<!-- Add Widget -->
														<div class="add-widget">

														</div>
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
