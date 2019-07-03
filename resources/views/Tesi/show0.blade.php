@section('cabecera')
@extends('layouts.plantilla')
@endsection

@section('contenido')
<div class="row">
@foreach($global as $tesi)


	<div class="col-md-4 col-lg-3">


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

	<a href="#" class="algo" title="más Informacón">	<i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
	<a href="#ww" class="esto" title="Descargar">	<i style="color:#61ba6d;" class=" fa fa-search-plus  fa-2x"></i></a>
		<a href="#updatemodal" class="modi" title="Modificar" data-toggle="modal">	<i style="color:#61ba6d;" class="fa fa-pencil fa-2x"></i></a>

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


<!-- Actualizacion de infomraciñon   -->

<div id="updatemodal" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
				<button style="margin-right:-15px;" type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" style="color:#61ba6d"></i></button>
							 </div>
						<div class="modal-body" style="padding-bottom: 2px; padding-top: 2px;">

							<!-- ##### Contact Area Start ##### -->
						<section class="contact-area">
								<div class="container">

														<div class="insertar-content">

																		<!-- Contact Form Area -->
																		<div class="insertar-form-area wow">
																						<form action="{{Route('tesis.store')}}" method="POST" id="insertar">
																									{{ csrf_field() }}
																								<input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" value="{{$tesis->titulo}}">
																								<input type="text" class="form-control" id="autores" name="autores" placeholder="Autores" value="{{$tesis->autores}}">
																								<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Fecha" value="{{$tesis->fecha}}">
																								<input type="text" class="form-control" id="Instituto" name="instituto" placeholder="Instituto" value="{{$tesis->isntituto}}">
																								<textarea name="resumen" class="form-control" id="resumen" name="resumen" cols="30" rows="10" placeholder="Resumen">{{$tesis->resumen}}</textarea>
																								<select class="form-control" name="grado">
																										<option class="form-control" value="{{$tesis->grado}}">{{$tesis->grado}}</option>
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
					 <button class="btn insertar-btn" type="submit" form="insertar">Modificar</button>

						</div>
						</div>
				</div>
			</div>





@endsection



@section('pie')
@endsection
