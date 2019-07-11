
<!-- Actualizacion de infomraciñon-->

<div id="updatemodalnoti" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="margin-right:-15px;" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" style="padding-bottom: 2px; padding-top: 2px;">

							<!-- Single Blog Start -->

									<div class="single-blog-post">
										<form class="notiform" action="/noticia" method="post" id="modifinotib" enctype="multipart/form-data">
	{{ csrf_field() }}
											<!-- Post Thumb -->
											<div class="blog-post-thumb mb-50">
													<img id="subidonupnoti" style="max-height:300px; width:100%;" src="img/blog-img/1.jpg" alt""/>
									<input type="file" id="imagenup" name="imagenup">
											</div>
											<!-- Post Title -->
											<input class="post-title" id="tituloupnoti" name="tituloupnoti" placeholder="Titulo de Noticia">
											<input type="hidden" name="user_id" name="user_id" value="{{Auth::user()->id}}">
											<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token5">
											<input type="hidden" name="idupnooti" id="idupnoti" value="">
											<!-- Post Meta -->
											<div class="post-meta">
													<p>Por <input type="text" placeholder="nombre" id="autorupnoti" name="autorupnoti" value="{{Auth::user()->name}}"> | <input name="fechaupnoti" id="fechaupnoti" type="date">
											</div>
											<!-- Post Excerpt -->
											<textarea name="texto" id="textoupnoti" name="textoupnoti" placeholder="Escribe Aquí la Noticia"></textarea>

									</form>
	</div>
						<!-- ##### Contact Area End #####-->

					</div>
				 <div class="modal-footer" style="padding-bottom: 10px; padding-top: 5px;">
					 <button class="btn insertar-btn" type="submit" form="modifinotib" id="modifinoti">Modificar</button>

						</div>
						</div>
				</div>
			</div>
