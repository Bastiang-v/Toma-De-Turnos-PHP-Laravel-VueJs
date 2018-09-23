<?php
require_once "../modelos/Grupo.php";

$grupo = new Grupo();
$id_grupo=isset($_POST["id_grupo"])? limpiarCadena($_POST["id_grupo"]):"";
$nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$descripcion=isset($_POST['descripcion'])? limpiarCadena($_POST['descripcion']):"";
$max_turno=isset($_POST['max_turno'])? limpiarCadena($_POST['max_turno']):"";
$inicio_toma=isset($_POST['inicio_toma'])? limpiarCadena($_POST['inicio_toma']):"";
switch ($_GET["op"]) {
    case 'guardaryeditar':
    if (empty($id_grupo)){
        $rspta=$grupo->insertarGrupo($nombre,$descripcion,$max_turno,$inicio_toma);
        echo $rspta ? "Grupo Registrado Exitosamente" : "Grupo no se pudo registrar";
    }
    else {
        $rspta=$grupo->editarGrupo($id_grupo,$nombre,$descripcion,$max_turno,$inicio_toma);
        echo $rspta ? "Grupo Editado Exitosamente" : "Grupo no se pudo Editado";
    }
break;
    case 'desactivar':
$rspta=$grupo->desactivarGrupo($id_grupo);
echo $rspta ? "Grupo Desactivado Exitosamente" : "Grupo No se pudo Desactivar";
    break;
    case 'activar':
    $rspta=$grupo->activarGrupo($id_grupo);
    echo $rspta ? "Grupo Activado Exitosamente" : "Grupo No se pudo Activar";
    break;
    case 'mostrar':
$rspta=$grupo->mostrarGrupo($id_grupo);
//codifica resultado utilizando json
echo json_encode($rspta);
    break;
    case 'listar':
$rspta=$grupo->listarGrupo();
//array para los datos
$data = Array();
while ($reg=$rspta->fetch_object()) {
    $data[]=array(
        "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->id_grupo.')"><i class="fa fa-pencil"></i></button>'.
        '<button class="btn btn-danger" onclick="desactivar('.$reg->id_grupo.')"><i class="fa fa-close"></i></button>':
        '<button class="btn btn-warning" onclick="mostrar('.$reg->id_grupo.')"><i class="fa fa-pencil"></i></button>'.
        '<button class="btn btn-primary" onclick="activar('.$reg->id_grupo.')"><i class="fa fa-check"></i></button>',
        "1"=>$reg->nombre,
        "2"=>$reg->descripcion,
        "3"=>$reg->max_turno,
        "4"=>$reg->inicio_toma,
        "5"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
        '<span class="label bg-red">Desactivado</span>'
        );
}
$results = array(
    "sEcho"=>1, //Información para el datatables
    "iTotalRecords"=>count($data), //enviamos el total registros al datatable
    "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
    "aaData"=>$data);
echo json_encode($results);
    break;
}

?>