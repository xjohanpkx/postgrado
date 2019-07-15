<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

       <script src="../js/jquery/ajax.js"></script>
    <!-- Title -->
    <title>Direcciòn General de Creaciòn Intelectual</title>

    <!-- Favicon -->
    <link rel="icon" href="../img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../js/alertifyjs/css/alertify.css">
    <script src="../js/algo.js"> </script>
		<link rel="stylesheet" href="../js/alertifyjs/css/themes/default.css">

</head>

<body>

  <!-- ##### Preloader ##### -->
  <div id="preloader">
      <i class="circle-preloader"></i>
  </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
@yield('cabecera')
        <!-- Top Header Area -->
        <div class="top-header">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="header-content h-100 d-flex align-items-center justify-content-between">
                            <div class="academy-logo">
                                <a href="/"><img src="../img/bg-img/logoweb1.png" alt=""></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Area -->
        <div class="academy-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="academyNav">

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- close btn -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="#">Postgrado</a>
                                        <ul class="dropdown">
                                            <li><a href="#contenidos" id="postgrado">Sobre Nosotros</a></li>
                                            <li><a href="#contenidos" id="maestrias">Maestrías</a></li>
                                            <li><a href="#contenidos" id="especia">Especializaciones</a></li>
                                            <li><a href="#contenidos" id="doctorados">Doctorados</a></li>
                                            <li><a href="#contenidos" id="noticiasinicio">Noticias</a></li>

                                        </ul>
                                    </li>
                                    <li><a href="#contenidos" id="postgrado">Sobre Nosotros</a></li>
                                    <li><a href="#contenidos" id="admision">Admisión</a></li>
                                    <li><a href="#contenidos" id="tesisinicio">Tesis</a></li>
                                    <li><a href="#contenidos" id="noticiasinicio">Noticias</a></li>
                                  @if (Route::has('login'))
                                    @auth
                                    <li>  <a href="{{ url('/tesis') }}"><i class="fa fa-wrench"></i>Administrar</a></li>
                                    @endauth
                                    @endif
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">
                                <div class="call-center">
                                  @if (Route::has('login'))
                                      <div class="top-right links">
                                          @auth
                                              <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>salir</a>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>

                                          @else
                                              <a href="#freddymodal" data-toggle="modal"><i class="fa fa-sign-in"></i> <span>Iniciar Sección</span></a>

                                              @if (Route::has('register'))
                                              @endif
                                          @endauth
                                      </div>
                                  @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->


    <!-- Modal / Ventana / Overlay en HTML -->
    <div id="freddymodal" class="modal fade">
        <div class="modal-dialog" style="width: 300px;">
            <div class="modal-content">
                <div class="modal-header" style="height:10px; padding: 6px 15px 14px 10px">
    				<button style="height: 4px; width: -5px; padding-bottom: 10px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                   </div>
                <div class="modal-body" style="padding-bottom: 2px; padding-top: 10px;">

          <form action="{{ route('login') }}" method="post" id="loginnew">
                    @csrf
    	<input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                <script type="text/javascript">alert("Estas credenciales no coinciden con nuestros registros.");</script>
            </span>
        @enderror
    		<input id="password" type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
         @error('password')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                 <script type="text/javascript">alert("
       Estas credenciales no coinciden con nuestros registros."); </script>
             </span>
         @enderror

      </form>
    		  </div>
         <div class="modal-footer" style="padding-bottom: 10px; padding-top: 5px;">
           <div class="form-check">

               <input form="loginew" class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
               <label class="form-check-label" for="remember">
                   Recordar
               </label>
           </div>
                 <button type="submit" form="loginnew" class="btn academy-btn btn-5 m-2">Ingresar</button>

    				</div>
            </div>
        </div>
    </div>












				<div class="contenido">

		@yield('contenido')
    <div class="alert alert-danger print-error-msg" style="display:none">
        <ul></ul>
    </div>
				</div>


















    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
			@yield('pie')
        <div class="main-footer-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <a href="#"><img src="../img/bg-img/logomini.png" alt="" style="margin-left: 20%; margin-right: 20%;"></a>
                            </div>
                            <p>"Aprender es como remar contra la corrinete: en cuanto se deja, se retrocede". <br>&emsp;&emsp;&emsp;&emsp;&emsp; Edward Benjamin Britten.</p>
                            <div class="footer-social-info">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Links Ùtiles</h6>
                            </div>
                            <nav>
                                <ul class="useful-links">
                                    <li><a href="#">Inicio</a></li>
                                    <li><a href="#">Admision</a></li>
                                    <li><a href="#">Respositorio</a></li>
                                    <li><a href="#">blog</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Galeria</h6>
                            </div>
                            <div class="gallery-list d-flex justify-content-between flex-wrap">
                                <a href="../img/bg-img/gallery1.jpg" class="gallery-img" title="Gallery Image 1"><img src="../img/bg-img/gallery1.jpg" alt=""></a>
                                <a href="../img/bg-img/gallery2.jpg" class="gallery-img" title="Gallery Image 2"><img src="../img/bg-img/gallery2.jpg" alt=""></a>
                                <a href="../img/bg-img/gallery3.jpg" class="gallery-img" title="Gallery Image 3"><img src="../img/bg-img/gallery3.jpg" alt=""></a>
                                <a href="../img/bg-img/gallery4.jpg" class="gallery-img" title="Gallery Image 4"><img src="../img/bg-img/gallery4.jpg" alt=""></a>
                                <a href="../img/bg-img/gallery5.jpg" class="gallery-img" title="Gallery Image 5"><img src="../img/bg-img/gallery5.jpg" alt=""></a>
                                <a href="../img/bg-img/gallery6.jpg" class="gallery-img" title="Gallery Image 6"><img src="../img/bg-img/gallery6.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget Area -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="footer-widget mb-100">
                            <div class="widget-title">
                                <h6>Contacto</h6>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-placeholder"></i>
                                <p>Av. Bolivar, Santa Bárbara del zulia, Venezuela</p>
                            </div>
                            <div class="single-contact d-flex mb-30">
                                <i class="icon-telephone-1"></i>
                                <p>(+58)275-555-1036 <br>(+58) 275-555-2832</p>
                            </div>
                            <div class="single-contact d-flex">
                                <i class="icon-contract"></i>
                                <p>correo@unesur.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta pagina esta desarrollada de <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://www.facebook.com/freddy.johan.villaobos.morillo" target="_blank">Freddy Villalobos</a>
</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->
<div class="todoscript">

@yield('script')
    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="../js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="../js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="../js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="../js/active.js"></script>

    <script src="../js/alertifyjs/alertify.js"></script>
    <script src="//unpkg.com/jscroll/dist/jquery.jscroll.min.js"></script>
    </div>
</body>

</html>
