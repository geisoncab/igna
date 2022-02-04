var tabla;

const init = async () => {
    console.log('en el init');
    

    $("#formulario").on("submit",function(e)
	{
		Guardar(e);	
	});

    const parametrosURL = new URLSearchParams(window.location.search);
	const idmiembro = parseInt(parametrosURL.get('idmiembro'));
    $("#idmiembro").val(idmiembro);
    mostrarInformacionMiembro(idmiembro);
    Consultar(idmiembro);

}


const mostrarInformacionMiembro = async (idmiembro) =>{

    const resultado = await fetch(`../controladores/central_censar_miembro_info_visitas_pastorales.php?accion=mostrarInformacionMiembro&idmiembro=${idmiembro}`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let informacion_encabezadoHTML = '';
    informacion_encabezadoHTML = `
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span class="me-1"><i class="fas fa-info-circle"></i></span>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <div class="ms-2 me-auto">
                <div class="fw-bold">MOSTRANDO INFORMACIÓN DE:</div>
                <div>${datos.nombre.toUpperCase()}</div>
                <div> tel. ${datos.telefono.toUpperCase()}</div>
                <div>${datos.estado_civil.toUpperCase()}</div>
                <div>${datos.direccion.toUpperCase()}</div>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <span class="badge bg-primary rounded-pill"><i class="fas fa-check-circle"></i></span>
        </li>
    `;
    $('#informacion_encabezado').html(informacion_encabezadoHTML);

}

const Consultar = async (idmiembro) =>{

	// console.log('Dentro de listar ....');

    tabla=$('#tablaDatos').dataTable(
        {
            "lengthMenu": [ 5, 10, 25, 75, 100],//mostramos el menú de registros a revisar
            "pageLength": 5,
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false,
            "bPaginate": false,
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: '<Bl<f>rtip>',//Definimos los elementos del control de tabla
            buttons: [		          
                        // 'copyHtml5',
                        // 'excelHtml5'
                    ],
            "ajax":
                    {
                        url: `../controladores/central_censar_miembro_info_visitas_pastorales.php?accion=CONSULTAR&idmiembro=${idmiembro}`,
                        // data: {"accion": "CONSULTAR"},
                        // type: 'POST',
                        type: 'GET',
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
		url: "../controladores/central_censar_miembro_info_visitas_pastorales.php?accion=GUARDAR",
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
                default:
                    titulo = 'NO_DEFINIDO';
                    mensaje = 'response: ' + response;
                    tipo = 'error';
                break;
            }

            Swal.fire(titulo,mensaje,tipo);
            tabla.ajax.reload();
            abrirModal(false);
	    }

	});
	
	await limpiarCampos();
}

const ConsultarPorId = async (idvisitaspastorales) =>{

    const resultado = await fetch(`../controladores/central_censar_miembro_info_visitas_pastorales.php?accion=CONSULTAR_ID&idvisitaspastorales=${idvisitaspastorales}`);
	const datos = await resultado.json();
    
    // console.log(datos);
    
    //abre la modal
    await abrirModal(true);

    //carga datos
    $('#idvisitaspastorales').val(datos.idvisitaspastorales);
    $('#fecha_visita').val(datos.fecha_visita);

}


const Eliminar = async (idvisitaspastorales) =>{
    
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
            $.post("../controladores/central_censar_miembro_info_visitas_pastorales.php?accion=ELIMINAR",{
                idvisitaspastorales: idvisitaspastorales
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
    await limpiarCampos();
    if(flag){
        $( "#abrirForm" ).trigger( "click" );
    }else{
        $( "#btnVolver" ).trigger( "click" );
    }
}

const limpiarCampos = async () =>{

    $('#idvisitaspastorales').val('');
    $('#fecha_visita').val('');

}


init();