var tabla;
var tabla_hijos;
var tabla_conyuge;

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
    get_hijos(idmiembro);
    get_conyuge(idmiembro);

    autocomplete_papa();
    autocomplete_mama();
    
}

const autocomplete_papa = async() =>{

    const resultado = await fetch(`../controladores/central_censar_miembro_info_familiar.php?accion=autocomplete_papa`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let arrayResponse_id = [];
    let arrayResponse_text = [];
    
    for(i=0; i < datos.length; i++){
        arrayResponse_id.push(datos[i].idmiembro);
        arrayResponse_text.push(datos[i].nombre);
    }

    /**
     * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
     * @param {*} inp -> input al que se le está aplicando el autocompletado 
     * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
     * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
     */
    autocomplete($("#idmiembro_papa")[0], $("#nombre_miembro_papa")[0], arrayResponse_id, arrayResponse_text);

}

const autocomplete_mama = async() =>{

    const resultado = await fetch(`../controladores/central_censar_miembro_info_familiar.php?accion=autocomplete_mama`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let arrayResponse_id = [];
    let arrayResponse_text = [];
    
    for(i=0; i < datos.length; i++){
        arrayResponse_id.push(datos[i].idmiembro);
        arrayResponse_text.push(datos[i].nombre);
    }

    /**
     * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
     * @param {*} inp -> input al que se le está aplicando el autocompletado 
     * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
     * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
     */
    autocomplete($("#idmiembro_mama")[0], $("#nombre_miembro_mama")[0], arrayResponse_id, arrayResponse_text);

}

const mostrarInformacionMiembro = async (idmiembro) =>{

    const resultado = await fetch(`../controladores/central_censar_miembro_info_familiar.php?accion=mostrarInformacionMiembro&idmiembro=${idmiembro}`);
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
                        url: `../controladores/central_censar_miembro_info_familiar.php?accion=CONSULTAR&idmiembro=${idmiembro}`,
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
                        "sEmptyTable":     "Los padres del miembro seleccionado no se encuentran registrados",
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

const get_conyuge = async (idmiembro) =>{

	// console.log('Dentro de listar ....');

    tabla_conyuge=$('#tablaDatos_conyuge').dataTable(
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
                        url: `../controladores/central_censar_miembro_info_familiar.php?accion=get_conyuge&idmiembro=${idmiembro}`,
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
                        "sEmptyTable":     "No se ha encontrado registros conyugales para el miembro seleccionado",
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

const get_hijos = async (idmiembro) =>{

	// console.log('Dentro de listar ....');

    tabla_hijos=$('#tablaDatos_hijos').dataTable(
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
                        url: `../controladores/central_censar_miembro_info_familiar.php?accion=get_hijos&idmiembro=${idmiembro}`,
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
                        "sEmptyTable":     "No se ha encontrado registros sobre los hijos del miembro seleccionado",
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
		url: "../controladores/central_censar_miembro_info_familiar.php?accion=GUARDAR",
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

// const ConsultarPorId = async (idinformacionfamiliar) =>{

//     const resultado = await fetch(`../controladores/central_censar_miembro_info_familiar.php?accion=CONSULTAR_ID&idinformacionfamiliar=${idinformacionfamiliar}`);
// 	const datos = await resultado.json();
    
//     // console.log(datos);
    
//     //abre la modal
//     await abrirModal(true);

//     //carga datos
//     $('#idinformacionconyugal').val(datos.idinformacionconyugal);

//     $('#idmiembro_conyuge').val(datos.idinformacionconyugal);
//     $('#nombre_miembro_conyuge').val(datos.idinformacionconyugal);    

// }


const Eliminar = async (idinformacionfamiliar) =>{
    
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
            $.post("../controladores/central_censar_miembro_info_familiar.php?accion=ELIMINAR",{
                idinformacionfamiliar: idinformacionfamiliar
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

    $('#idinformacionfamiliar').val('');

    $('#idmiembro_papa').val('');
    $('#nombre_miembro_papa').val('');
    $('#idmiembro_mama').val('');
    $('#nombre_miembro_mama').val('');
    

}


init();