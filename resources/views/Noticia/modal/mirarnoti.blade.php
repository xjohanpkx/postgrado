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
                                      <a href="#" class="modinot mt-15" title="Modificar"  name="{{$noticia->id}}"  data-target='#updatemodalnoti' data-toggle='modal'  onclick="mostrarnoti(this)" >	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>
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
