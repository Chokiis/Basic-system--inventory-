<?php
//Función para insertar un videojuego en la BD.
function insertVideojuego($vjuego,$cons,$adq,$vent){

    $conex = conectarBD();
    $conexR = conectarRBD();
    $insertVJ= "INSERT into tbvideojuegos(NombreJ,Consola,Adquisicion,Venta) values(?,?,?,?)";
    $insertVJR= "INSERT into tbrvideojuegos(NombreJ,Consola,Adquisicion,Venta) values(?,?,?,?)";

    try{

        $stmtR = $conexR->prepare($insertVJR); 
        $stmt = $conex->prepare($insertVJ);

        $stmt->bind_param('ssss',$vjuego,$cons,$adq,$vent);
        $stmtR->bind_param('ssss',$vjuego,$cons,$adq,$vent);

        $stmt->execute();
        $stmtR->execute();

        $stmt->close();
        $stmtR->close();
        
        mysqli_close($conex);
        mysqli_close($conexR);

        return $status= 1;

    }catch(Exception $e){

        die('Excepcion capturada:'. $e->getMesagge());

    }
}
?>