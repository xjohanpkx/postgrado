<div class="row">
    <div class="col-12">
        <div class="section-heading text-center mx-auto">
            <span>El Mejor</span>
            <h3>Admisión</h3>
        </div>
    </div>
</div>
    <div class="blog-area mt-50">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-8">
            <div class="academy-blog-posts">
              <div class="row" id="admisionconte">

                <div class="col-12">
                  <div class="elements-title mb-50">
                <span>Admitidos</span>
                  </div>
                    <p>Estimado participante es para la familia de postgrado de gran agrado desearle el mayor de los exitos para que logre alcanzar la meta de su titulo de 4to nivel academico en el lapso correspondiente.</p>
                    <div class="elements-title mb-50">
                    <span>instrutivo para el proceso de inscripción</span>
                    <a href="http://127.0.0.1:8000/pdf/descargar/4" title="Descargar" name="1" ><i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a>
                    </div>
                    <div class="table-responsive fadeInCenter">

                  								<table class="fadeInCenter table">
                  								<thead>
                  									<tr>
                  									<th>Nombre</th>
                  									<th>Descargar</th>
                  									</tr>
                  									</thead>
                  							<tbody>
  @foreach($global as $pdf)
                                	<tr>

                  									<td style="border-bottom: hidden;font-size:14px;padding:10px 0px; ">{{$pdf->titulopdf}}</td>
                  								<td style="border-bottom: hidden;font-size:10px; padding:10px 0px;"><a href="http://127.0.0.1:8000/pdf/descargar/{{$pdf->id}}" title="Descargar" name="{{$pdf->id}}" ><i style=" color: #83c331;" class="fa fa-download fa-2x"></i></a></td>
                                  </tr>
                                  @endforeach
                          					</tbody>
                  								</table>

            </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4">
            <div class="academy-blog-sidebar">
            <!-- Blog Post Catagories -->
              <div class="blog-post-categories mb-30">
              <ul>
                  <li><a href="#admisionconte" id="preinscripcion">Preinscripción</a></li>
                  <li><a href="#admisionconte" id="admitidos">Lista  de admitidos</a></li>
                </ul>
              </div>
                          </div>
