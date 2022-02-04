//variable que nos sirve para redirigir al controlador
var url="./../controlador/login.php"

const init = async () =>{
    console.log('en el init');


}

//PARA CREAR LA SESION DEL USUARIO
function cerrarSesion(){
    $.ajax({
        url: "../controladores/login.php",
        data: {"accion": "CERRAR_SESION"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        //alert(response);
        if(response == "OK"){ //si nos confirma la creacion de la session, redireccionamos
            //MostrarAlerta("BIENVENIDO!", "Espere mientras se cargan todos los módulos..", "success");
            $(location).attr("href", "login.php");
        }else{
            MostrarAlerta("ERROR!", response, "error");
        }
        

        //BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}

init();