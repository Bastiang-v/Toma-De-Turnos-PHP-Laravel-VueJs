<?php
require '../config/Conexion.php';
class Grupo
{
    //Constructor
    public function __construct()
    {
        
    }

    //metodo ingresar Nueva grupo
    public function insertarGrupo($nombre,$descripcion,$max_turno,$inicio_toma)
    {
        $sql = "insert into grupo (nombre,descripcion,max_turno,inicio_toma)
        values ('$nombre','$descripcion','$max_turno','$inicio_toma')";
        return ejecutarConsulta($sql);
    }
    //metodo Editar Grupo
    public function editarGrupo($id_grupo,$nombre,$descripcion,$max_turno,$inicio_toma)
    {
        $sql = "update grupo set nombre='$nombre',descripcion='$descripcion',max_turno='$max_turno',inicio_toma='$inicio_toma'
        where id_grupo='$id_grupo'";
        return ejecutarConsulta($sql);
    }
    //metodo desactivar grupo
    public function desactivarGrupo($id_grupo)
    {
        $sql ="update grupo set estado='0' where id_grupo='$id_grupo'";
        return ejecutarConsulta($sql);
    }
    public function activarGrupo($id_grupo)
    {
        $sql ="update grupo set estado='1' where id_grupo='$id_grupo'";
        return ejecutarConsulta($sql);
    }
    //metodo mostrar datos de registro a modificar
    public function mostrarGrupo($id_grupo)
    {
        $sql ="select * from grupo where id_grupo='$id_grupo'";
        return ejecutarConsultaSimpleFila($sql);
    }
    public function listarGrupo()
    {
        $sql = 'select * from grupo';
        return ejecutarConsulta($sql);
    }
    public function selectGrupo()
    {
        $sql = 'select * from grupo where estado=1';
        return ejecutarConsulta($sql);
    }
    public function selectRol()
    {
        $sql = 'select * from rol where estado=1';
        return ejecutarConsulta($sql);
    }
}
?>