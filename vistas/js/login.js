//variable que nos sirve para redirigir al controlador
var url="./../controlador/Login.php"

const init = async () =>{
    console.log('en el init');

    $("#formulario").on("submit",function(e)
	{
		verificarUsuario(e);	
	});
}



// $(document).ready(function(){
//     //Consultar();
//     //BloquearBotones(true);
// })

function tomarDatosLogin(accion){
    return {
        "usuario": document.getElementById('txtUsuario').value,
        "clave": document.getElementById('txtClave').value,
        "accion": accion,
        
    };
}

const verificarUsuario = async (e) =>{
    console.log('verificar usuario...')
    e.preventDefault();
    var formData = new FormData($("#formulario")[0]);

    $.ajax({
        url: "../controladores/login.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData:false,
        dataType: 'json',
        success: function(datos){
            // console.log(datos);
            // crearSesion(response.nombre_usuario);
            if(datos){ //si hay algún resultado obtenido
                console.log(datos);
                console.log(datos.nombre_usuario);

                crearSesion(datos.nombre_usuario, datos.nivel, datos.nombre_miembro);
            }else{
                MostrarAlerta("ERROR!", "usuario y/o contraseña incorrectos", "error");
            }
        }
    });

}


//PARA CREAR LA SESION DEL USUARIO
// function crearSesion(usuario){
const crearSesion = async (nombre_usuario, nivel, nombre_miembro) =>{
    $.ajax({
        url: "../controladores/login.php",
        data: {
            "usuario": nombre_usuario,
            "nivel": nivel,
            "nombre_miembro": nombre_miembro,
            "accion": "CREAR_SESION"
        },
        type: 'POST',
        dataType: 'json'
    }).done(function(response){
        //alert(response);
        if(response == "OK"){ //si nos confirma la creacion de la session, redireccionamos
            //MostrarAlerta("BIENVENIDO!", "Espere mientras se cargan todos los módulos..", "success");
            console.log(response);
            $(location).attr("href", "inicio.php");
        }else{
            MostrarAlerta("ERROR!", response, "error");
        }
        

        //BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}


//CERRAR SESION ESTÁ EN MENU


//se usa la libreria sweet alert
function MostrarAlerta(titulo, descripcion, tipoAlerta){
    Swal.fire(
        titulo,
        descripcion,
        tipoAlerta
      )
}

init();