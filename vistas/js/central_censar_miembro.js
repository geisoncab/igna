var tabla;

const init = async () => {
    console.log('en el init');
    Consultar();

    $("#formulario").on("submit",function(e)
	{
		Guardar(e);	
	});

    await get_idiomas();
    await get_estadocivil();
    await autocomplete_direcciones();
    await autocomplete_ocupaciones();
}

const get_idiomas = async() =>{

    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=get_idiomas`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let listado_idiomasHTML = '';
    for(i=0; i < datos.length; i++){
        listado_idiomasHTML += `
            <li class="pl-4 list-group-item">
                <input class="form-check-input me-1" type="checkbox" name="ididiomas[]" id="idiomas_${datos[i].ididiomas}" value="${datos[i].ididiomas}" aria-label="..." ${i==0?'checked':''}>
                <label class="form-check-label" for="idiomas_${datos[i].ididiomas}">${datos[i].nombre.toLowerCase()}</label>
            </li>
        `;
    }
    $('#listado_idiomas').html(listado_idiomasHTML)

    
}

const get_estadocivil = async() =>{
    
    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=get_estadocivil`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let listado_estadocivilHTML = '';
    for(i=0; i < datos.length; i++){
        listado_estadocivilHTML += `
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="idestadocivil" id="idestadocivil_${datos[i].idestadocivil}" value="${datos[i].idestadocivil}" ${i==0?'checked':''}>
                <label class="form-check-label" for="idestadocivil_${datos[i].idestadocivil}">${datos[i].nombre.toLowerCase()}</label>
            </div>
        `;
    }
    $('#listado_estadocivil').html(listado_estadocivilHTML);

}

const autocomplete_direcciones = async() =>{

    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=autocomplete_direcciones`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let arrayResponse_id = [];
    let arrayResponse_text = [];
    
    for(i=0; i < datos.length; i++){
        arrayResponse_id.push(datos[i].idbcfa);
        arrayResponse_text.push(datos[i].direccion);
    }

    /**
     * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
     * @param {*} inp -> input al que se le está aplicando el autocompletado 
     * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
     * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
     */
    autocomplete($("#idbcfa")[0], $("#direccion")[0], arrayResponse_id, arrayResponse_text);

}

const autocomplete_ocupaciones = async() =>{

    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=autocomplete_ocupaciones`);
	const datos = await resultado.json();
    
    // console.log(datos);

    let arrayResponse_id = [];
    let arrayResponse_text = [];
    
    for(i=0; i < datos.length; i++){
        arrayResponse_id.push(datos[i].idocupaciones);
        arrayResponse_text.push(datos[i].nombre);
    }

    /**
     * @param {*} inp_ids -> input que servirá ára settear el id del registro seleccionado
     * @param {*} inp -> input al que se le está aplicando el autocompletado 
     * @param {*} arr_ids -> Array que aloja los IDs de la información obtenida de la BD a la cual se le aplica el autocompletado
     * @param {*} arr -> Array que aloja la información obtenida de la BD a la cual se le aplica el autocompletado
     */
    autocomplete($("#idocupaciones")[0], $("#ocupaciones")[0], arrayResponse_id, arrayResponse_text);

}

const Consultar = async () =>{

	// console.log('Dentro de listar ....');

    tabla=$('#tablaDatos').dataTable(
        {
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
                        url: '../controladores/central_censar_miembro.php?accion=CONSULTAR',
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
		url: "../controladores/central_censar_miembro.php?accion=GUARDAR",
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
                    titulo = 'IDIOMAS_VACIO';
                    mensaje = 'Debe seleccionar al menos 1 idioma';
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

const ConsultarPorId = async (idmiembro) =>{

    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=CONSULTAR_ID&idmiembro=${idmiembro}`);
	const datos = await resultado.json();
    
    // console.log(datos);
    
    //abre la modal
    await abrirModal(true);

    //carga datos
    $('#idmiembro').val(datos.idmiembro);
    $('#cui').val(datos.cui);
    $('#nombre').val(datos.nombre);
    $('#fecha_nacimiento').val(datos.fecha_nacimiento);
    $(`#genero_${datos.genero}`).prop('checked', true);
    $(`#idestadocivil_${datos.idestadocivil}`).prop('checked', true);
    
    

    $('#idbcfa').val(datos.idbcfa);
    $('#direccion').val(datos.direccion);
    
    $('#referencia').val(datos.referencia);
    $('#telefono').val(datos.telefono);

    $('#idocupaciones').val(datos.idocupaciones);
    $('#ocupaciones').val(datos.ocupacion);

    /**
     * Se usa la función para poder hacer un select
     * a los idiomas del miembro seleccionado y que preseleccione solo el primero
     */
    await get_idiomasmiembro(datos.idmiembro);
    

}

const get_idiomasmiembro = async (idmiembro) =>{

    const resultado = await fetch(`../controladores/central_censar_miembro.php?accion=get_idiomasmiembro&idmiembro=${idmiembro}`);
	const datos = await resultado.json();
    
    // console.log(datos);

    for(i=0; i < datos.length; i++){
            
        $(`#idiomas_${datos[i].ididiomas}`).prop('checked', true);
    }

}

const Eliminar = async (idmiembro) =>{
    
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
            $.post("../controladores/central_censar_miembro.php?accion=ELIMINAR",{
                idmiembro: idmiembro
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

    $('#idmiembro').val('');
    $('#cui').val('');
    $('#nombre').val('');
    $('#fecha_nacimiento').val('');
    $('#genero_MASCULINO').prop('checked', true);
    // $('#idiomas_1').prop('checked', true); // el "_1" es el id de ESPAÑOL
    $('#idestadocivil_1').prop('checked', true); //el "_1" es el id de SOLTERO(A)
    
    

    $('#idbcfa').val('');
    $('#direccion').val('');
    
    $('#referencia').val('');
    $('#telefono').val('');

    $('#idocupaciones').val('');
    $('#ocupaciones').val('');

    /**
     * Se usan las función debido a que la lista de idiomas y lista de estado civil se
     * genera a través de JS y se preselecciona al menos un campo
     */
     await get_idiomas();

}


init();