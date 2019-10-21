<div class="row">
@foreach($global as $noticiapub)
<!-- Single Top Popular Course -->
      <div class="col-12 col-lg-6">
          <div class="single-top-popular-course d-flex align-items-center flex-wrap">
              <div class="popular-course-content">
                  <h5 style="overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3;-webkit-box-orient: vertical;">{{$noticiapub->titulonoti}}</h5>
                  <span>Por {{$noticiapub->autor}}   |{{$noticiapub->fechanoti}}</span>

                  <p style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 6;-webkit-box-orient: vertical;">{{$noticiapub->texto}}</p>
                  <a href="#contenedora" id="morenoticia" data-id="{{$noticiapub->id}}" class="btn academy-btn btn-sm">Leer Màs</a>
              </div>
              <div class="popular-course-thumb bg-img" style="background-image: url({{$noticiapub->directorio}});"></div>
          </div>
      </div>
    @endforeach
  </div>
