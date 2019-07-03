<!DOCTYPE html>
<html lang="en">

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

</head>

<body>

  <!-- ##### Preloader ##### -->
  <div id="preloader">
      <i class="circle-preloader"></i>
  </div>

  <!-- Modal / Ventana / Overlay en HTML -->
  <div id="freddymodal" class="modal fade">
      <div class="modal-dialog" style="width: 300px;">
          <div class="modal-content">
              <div class="modal-header" style="height:10px; padding: 6px 15px 14px 10px">
  				<button style="height: 4px; width: -5px; padding-bottom: 10px;" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                 </div>
              <div class="modal-body" style="padding-bottom: 2px; padding-top: 10px;">
        <form action="" method="post">
  		<input class="form-control" placeholder="Usuario" type="text">
  		 <input class="form-control" placeholder="Contraseña" type="password">
  		    </form>
  		  </div>
       <div class="modal-footer" style="padding-bottom: 10px; padding-top: 5px;">
                  <button type="button" class="btn btn-success">Ingresar</button>

  				</div>
          </div>
      </div>
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
                                <a href="index.html"><img src="../img/bg-img/logoweb1.png" alt=""></a>
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
                                    <li><a href="index.html">Inicio</a></li>
                                    <li><a href="#">Pagina</a>
                                        <ul class="dropdown">
                                            <li><a href="admision.html">Admision</a></li>
                                            <li><a href="course.html">Academia</a></li>
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="contact.html">Contacto</a></li>
                                            <li><a href="repositorio.html">Repositorio</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Academia</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
												<li><a href="#" style=" justify-content: center; font-size: 16px; color:hsla(128,39%,55%,1.00); pointer-events: none;
cursor: default;">Diplomado</a></li>
                                               <li><a href="#">Gestiòn y Planificaciòn Socio-Ambiental</a></li>
                                                <li><a href="#">Adminitraciòn Tributaria</a></li>
												<li><a href="#">Formaciòn De La Actitud Orientadora Del Docente</a></li>
                                                <li><a href="#">Enseñanza Para La Educaiòn</a></li>
												<li><a href="#">Docencia Para La Educaciòn Universitaria</a></li>
                                                <li><a href="#">Fìsica, Deporte y Recreaciòn</a></li>
												<li><a href="#">Agrotoxicologia</a></li>
												<li><a href="#">Agroeccològia y turismo Ecològico</a></li>
												<li><a href="#">Desarrollo Comunitario</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#" style=" justify-content: center; font-size: 16px; color:hsla(128,39%,55%,1.00); pointer-events: none;
cursor: default;">Especializaciòn</a></li>
                                                <li><a href="#">Services &amp; Features</a></li>
                                                <li><a href="#">Accordions and tabs</a></li>
                                                <li><a href="#">Menu ideas</a></li>
                                                <li><a href="#">Students Gallery</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="#" style=" justify-content: center; font-size: 16px; color:hsla(128,39%,55%,1.00); pointer-events: none;
cursor: default;">Maestrìa</a></li>
                                                <li><a href="#">Services &amp; Features</a></li>
                                                <li><a href="#">Accordions and tabs</a></li>
                                                <li><a href="#">Menu ideas</a></li>
                                                <li><a href="#">Students Gallery</a></li>
                                            </ul>
                                            <div class="single-mega cn-col-4">
                                                <img src="img/bg-img/portada11.jpg" alt="">
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="admision.html">Admision</a></li>
                                    <li><a href="repositorio.html">Respositorio</a></li>
                                    <li><a href="contact.html">Contacto</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>

                        <!-- Calling Info -->
                        <div class="calling-info">

                                <div class="call-center">
                                <a href="#freddymodal" data-toggle="modal"><i class="fa fa-sign-in"></i> <span>Iniciar Sección</span></a>

                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->







				<div class="contenido">

		@yield('contenido')
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
    </div>
</body>

</html>
