<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta de usuarios</title>
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

          <!--Inicio del código de las tarjetas de inicio-->
          <h1 class="display-3 text-center mt-5 text-white">¿Seguro que eliminarás?</h1>
          <div class="container text-dark mt-5">
              <form class="contenedorform" action="controlador.php" method="POST">
                  <div class="form-group">
                    <label>Usuario:</label>
                    <label> <?php echo $_REQUEST['usuR'];?></label>
                    <input type="hidden" class="form-control form-control-sm " name="txtIdElim" value="<?php echo $_REQUEST['idR'];?>">
                  </div>
                  <button type="submit" name="btnEliminarU" class="btn btn-outline-success">Confirmar</button>
                  <button type="submit" name="btnRegreso" class="btn btn-outline-danger">Descartar</button>
              </form>
          </div>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    </body>
</html>