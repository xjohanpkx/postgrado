@extends('layouts.plantilla')
@section('cabecera')
@endsection

@section('contenido')
<a href="#createmodal" role="button" class="btn academy-btn btn-5 m-5" data-toggle="modal">Nueva Tesis</a>


<div id="createmodal" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="padding-left:-10px;"  type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" style="padding-bottom: 2px; padding-top: 20px;">

							<!-- ##### Contact Area Start ##### -->
						<section class="contact-area">
								<div class="container">

														<div class="insertar-content">

																		<!-- Contact Form Area -->
																		<div class="insertar-form-area wow fadeInUp">
																						<form action="{{Route('tesis.store')}}" method="POST" id="insertar">
																									{{ csrf_field() }}
																								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
																								<input type="text" class="form-control" id="autores" name="autores" placeholder="Autores">
																								<input type="datetime-local" class="form-control" id="fecha" name="fecha" placeholder="Fecha">
																								<input type="text" class="form-control" id="Instituto" name="instituto" placeholder="Instituto">
																								<textarea name="resumen" class="form-control" id="resumen" name="resuemn" cols="30" rows="10" placeholder="Mensaje"></textarea>
																								<select class="form-control" name="grado">
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
					 <button class="btn insertar-btn" type="submit" form="insertar">Subir</button>

						</div>
						</div>
				</div>
			</div>

@endsection



@section('pie')
@endsection
