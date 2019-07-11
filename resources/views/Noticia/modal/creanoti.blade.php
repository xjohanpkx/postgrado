<!-- modal crear -->

<div id="createmodalnoti" class="modal fade">
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
											<input class="post-title" id="titulonoti" name="titulonoti" placeholder="Titulo de Noticia">
											<input type="hidden" name="user_id" name="user_id" value="{{Auth::user()->id}}">
											<!-- Post Meta -->
											<div class="post-meta">
													<p>Por <input type="text" placeholder="nombre" id="autor" name="autor" value="{{Auth::user()->name}}"> | <input name="fechanoti" id="fechanoti" type="date">
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
