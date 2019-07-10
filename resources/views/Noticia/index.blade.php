<script src="../js/jquery/ajax.js"></script>
@extends('layouts.plantilla')
@section('cabecera')
@endsection

@section('contenido')
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb-area bg-img" style="background-image: url(img/bg-img/breadcumb.jpg);">
		<div class="bradcumbContent">
				<h2>Centro de noticias</h2>
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
						<div class="modal-body" id="bodycreatemodal" style="margin-top:-20px;">

							<!-- Single Blog Start -->

									<div class="single-blog-post">
										<form class="notiform" action="/noticia" method="post" id="insertnoti" enctype="multipart/form-data">
{{ csrf_field() }}
											<!-- Post Thumb -->
											<div class="blog-post-thumb mb-50">
													<img id="subidon" style="max-height:300px; width:100%;" src="img/blog-img/1.jpg" alt""/>
									<input type="file" id="notifileup" name="imagen">
											</div>
											<!-- Post Title -->
											<input class="post-title" id="titulo" name="titulo" placeholder="Titulo de Noticia">
											<input type="hidden" name="user_id" name="user_id" value="{{Auth::user()->id}}">
											<!-- Post Meta -->
											<div class="post-meta">
													<p>Por <input type="text" placeholder="nombre" id="autor" name="autor" value="{{Auth::user()->name}}"> | <input name="fecha" id="fecha" type="date">
											</div>
											<!-- Post Excerpt -->
											<textarea name="texto" id="texto" name="texto" placeholder="Escribe Aquí la Noticia"></textarea>

									</form>
</div>

						<!-- ##### Contact Area End ##### -->

					</div>
				 <div class="modal-footer" style="padding-bottom: 10px; padding-top:0px;">
					 <button class="btn insertar-btn" type="submit" form="insertnoti" id="insertarnoti">Agregar</button>

						</div>
						</div>
				</div>
			</div>


			<!-- ##### Blog Area Start ##### -->
	    <div class="blog-area mt-50 section-padding-100">
	        <div class="container">
	            <div class="row">
	                <div class="col-12 col-md-8">
										<div id="contenidonot">
	                    <div class="academy-blog-posts">
	                        <div class="row">
		@foreach($global as $noticia)

	                            <!-- Single Blog Start -->
	                            <div class="col-12">
	                                <div class="single-blog-post mb-50 wow fadeInUp" data-wow-delay="300ms">
	                                    <!-- Post Thumb -->
	                                    <div class="blog-post-thumb mb-50">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token2">
	                                        <img src="{{$noticia->directorio}}" style="max-height:300px; width:100%;" alt="">
																					     </div>
	                                    <!-- Post Title -->
	                                    <a href="#" class="post-title">{{$noticia->titulo}}</a>
	                                    <!-- Post Meta -->
	                                    <div class="post-meta">

	                                        <p>Por <a href="#">{{$noticia->autor}}</a> | <a href="#">{{$noticia->fecha}}</a> |</p>
	                                    </div>
	                                    <!-- Post Excerpt -->
	                                    <p style="font-size:14px;">{{$noticia->texto}}</p>
																			<a href="#" class="modinot mt-15" title="Modificar"  name="{{$noticia->id}}"  data-target='#updatemodal' data-toggle='modal'  onclick="mostrar(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
																				<a href="#" class="delnot" title="eliminar"  name="{{$noticia->id}}"  data-toggle='modal'  id="eliminarnoti" >	<i style="color:#61ba6d;" class="fa fa-trash fa-2x"></i></a>

	                                </div>


	                            </div>
@endforeach


	                        </div>
	                    </div>
	                    <!-- Pagination Area Start -->
	                    <div class="academy-pagination-area wow fadeInUp" data-wow-delay="400ms">
	                        <nav>
														{{$global->onEachSide(2)->render()}}

	                        </nav>
	                    </div>
										</div>
	                </div>

									<div class="col-12 col-md-4">
											<div class="academy-blog-sidebar">
													<!-- Blog Post Widget -->
													<div class="blog-post-search-widget mb-30">
															<form>

																	<input type="search" name="search" id="Searchnoti" placeholder="buscar">
																		<button type="submit" id="buscarnoti" form="buscarnot"><i class="fa fa-search" aria-hidden="true"></i></button>
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
											<a href="#createmodal" id="botoncreatemodal" role="button" class="btn academy-btn btn-6" data-toggle="modal">Nueva Noticia</a>
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
<script type="text/javascript">



</script>
<script src="../js/algo.js"></script>
