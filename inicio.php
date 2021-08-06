<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Inicio Mancos Anónimos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">

        <?php
          session_start();
          $Usesion= $_SESSION['usuarioS'];

          if($Usesion == null || $Usesion='' ){
            echo '<script>alert("Debe de iniciar sesión para comenzar"); window.location="index.html";</script>';
          }
        ?>
    </head>
    <body>
      <!-- Código de navegador superior (botones y barra de búsqueda)-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="inicio.php">
                <img src="imagenes/Chokiis.jpg" alt="Chokiis corps" width="40" height="34" class="d-inline-block ">
                Mancos Anónimos
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

               
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 col-md">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inicio.php">Home</a>
                  </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuarios
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="formUsuarios.php">Registrar a un usuario</a>
                        <a class="dropdown-item" href="consultaUsuarios.php">Consultar a un usuario</a>
                      </div>
                    </li>

                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Videojuegos
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="formVideojuegos.php">Registrar un juego</a>
                        <a class="dropdown-item" href="consultaJuegos.php">Consultar un juego</a>
                      </div>
                    </li>
                </ul>
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" method="POST" action="controlador.php">
                    <div class="text-end">
                    <label class="usuarioLog mr-3"><?php echo $_SESSION['usuarioS'] ?></label>
                      <button class="btn btn-warning" type="submit" name="btnCerrar">Cerrar sesión</button>
                    </div>
                </form>
              </div>
            </div>
          </nav>

          <!--Inicio del código de las tarjetas de inicio-->
          <h1 class="display-3 text-center mt-5 text-white">Mancos Anónimos <?php echo $_SESSION['usuarioS'] ?></h1>
          <div class="row justify-content-md-center col-md-auto mt-5">
            <div class="col">
              <div class="card h-100 border-secondary text-secondary">
                <img src="imagenes/osu.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">osu!</h5>
                  <p class="card-text">osu! es un juego rítimico que consiste en dar hit a las notas mediante vas haciendo el mapa, un gran reto para tus reflejos.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border-secondary text-secondary">
                <img src="imagenes/lol.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">League of Legends</h5>
                  <p class="card-text">Un MOBA clásico de muchos años que consiste en un juego 5v5 donde puedes elegir a tu campeón favorito para ganar.</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card h-100 border-secondary text-secondary">
                <img src="imagenes/dance.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">A dance of Fire and Ice</h5>
                  <p class="card-text">Un juego rítimo que pone a pruebas tus reflejos y dedos igual que osu!, pero con una dinámica muy diferente y divertidos mapas.</p>
                </div>
              </div>
            </div>
          </div>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>