<!---------------Pagina principal------------------->


<?php
include_once 'php/conexion.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Mr. Sandwich</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
    <script src="js/jquery-3.3.1.slim.min.js"></script>


    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <link rel="stylesheet" type="text/css" href="css/mapa.css">

    <script src="js/bootstrap.js"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>


  </head>


  <body>


<!------------Armado de header y carousel----------------->

    <?php
include_once 'php/header.php';
?>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="images/Latino_categ_sanddia.jpg" alt="First slide">
            <div class="container">
            <div class="carousel-caption text-left">
              <h1>Sandwich del día</h1>
              <p>Siempre tenemos preparado un Sandwich especial por cada dia de la semana.</p>
            </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/img_plato.jpg" alt="Second slide">
          <div class="container">
          <div class="carousel-caption text-left">
            <h1>Platos y ensaladas</h1>
            <p>Disfruta de todo nuestro menú de riquisimos platos y ensaladas. Animate!</p>
          </div>
          </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="images/Latino_categ_postre3.jpg" alt="Third slide">
            <div class="container">
            <div class="carousel-caption text-left">
              <h1>También tenemos postre</h1>
              <p>Tentate con nuestros postres de elaboración artesanal.</p>
            </div>
            </div>
          </div>
              <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
        </div>


      </div>
<!----------------Armado de secciones------------------>

      <div class="container marketing">
        <hr class="featurette-divider">
        <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">Visita nuestro local. <span class="text-muted">Av. Manuel Belgrano 1191</span></h2>
          <p class="lead">Nuestro local esta abierto de 9 a 21hrs. Podes comer en el lugar y ademas contar con todo el menu de la casa que incluye mucha variedad de comidas, bebidas y postres.</p>
        </div>
          <!--<img class="d-block w-100" src="images/icons/ubicacion.png">-->
          <div  style="height:350px; width: 450px;" id="map">
        </div>
      </div>

        <hr class="featurette-divider">
        <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Conoce nuestra carta <span class="text-muted">(compra exclusiva en local)</span></h2>
          <p class="lead">Podes ver con detalles todos los productos que manejamos. Ensaladas, Sandwichs, Comidas al plato, Postres y muchas cosas mas.</p>
          <a href="pedidos.php"><button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Ver mas</button></a>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="d-block w-100" src="images/icons/menu.png">
        </div>
        </div>
          <hr class="featurette-divider">
          <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Seguinos en <span class="text-muted">nuestras redes sociales</span></h2>
            <p class="lead">Podes enterarte de nuestro nuevos productos, asi tambien como dejarnos tus comentarios y compartir momentos juntos a Mr. Sandwich</p>
            <p class="lead">Ingresa o registrarte en nuestra pagina y recibi beneficios exclusivos.</p>
            <br>
            <div class="row" align="center">
            <div class="col-md-12">
              <a class="col-md-3" href="#" ><img style="width: 5%" src="images/icons/facebook.png" ></a>
              <a class="col-md-3" href="#" ><img style="width: 5%" src="images/icons/instagram.png" ></a>
              <a class="col-md-3" href="#" ><img style="width: 5%" src="images/icons/twitter.png" ></a>
              <a class="col-md-3" href="#" ><img style="width: 5%" src="images/icons/youtube.png" ></a>
            </div>
            </div>
          </div>

          <div class="col-md-5">
            <img  class="d-block w-100" src="images/icons/like.jpg" alt="Third slide">
          </div>
          </div>
            <hr class="featurette-divider">
            </div>
    </main>

    <!---------------Llamada a mapa------------------->


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>

       <script src="js/mapa.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSMYSWosjdzAetSm6D_VmSH0soyK54l0U&callback=iniciarMap" ></script>

  </body>

  <!-- FOOTER -->
  <footer class="bg-dark" style="background: black">
      <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="images/icons/flecha-arriba.png" ></a></p>
      <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>

</html>