
<!-- Actualizacion de infomraciñon-->

<div id="updatemodal" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="margin-right:-15px;" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" style="padding-bottom: 2px; padding-top: 2px;">

							<!-- ##### Contact Area Start #####-->
						<section class="contact-area">
								<div class="container">

														<div class="insertar-content">

																		<!-- Contact Form Area -->
																		<div class="insertar-form-area wow">
																						<form>
																									{{ csrf_field() }}
																								<input type="hidden" name="_method"	value="PUT">
																								<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
																								<input type="hidden" id="idup" value="">
																								<input type="text" class="form-control" id="tituloup" name="tituloup" placeholder="Titulo" value="">
																								<input type="text" class="form-control" id="autoresup" name="autoresup" placeholder="Autores" value="">
																								<input type="date" class="form-control" id="fechaup" name="fechaup" placeholder="Fecha" value="">
																								<input type="text" class="form-control" id="Institutoup" name="institutoup" placeholder="Instituto" value="">
																								<textarea name="resumen" class="form-control" id="resumenup" name="resumenup" cols="30" rows="10" placeholder=""></textarea>
																								<select class="form-control" name="grado">
																										<option class="form-control" id="gradoup" nam="gradoup" value=""></option>
																									<option class="form-control" value="maestria">Maestrìa</option>
																									<option class="form-control" value="doctorado">Doctorado</option>
																									<option class="form-control"  value="diplomado">Diplomado</option>
																								</select>
																								<input type="file" name="documento" id="documentoup" class="form-control" placeholder="Documento">
	 </form>
																				</div>
														</div>
								</div>
						</section>
						<!-- ##### Contact Area End #####-->

					</div>
				 <div class="modal-footer" style="padding-bottom: 10px; padding-top: 5px;">
					 <button class="btn insertar-btn"  id="modificar">Modificar</button>

						</div>
						</div>
				</div>
			</div>
