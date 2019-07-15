<div class="row">
    <div class="col-12">
        <div class="section-heading text-center mx-auto">
            <span>El Mejor</span>
            <h3>Noticias</h3>
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
              	                                    <a href="#"id="tiltnoti" class="post-title">{{$noticia->titulonoti}}</a>
              	                                    <!-- Post Meta -->
              	                                    <div class="post-meta">

              	                                        <p>Por <a href="#">{{$noticia->autor}}</a> | <a href="#">{{$noticia->fechanoti}}</a> |</p>
              	                                    </div>
              	                                    <!-- Post Excerpt -->
              	                                    <p style="font-size:14px;white-space: pre-wrap;">{{$noticia->texto}}</p>
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
																<form >

																		<input type="search" name="search" id="Searchnotiinicio" placeholder="buscar">
																			<button type="submit" id="buscarnotiinicio" form="buscartes"><i class="fa fa-search" aria-hidden="true"></i></button>
																</form>

														</div>


														<!-- Blog Post Catagories -->



														<!-- Add Widget -->
														<div class="add-widget">

														</div>
												</div>
										</div>

								</div>
						</div>
				</div>
