<?php
//Función conexión a BD.
function conectarBD(){

    $servidor="localhost";
    $baseDatos="dbmancosa";
    $usuario="root";
    $password="";

    $conexion= mysqli_connect($servidor,$usuario,$password,$baseDatos) or die ("No se pudo conectar");

    return $conexion;
}

//Función conexión al respaldo BD.
function conectarRBD(){

    $servidor="localhost";
    $baseDatos="dbresmancosa";
    $usuario="root";
    $password="";

    $conexionR= mysqli_connect($servidor,$usuario,$password,$baseDatos) or die ("No se pudo conectar");

    return $conexionR;
}

//Función para validar entrada al MancosA.
function validarUsuario($usu,$cont){

    $conex=conectarBD();
    $consulta="SELECT Pass from tbusuarios where Usuario='$usu'";

    try{

        $rvsval= mysqli_query($conex,$consulta);
        $NumReg= mysqli_num_rows($rvsval);
        $regBd= mysqli_fetch_array($rvsval);
        mysqli_close($conex);

        if(($NumReg == 1) && ($cont === $regBd['Pass'])){

            $status=1;
            
        }else{

            $status=0;

        }
        return $status;

    }catch(Exception $e){
        die('Excepcion capturada:'. $e->getMessage());
    }
}

//Función para insertar un usuario en la BD.
function guardarUsuario($usu,$cont,$per){

    if($usu === "" || $cont === "" || $confirm === "" || $per === ""){

        $status= 0;

    }else{

        $conex= conectarBD();

        $insertU= "INSERT into tbusuarios(Usuario,Pass,Perfil) values(?,?,?)";

        try{

            $stmt = $conex->prepare($insertU);
            $stmt->bind_param('sss',$usu,$cont,$per);
            $stmt->execute();

            $stmt->close();
            mysqli_close($conex);

            return $status= 1;

        }catch(Exception $e){

            die('Excepcion capturada:'. $e->getMesagge());

        }

    }
}

//Función para consultar en la BD.
function consultaUsuarios(){

    $conex=conectarBD();
    $selectUs="SELECT * from tbusuarios";

    try{

        $rsUsuarios = mysqli_query($conex,$selectUs);
        mysqli_close($conex);

        return $rsUsuarios;

    }catch(Exception $e){

        die('Excepcion capturada:'. $e->getMesagge());

    }
}

//Función para eliminar en la BD.
function eliminarUsuario($idUsuario){

    $conex=conectarBD();
    $deleteU="DELETE FROM tbusuarios where idUsuario = ?";

    try{

        $stmt= $conex->prepare($deleteU);
        $stmt->bind_param('i',$idUsuario);
        $stmt->execute();

        $stmt->close();
        mysqli_close($conex);

        $status=1;

        return $status;

    }catch(Exception $e){

        die('Excepcion al eliminar:'. $e->getMesagge());

    }
}

//Consulta para la tabla de videojuegos.
function consultaVideojuegos(){

    $conex = conectarBD();
    $consVJ = "SELECT * from tbvideojuegos";

    try{

        $rsVJ = mysqli_query($conex,$consVJ);
        mysqli_close($conex);

        return $rsVJ;

    }catch(Exception $e){

        die('Excepcion capturada:'. $e->getMesagge());

    }
}

//Función para la eliminación de juegos.
function eliminarVJ($idElimVJ){

    $conex=conectarBD();
    $borrarVJ="DELETE FROM tbvideojuegos where idJuego = ?";

    try{

        $stmt= $conex->prepare($borrarVJ);
        $stmt->bind_param('i',$idElimVJ);
        $stmt->execute();

        $stmt->close();
        mysqli_close($conex);

        return $status = 1;

    }catch(Exception $e){

        die('Excepcion al eliminar:'. $e->getMesagge());

    }
}

function actualizarJuego($nombreJu,$Consol,$Adquis,$Vent,$idJ){

    $conex = conectarBD();
    $conexR = conectarRBD();

    $actVJ= "UPDATE tbvideojuegos SET NombreJ= '$nombreJu', Consola= '$Consol', Adquisicion= '$Adquis',
    Venta= '$Vent' where idJuego= '$idJ'";

    $actVJR= "UPDATE tbrvideojuegos SET NombreJ= '$nombreJu', Consola= '$Consol', Adquisicion= '$Adquis',
    Venta= '$Vent' where idJuego= '$idJ'";

    try{

        $rsVJR = mysqli_query($conexR,$actVJR);
        $rsVJ = mysqli_query($conex,$actVJ);
        
        mysqli_close($conex);
        mysqli_close($conexR);

        return $rsVJ;

    }catch(Exception $e){

        die('Excepcion capturada:'. $e->getMesagge());

    }
}