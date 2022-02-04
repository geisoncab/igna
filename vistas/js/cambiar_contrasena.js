var tabla;

const init = async () => {
    console.log('en el init');

    $("#formulario").on("submit",function(e)
	{
		Guardar(e);	
	});
}

const iniciarProcesoCambioContrasena = async () =>{
    let nombre_usuario = $('#nombre_usuario').val();
    let contrasena_actual = $('#contrasena_actual').val();
    let contrasena_nueva = $('#contrasena_nueva').val();
    let contrasena_confirmada = $('#contrasena_confirmada').val();

    if (!nombre_usuario || !contrasena_actual || !contrasena_nueva || !contrasena_confirmada){
        Swal.fire('Oops..','Parece que no se han llenado todos los campos', 'error');
        return;
    }

    if (contrasena_nueva != contrasena_confirmada){
        Swal.fire('Oops..','La contraseña nueva no coincide con la confirmación', 'error');
        return;
    }

    verificarContrasenaActual(nombre_usuario, contrasena_actual, contrasena_nueva, contrasena_confirmada)
}

const verificarContrasenaActual = async (nombre_usuario, contrasena_actual, contrasena_nueva) =>{

	$.ajax({
        url: "../controladores/cambiar_contrasena.php",
        data: {"accion": "verificarContrasenaActual", "nombre_usuario":nombre_usuario, "contrasena_actual":contrasena_actual},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        // console.log(response);
        if(response.password_compare == 'CORRECTO'){
            // console.log('Se va a cambiar la contraseña...');
            guardarNuevaContrasena(nombre_usuario, contrasena_nueva);
        }else if(response.password_compare == 'INCORRECTO'){
            Swal.fire('ERROR','Su contraseña actual no coincide', 'error');
        }
        

        // BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}

const guardarNuevaContrasena = async (nombre_usuario, contrasena_nueva) =>{

    //varialbes para sweetalert   
    let titulo = '';
    let mensaje = '';
    let tipo = '';
    
	$.ajax({
        url: "../controladores/cambiar_contrasena.php",
        method: "POST",
        data: {
            accion: "guardarNuevaContrasena",
            nombre_usuario: nombre_usuario,
            contrasena_nueva: contrasena_nueva
        },
        dataType: "text",
        success: function(response) {
            // console.log(response);
            switch (response) {
                case 'OK_EDITAR':
                    titulo = 'PERFECTO!';
                    mensaje = 'Se ha actualizado la contraseña';
                    tipo = 'success';
                break;
                case 'FAIL_EEDITAR':
                    titulo = 'ERROR!';
                    mensaje = 'No se ha podido actualizar la contraseña';
                    tipo = 'error';
                break;
            }

            Swal.fire(titulo,mensaje,tipo);
        }
    });
	
	limpiarCampos();
}


const limpiarCampos = async () =>{
    $('#contrasena_actual').val('');
    $('#contrasena_nueva').val('');
    $('#contrasena_confirmada').val('');
}


init();