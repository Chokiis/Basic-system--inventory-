<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Controlador</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="css/estilos.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
      

        <?php
        
            require 'funcionesBD.php';
            require 'funcionesJuegoBD.php';

            if(isset($_POST['btnIngresar'])){

                $usu=$_POST['txtusuario'];
                $cont=$_POST['txtpass'];

                $status= validarUsuario($usu,$cont);

                if($status === 1){

                    session_start();
                    $_SESSION['usuarioS']="$usu";

                    echo "<script> alert('Bienvenido a Mancos Anonimos')</script>";
                    echo "<script> window.location= 'inicio.php' </script>";
                }else{

                    echo "<script> alert('Verifica tus credenciales')</script>";
                    echo "<script> window.location= 'index.html' </script>";
                
                }                
            }

            if(isset($_POST['btnGusuario'])){

                $usu=$_POST['txtcorreo'];
                $cont=$_POST['txtpass'];
                $confirm=$_POST['txtcpass'];
                $per=$_POST['selperfil'];

                if($cont === $confirm){
                        
                    echo "<script> alert ('Usuario no guardado, verifique la información') </script>";
                    echo "<script> window.location= 'formUsuarios.php' </script>";

                    $status= guardarUsuario($usu,$cont,$per);
    
                    if ($status === 1) {
                        echo "<script> alert ('Usuario guardado en la BD') </script>";
                        echo "<script> window.location= 'formUsuarios.php' </script>";
                    } else {
                        echo "<script> alert ('Usuario no guardado, verifique la información') </script>";
                        echo "<script> window.location= 'formUsuarios.php' </script>";
                    }
    
                }else{
    
                    echo "<script> alert('Las contraseñas no coinciden') </script>";
                    echo "<script> window.location= 'formUsuarios.php' </script>";
    
                }
            }


            if(isset($_POST['btnEliminarU'])){

                $idUsuario= $_POST['txtIdElim'];

                $stat= eliminarUsuario($idUsuario);

                if ($stat === 1) {
                    echo "<script> alert ('Usuario eliminado de la BD') </script>";
                    echo "<script> window.location= 'consultaUsuarios.php' </script>";
                } else {
                    echo "<script> alert ('Usuario no eliminado') </script>";
                    echo "<script> window.location= 'consultaUsuarios.php' </script>";
                }
            }

            if(isset($_POST['btnCerrar'])){

                session_start();
                session_destroy();
                echo '<script> window.location="index.html";</script>';

            }

            if(isset($_POST['btnGjuegos'])){

                $vjuego=$_POST['txtjuego'];
                $cons=$_POST['txtconsola'];
                $adq=$_POST['txtadquisicion'];
                $vent=$_POST['txtventa'];
                    
                $status= insertVideojuego($vjuego,$cons,$adq,$vent);

                if ($status === 1) {
                    echo "<script> alert ('Videojuego registrado en la BD') </script>";
                    echo "<script> window.location= 'formVideojuegos.php' </script>";
                } else {
                    echo "<script> alert ('Videojuego no registrado, verifique la informacion') </script>";
                    echo "<script> window.location= 'formVideojuegos.php' </script>";
                }
            }

            if(isset($_POST['btnEliminarJuego'])){

                $idElimVJ= $_POST['txtIdElimVJ'];

                $stat= eliminarVJ($idElimVJ);

                if ($stat === 1) {
                    echo "<script> alert ('El juego se ha eliminado correctamente.') </script>";
                    echo "<script> window.location= 'consultaJuegos.php' </script>";
                } else {
                    echo "<script> alert ('No se ha podido eliminar el juego.') </script>";
                    echo "<script> window.location= 'consultaJuegos.php' </script>";
                }
            }

            if(isset($_POST['btnActJuego'])){

                $idJ= $_POST['txtIdActVJ'];
                $nombreJu= $_POST['txtModJuego'];
                $Consol= $_POST['txtModConsola'];
                $Adquis= $_POST['txtModAdqui'];
                $Vent= $_POST['txtModVenta'];

                $status= actualizarJuego($nombreJu,$Consol,$Adquis,$Vent,$idJ);

                if ($status) {
                    echo "<script> alert ('El juego se ha actualizado correctamente.') </script>";
                    echo "<script> window.location= 'consultaJuegos.php' </script>";
                } else {
                    echo "<script> alert ('No se ha actualizado el juego correctamente.') </script>";
                    echo "<script> window.location= 'consultaJuegos.php' </script>";
                }
            }

            if(isset($_POST['btnDesc'])){
                echo "<script> window.location= 'consultaJuegos.php' </script>";
            }
        ?>

    </body>
</html>