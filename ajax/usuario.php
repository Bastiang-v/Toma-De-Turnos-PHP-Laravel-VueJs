<?php
require_once "../modelos/Usuario.php";

$usuario = new Usuario();
$rut=isset($_POST["rut"])? limpiarCadena($_POST["rut"]):"";
$dv=isset($_POST['dv'])? limpiarCadena($_POST['dv']):"";
$pass=isset($_POST['pass'])? limpiarCadena($_POST['pass']):"";
$nombre=isset($_POST['nombre'])? limpiarCadena($_POST['nombre']):"";
$id_grupo=isset($_POST['id_grupo'])? limpiarCadena($_POST['id_grupo']):"";
$id_rol=isset($_POST['id_rol'])? limpiarCadena($_POST['id_rol']):"";
$email=isset($_POST['email'])? limpiarCadena($_POST['email']):"";
$telefono=isset($_POST['telefono'])? limpiarCadena($_POST['telefono']):"";
switch ($_GET["op"]) {
    case 'guardaryeditar':
    if ($dv==99){
        $rspta=$usuario->editarUsuario($rut,$nombre,$id_grupo,$id_rol,$email,$telefono);
        echo $rspta ? "Usuario Editado Exitosamente" : "Usuario no se pudo editar";
    }
    else {
        $rspta=$usuario->insertarUsuario($rut,$dv,$pass,$nombre,$id_grupo,$id_rol,$email,$telefono);
        echo $rspta ? "Usuario Registrado Exitosamente" : "Usuario no se pudo registrar";
    }
break;
    case 'desactivar':
$rspta=$usuario->desactivarUsuario($rut);
echo $rspta ? "Usuario Desactivado Exitosamente" : "Usuario No se pudo Desactivar";
    break;
    case 'activar':
    $rspta=$usuario->activarUsuario($rut);
    echo $rspta ? "Usuario Activado Exitosamente" : "Usuario No se pudo Activar";
    break;
    case 'mostrar':
$rspta=$usuario->mostrarUsuario($rut);
//codifica resultado utilizando json
echo json_encode($rspta);
    break;
    case 'listar':
$rspta=$usuario->listarUsuario();
//array para los datos
$data = Array();
while ($reg=$rspta->fetch_object()) {
    $data[]=array(
        "0"=>($reg->estado)?'<button class="btn btn-warning" onclick="mostrar('.$reg->rut.')"><i class="fa fa-pencil"></i></button>'.
        ' <button class="btn btn-danger" onclick="desactivar('.$reg->rut.')"><i class="fa fa-close"></i></button>':
        '<button class="btn btn-warning" onclick="mostrar('.$reg->rut.')"><i class="fa fa-pencil"></i></button>'.
        ' <button class="btn btn-primary" onclick="activar('.$reg->rut.')"><i class="fa fa-check"></i></button>',
        "1"=>($reg->rut.'-'.$reg->dv),
        "2"=>$reg->nombre,
        "3"=>$reg->email,
        "4"=>$reg->telefono,
        "5"=>$reg->grupo,
        "6"=>$reg->rol,
        "7"=>($reg->estado)?'<span class="label bg-green">Activado</span>':
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
    case 'selectGrupo' :
    require_once '../modelos/Grupo.php';
    $grupo = new Grupo();
    $rspta = $grupo->selectGrupo();
    while ($reg = $rspta->fetch_object()) {
        echo '<option class="text-center" value=' . $reg->id_grupo . '>' . $reg->nombre . '</option>';       
    }
    break;
    case 'selectRol' :
    require_once '../modelos/Grupo.php';
    $grupo = new Grupo();
    $rspta = $grupo->selectRol();
    while ($reg = $rspta->fetch_object()) {
        echo '<option class="text-center" value=' . $reg->id_rol . '>' . $reg->nombre . '</option>';       
    }
    break;
}

?>