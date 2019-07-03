
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
