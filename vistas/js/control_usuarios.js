var tabla;

const init = async () => {
    
    
    console.log('en el init');
    Consultar();

    $("#formulario").on("submit",function(e)
	{
		Guardar(e);	
	});

    autocomplete_miembros();
    deshabilitar_copiarpegar_password();
}

const deshabilitar_copiarpegar_password = async () =>{
    // var myInput = document.getElementById('bloquear');
    let myInput = $('#clave')[0];
    myInput.onpaste = function(e) {
        e.preventDefault();
        // alert("esta acción está prohibida");
        Swal.fire('ADVERTENCIA','No se permite esta acción','warning');
    }
    
    myInput.oncopy = function(e) {
        e.preventDefault();
        // alert("esta acción está prohibida");
        Swal.fire('ADVERTENCIA','No se permite esta acción','warning');
    }
}

const autocomplete_miembros = async() =>{

    $.ajax({
        url: "../controladores/control_usuarios.php",
        data: {"accion": "autocomplete_miembros"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        // console.log(response);
        
        let arrayResponse_id = [];
        let arrayResponse_text = [];
        
        for(i=0; i < response.length; i++){
            arrayResponse_id.push(response[i].idmiembro);
            arrayResponse_text.push(response[i].nombre);
        }

        /**
         * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
         * @param {*} inp -> input al que se le está aplicando el autocompletado 
         * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
         * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
         */
        autocomplete($("#idmiembro")[0], $("#nombre_miembro")[0], arrayResponse_id, arrayResponse_text);

        // BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}

const verificarUsuarioExiste = async () =>{
    let nombre_usuario = $('#nombre_usuario').val();
	$.ajax({
        url: "../controladores/control_usuarios.php",
        data: {"accion": "verificarUsuarioExiste", "nombre_usuario":nombre_usuario},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        // console.log(response);
        if(response.usuarios_existentes >0){
            // console.log("este usuario ya está en uso");
            // console.log("este usuario ya está en uso");
            $('#nombre_usuario_warning').html("Este usuario ya está en uso");
        }else{
            $('#nombre_usuario_warning').html("");
        }
        

        // BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}

const Consultar = async () =>{

	// console.log('Dentro de listar ....');

    tabla=$('#tablaDatos').dataTable({
            "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
            "pageLength": 5,
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            buttons: [		          
                        // 'copyHtml5',
                        // 'excelHtml5'
                    ],
            "ajax":
                    {
                        url: '../controladores/control_usuarios.php',
                        data: {"accion": "CONSULTAR"},
                        type: 'POST',
                        dataType : "json",
                        error: function(e){
                            console.log(e.responseText);
                        }
                    },
                    "language": {
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                        "sInfoPostFix":    "",
                        "sSearch":         "Buscar:",
                        "sUrl":            "",
                        "sInfoThousands":  ",",
                        "sLoadingRecords": "Cargando...",
                        "oPaginate": {
                            "sFirst":    "Primero",
                            "sLast":     "Último",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },            
                        "buttons": {
                        "copyTitle": "Tabla Copiada",
                        "copySuccess": {
                                _: '%d líneas copiadas',
                                1: '1 línea copiada'
                            },
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },
                    "bDestroy": true,
            "iDisplayLength": 5,//Paginación
            "ordering": false
        }).DataTable();

	//console.log(table);
}

const Guardar = async (e) =>{

	e.preventDefault(); //No se activará la acción predeterminada del evento
	// $("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

    //varialbes para sweetalert
    let titulo = '';
    let mensaje = '';
    let tipo = '';
	$.ajax({
		url: "../controladores/control_usuarios.php",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(response)
	    {                    
            
            // console.log(response);
            
            switch (response) {
                case 'OK_REGISTRO':
                    titulo = 'PERFECTO!';
                    mensaje = 'Se ha guardado el nuevo registro';
                    tipo = 'success';
                break;
                case 'FAIL_REGISTRO':
                    titulo = 'ERROR!';
                    mensaje = 'Hubo un problema al intentar guardar el nuevo registro';
                    tipo = 'error';
                break;
                case 'OK_EDITAR':
                    titulo = 'PERFECTO!';
                    mensaje = 'Se han guardado los cambios';
                    tipo = 'success';
                break;
                case 'FAIL_EDITAR':
                    titulo = 'ERROR!';
                    mensaje = 'Hubo un problema al intentar guardar los cambios';
                    tipo = 'error';
                break;
            }

            Swal.fire(titulo,mensaje,tipo);
            tabla.ajax.reload();
            abrirModal(false);
	    }

	});
	
	limpiarCampos();
}

const ConsultarPorId = async (idusuario) =>{

	$.ajax({
        url: "../controladores/control_usuarios.php",
        data: {"idusuario":idusuario, "accion": "CONSULTAR_ID"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        // console.log(response);
        //abre la modal
        abrirModal(true);

        //carga datos
        $('#idusuario').val(response.idusuario);

        $('#idmiembro').val(response.idmiembro);
        $('#nombre_miembro').val(response.miembro);

        $('#nombre_usuario').val(response.nombre_usuario);
        $('#clave').val(response.clave);
        $(`#nivel_${response.nivel}`).prop('checked', true);
        

        // BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}
const Eliminar = async (idusuario) =>{
    
    //varialbes para sweetalert
    let titulo = '';
    let mensaje = '';
    let tipo = '';

    Swal.fire({
        title: '¿Está seguro de eliminar el registro?',
        text: "Esta acción no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar registro!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controladores/control_usuarios.php",{
                accion : 'ELIMINAR',
                idusuario: idusuario
            }, function(response){
                if(response == "OK"){
                    titulo = 'PERFECTO!';
                    mensaje = 'Se ha eliminado el registro';
                    tipo = 'success';
                }else{
                    titulo = 'ERROR!';
                    mensaje = 'Hubo un problema al intentar eliminar el registro';
                    tipo = 'error';
                }
        		Swal.fire(titulo, mensaje, tipo);
                tabla.ajax.reload();
        	});
            
        }
      });
}

const abrirModal = async (flag) =>{
    limpiarCampos();
    if(flag){
        $( "#abrirForm" ).trigger( "click" );
    }else{
        $( "#btnVolver" ).trigger( "click" );
    }
}

const limpiarCampos = async () =>{
    $('#idusuario').val('');
    $('#nombre').val('');
    
    $('#idmiembro').val("");
    $('#nombre_miembro').val("");
    $('#nombre_usuario').val("");
    $('#clave').val("");
    $(`#nivel_ADMINISTRADOR`).prop('checked', true);
}


init();