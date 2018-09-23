var tabla;
function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	})

	//cargamos datos del select grupo 
	$.post("../ajax/usuario.php?op=selectGrupo", function(r){
		$("#id_grupo").html(r);
		$('#id_grupo').selectpicker('refresh');

});
//cargamos datos del select rol
$.post("../ajax/usuario.php?op=selectRol", function(r){
	$("#id_rol").html(r);
	$('#id_rol').selectpicker('refresh');
	

});

}

//Función limpiar
function limpiar()
{
    $("#rut").val("");
    $("#dv").val("");
    $("#pass").val("");
    $("#nombre").val("");
	$("#id_grupo").val("");
    $("#id_rol").val("");
    $("#email").val("");
	$("#telefono").val("");
	$("#btn-agregar").show();
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		
	    $("#btn-agregar").hide();
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
		$("#div_rut").show();
		 $("#div-dv").show();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/usuario.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 5,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
}
//Función para guardar o editar

function guardaryeditar(e)
{
	e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/usuario.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
			bootbox.alert(datos);	          
			mostrarform(false);
			tabla.ajax.reload();
	    }

	});
	limpiar();
}
function mostrar(rut)
{
	$.post("../ajax/usuario.php?op=mostrar",{rut : rut}, function(data, status)
	{
		data = JSON.parse(data);		
        mostrarform(true);
        
		 $("#btn-agregar").hide();
		 $("#rut").val(data.rut);
		 $("#div_rut").hide();
		 $("#div-dv").hide();
         $("#dv").val('99');
         $("#nombre").val(data.nombre);
         $("#id_grupo").val(data.id_grupo);
         $("#id_rol").val(data.id_rol);
         $("#email").val(data.email);
         $("#telefono").val(data.telefono);
 	})
}
function desactivar(rut)
{
	bootbox.confirm("¿Está Seguro de desactivar El Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=desactivar", {rut : rut}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
function activar(rut)
{
	bootbox.confirm("¿Está Seguro de activar El Usuario?", function(result){
		if(result)
        {
        	$.post("../ajax/usuario.php?op=activar", {rut : rut}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
init();