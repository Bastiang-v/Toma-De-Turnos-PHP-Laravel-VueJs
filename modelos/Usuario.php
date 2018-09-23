<?php
require '../config/Conexion.php';
class Usuario
{
    //Constructor
    public function __construct()
    {
        
    }

    //metodo ingresar Nueva grupo
    public function insertarUsuario($rut,$dv,$pass,$nombre,$id_grupo,$id_rol,$email,$telefono)
    {
        $sql = "insert into usuarios (rut,dv,pass,nombre,id_grupo,id_rol,email,telefono,estado)
        values ('$rut','$dv','$pass','$nombre','$id_grupo','$id_rol','$email','$telefono','1')";
        return ejecutarConsulta($sql);
    }
    //metodo Editar Grupo
    public function editarUsuario($rut,$nombre,$id_grupo,$id_rol,$email,$telefono)
    {
        $sql = "update usuarios set nombre='$nombre',id_grupo='$id_grupo',id_rol='$id_rol',email='$email',telefono='$telefono'
        where rut='$rut'";
        return ejecutarConsulta($sql);
    }
    //metodo desactivar grupo
    public function desactivarUsuario($rut)
    {
        $sql ="update usuarios set estado='0' where rut='$rut'";
        return ejecutarConsulta($sql);
    }
    public function activarUsuario($rut)
    {
        $sql ="update usuarios set estado='1' where rut='$rut'";
        return ejecutarConsulta($sql);
    }
    //metodo mostrar datos de registro a modificar
    public function mostrarUsuario($rut)
    {
        $sql ="select * from usuarios where rut='$rut'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listarUsuario()
    {
        $sql = 'select usuarios.rut,usuarios.dv,usuarios.nombre,usuarios.email,usuarios.telefono,usuarios.estado,grupo.nombre as grupo,rol.nombre as rol from usuarios inner join grupo on usuarios.id_grupo=grupo.id_grupo inner join rol on usuarios.id_rol=rol.id_rol order by rol.nombre';
        return ejecutarConsulta($sql);
    }
}
?>