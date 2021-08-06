function vaciosLogin(){

    var usuario= document.getElementById("txtusuario").value;
    var contra= document.getElementById("txtpass").value;

    if(usuario == ""){
        swal("Dato erróneo detectado","El campo usuario está vacío.", "error");
        return false;
    }

    if(contra == ""){
        swal("Dato erróneo detectado","El campo password está vacío.", "error");
        return false;
    }
}

function vaciosJuego(){

    var juego = document.getElementById("txtjuego").value;
    var tcons = document.getElementById("txtconsola").value;
    var tadq = document.getElementById("txtadquisicion").value;
    var tven = document.getElementById("txtventa").value;

    if(juego == "" || tcons == "" || tadq == "" || tven == ""){
        swal("Valor inválido","Hay un campo vacío, favor de verificar la información.", "error");
        return false;
    }
}

function vaciosUsu(){

    var tcorreo = document.getElementById("txtcorreo").value;
    var tpass = document.getElementById("txtpass").value;
    var tcpass = document.getElementById("txtcpass").value;
    var selp = document.getElementById("selperfil").value;

    if(tcorreo == "" || selp == ""){
        swal("Valor inválido","Hay un campo vacío, favor de verificar la información.", "error");
        return false;
    }

    if(tpass == ""){
        swal("Valor inválido","Hay un campo vacío en el password.", "error");
        return false;
    }

    if(tcpass == ""){
        swal("Valor inválido","Hay un campo vacío en la confirmación de password.", "error");
        return false;
    }

    if(tpass !== tcpass){
        swal("Error","Las contraseñas no coinciden.", "error");
        return false;
    }
}
