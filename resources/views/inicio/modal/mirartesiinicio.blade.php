<div class="row">
    <div class="col-12">
        <div class="section-heading text-center mx-auto">
            <span>El Mejor</span>
            <h3>Tesis</h3>
        </div>
    </div>
</div>
				<div class="blog-area mt-50">
						<div class="container">
								<div class="row">
										<div class="col-12 col-md-8">
													<div id="contenidoinicio">
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
													<a href="http://127.0.0.1:8000/tesis/descargar/{{$tesi->id}}" class="algo"  title="Descargar" name="{{$tesi->id}}" >	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
														<a href="#" class="esto" title="más Información" name="{{$tesi->id}}"  data-target='#moreinfomodal' data-toggle='modal'  onclick="infotesiinicio(this)">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>

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

																		<input type="search" name="search" id="Searchtesisinicio" placeholder="buscar">
																			<button type="submit" id="buscartesisinicio" form="buscartes"><i class="fa fa-search" aria-hidden="true"></i></button>
																</form>

														</div>


														<!-- Blog Post Catagories -->
														<div class="blog-post-categories mb-30">
																<h5>Categorias</h5>
																<ul>
																		<li><a href="#contenidos" name="maestria" id="maestriabusinicio" onclick="categoriabusinicio(this)">Maestría</a></li>
																		<li><a href="#contenidos" name="doctorado" id="doctoradobusinicio" onclick="categoriabusinicio(this)">Doctorado</a></li>
																		</ul>
														</div>


														<!-- Add Widget -->
														<div class="add-widget">

														</div>
												</div>
										</div>

								</div>
						</div>
				</div>
