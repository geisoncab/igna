var tabla;

const init = async () => {
    console.log('en el init');
   

    $("#formulario").on("submit",function(e)
	{
		Guardar(e);	
	});

    const parametrosURL = new URLSearchParams(window.location.search);
	const idministerios = parseInt(parametrosURL.get('idministerios'));
    $("#idministerios").val(idministerios);
    mostrarInformacionMinisterio(idministerios);
    Consultar(idministerios);
    

    // $('#maquina').selectpicker('refresh');
    // selectMinisterios();
}

// const selectMinisterios = async () => {
//     $.post('../controladores/comisiones.php', {"accion": "selectMinisterios"},function (response) {
//         //caresponsega datos en el bloque 1
//         // console.log(response);
//         $('#idministerios').html(response);
//         // $('#idministerios').selectpicker('refresh');

//     });
// };

const mostrarInformacionMinisterio = async (idministerios) =>{

	$.ajax({
        url: "../controladores/comisiones.php",
        data: {"idministerios":idministerios, "accion": "mostrarInformacionMinisterio"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        console.log(response);
        let informacion_encabezadoHTML = '';
        informacion_encabezadoHTML = `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="me-1"><i class="fas fa-info-circle"></i></span>
                <div class="ms-2 me-auto">
                    <div class="fw-bold">MINISTERIO SELECCIONADO:</div>
                    ${response.nombre.toUpperCase()}
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span class="badge bg-primary rounded-pill"><i class="fas fa-check-circle"></i></span>
            </li>
        `;
        $('#informacion_encabezado').html(informacion_encabezadoHTML);
    
    }).fail(function(response){
        console.log(response);
    });


}

const Consultar = async (idministerios) =>{

	// console.log('Dentro de listar ....');

    tabla=$('#tablaDatos').dataTable(
        {
            "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el men?? de registros a revisar
            "pageLength": 5,
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginaci??n y filtrado realizados por el servidor
            dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            buttons: [		          
                        // 'copyHtml5',
                        // 'excelHtml5'
                    ],
            "ajax":
                    {
                        url: `../controladores/comisiones.php`,
                        data: {"accion": "CONSULTAR", 'idministerios':idministerios},
                        type: 'POST',
                        dataType : "json",
                        error: function(e){
                            console.log(e.responseText);
                        }
                    },
                    "language": {
                        "sLengthMenu":     "Mostrar _MENU_ registros",
                        "sZeroRecords":    "No se encontraron resultados",
                        "sEmptyTable":     "No hay ning??n dato disponible en esta tabla",
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
                            "sLast":     "??ltimo",
                            "sNext":     "Siguiente",
                            "sPrevious": "Anterior"
                        },            
                        "buttons": {
                        "copyTitle": "Tabla Copiada",
                        "copySuccess": {
                                _: '%d l??neas copiadas',
                                1: '1 l??nea copiada'
                            },
                            "copy": "Copiar",
                            "colvis": "Visibilidad"
                        }
                    },
                    "bDestroy": true,
            "iDisplayLength": 5,//Paginaci??n
            "ordering": false
        }).DataTable();

	//console.log(table);
}

const Guardar = async (e) =>{

	e.preventDefault(); //No se activar?? la acci??n predeterminada del evento
	// $("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

    //varialbes para sweetalert
    let titulo = '';
    let mensaje = '';
    let tipo = '';
	$.ajax({
		url: "../controladores/comisiones.php",
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
                case 'FAIL_EEDITAR':
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

const ConsultarPorId = async (idcomisiones) =>{

	$.ajax({
        url: "../controladores/comisiones.php",
        data: {"idcomisiones":idcomisiones, "accion": "CONSULTAR_ID"},
        type: 'POST',
        dataType: 'json'
    }).done(function(response){

        // console.log(response);
        //abre la modal
        abrirModal(true);

        //carga datos
        $('#idcomisiones').val(response.idcomisiones);
        $('#idministerios').val(response.idministerios);
        $('#nombre').val(response.nombre);
        

        // BloquearBotones(false);
    }).fail(function(response){
        console.log(response);
    });
}
const Eliminar = async (idcomisiones) =>{
    
    //varialbes para sweetalert
    let titulo = '';
    let mensaje = '';
    let tipo = '';

    Swal.fire({
        title: '??Est?? seguro de eliminar el registro?',
        text: "Esta acci??n no se puede deshacer",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar registro!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("../controladores/comisiones.php",{
                accion : 'ELIMINAR',
                idcomisiones: idcomisiones
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
    $('#idcomisiones').val('');
    // $('#idministerios').val('');
    $('#nombre').val('');
}


init();