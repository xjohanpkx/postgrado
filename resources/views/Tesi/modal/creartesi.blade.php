
<!-- modal crear -->

<div id="createmodal" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="padding-left:-10px;"  type="button" class="close" id="cerrar_ac" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" id="bodycreatemodal" style="padding-bottom: 2px; padding-top: 20px;">

							<!-- ##### Contact Area Start ##### -->
						<section class="contact-area">
								<div class="container">

														<div class="insertar-content">

																		<!-- Contact Form Area -->
																		<div class="insertar-form-area">
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
