<?php
    include_once 'php/conexion.php';


//if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

//} else {
 //  header("Location: /TP/index.php");

//exit;
//}

//$now = time();

//if($now > $_SESSION['expire']) {
//session_destroy();

  //header("Location: /TP/index.php");
// echo "Su sesion a terminado,
// <a href='index.html'>Necesita Hacer Login</a>";
//exit;
//}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Mr. Sandwich</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/carousel/">
    <script src="js/jquery-3.3.1.slim.min.js"></script>

    <!-- Bootstrap core CSS 
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    
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




}
    </style>
    <!-- Custom styles for this template -->
  </head>
  <body>
    <?php 
      include_once 'php/header.php';
     ?>



  <section class="container">
                  <div align="left">
                    <?php 
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {

                  echo "<button type='button' class='btn btn-sm btn-dark' >Nuevo Menu</button>";
                }
              }

                     ?>
                </div>
                <br>
                <br>
    <div id="galeria" >
      <article text-aling="center" aling="center">
      <div class="row" text-aling="center" >
       <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_cuban.jpg"/>
            <!--            <svg class="bd-placeholder-img card-img-top" width="100%" height="10" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img src="images/en_atun.jpg"/></svg>-->
                            <div class="w3-container w3-black">
                <p>Cubano</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <!--<div class="btn-group">-->
              <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
<div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_cheddar.jpg"/>
                            <div class="w3-container w3-black">
                <p>Crispy Coronado</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_chicken.jpg"/>
                            <div class="w3-container w3-black">
                <p>Pollo Crispy</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_crudo.jpg"/>
                            <div class="w3-container w3-black">
                <p>Jamon Crudo</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
              <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img style="height: 240px;" src="images/Latino_categ_sanddia.jpg"/>
                            <div class="w3-container w3-black">
                <p >Chivito Uruguayo</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_mexicana.jpg"/>
                            <div class="w3-container w3-black">
                <p>Mexicano</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_milanesa.jpg"/>
                            <div class="w3-container w3-black">
                <p>Completo</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_salmon.jpg"/>
                            <div class="w3-container w3-black">
                <p>Salmon rosado</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_ternera.jpg"/>
                            <div class="w3-container w3-black">
                <p>Ternera braseada</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/san_veggie.jpg"/>
                            <div class="w3-container w3-black">
                <p>Veggie</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="30" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><img src="images/img_plato_small.jpg"/></svg>                            <div class="w3-container w3-black">
                <p>Arroz con pollo al champignon</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <<img style="height: 327px;" src="images/Latino_categ_platos.jpg"/>
                            <div class="w3-container w3-black">
                <p>Bondiola con puré</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>

                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_atun.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada de atún</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_caesar.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada Caesar</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_caprese.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada Caprese</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_crispy.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada Crispy</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_pollo_chia.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada de pollo Chia</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_thai.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada Thai</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/en_veggie.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Ensalada Veggie</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img style="height: 240px;" src="images/Latino_categ_postre1.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Lemon Pie</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/Latino_categ_postre2.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Budn de limón</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/Latino_categ_postre3.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Budin de chocolate</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img style="height: 240px;"src="images/Latino_categ_postre4.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Chocolate</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/latinosandwich-74.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Cheesecake</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
                <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/latinosandwich-75.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Chocotorta</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card mb-4 shadow-sm" align="center">
            <img src="images/latinosandwich-79.jpg"/></svg>
                            <div class="w3-container w3-black">
                <p>Chocolate y Nueces</p>
              </div>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div align="left">
                <?php 
                 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                if ($pid == 'admin') {
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Eliminar</button>";
                  echo "<button type='button' class='btn btn-sm btn-outline-dark' >Editar</button>";
                }
              }

                 ?>
                </div>
              <div class="d-flex justify-content-between align-items-center">

              </div>
            </div>
          </div>
        </div>
    </div>
  </article>
</div> 

  </section>

<!--ALBUM--------------------------------------------------------------------------------------------------------------------->

<!--ALBUM--------------------------------------------------------------------------------------------------------------------->

<!--ALBUM---------------------------------------------------------------------------------------------------------------------


<div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <img src="images/san_cuban.jpg"/>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-dark">Eliminar</button>
                  <button type="button" class="btn btn-sm btn-outline-dark">Editar</button>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
-->



 <footer class="bg-dark" style="background: black">
    <p class="float-right"><a class="text-light" href="#" ><img style="width: 50%" src="icons/flecha-arriba.png" ></a></p>
    <p align="center" style="color:white">EDI 2019 - Copyright 2019®</p>
  </footer>
</div> 

</body>



</html>