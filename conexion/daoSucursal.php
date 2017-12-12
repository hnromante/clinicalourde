<?php 
#require ('conexion.php');
//require ('../model/sucursal.php');
//VARIABLES DE LA CALSE sucursal
//Este DAO incluye los metodos para listar
class DaoSucursal extends AccesoDatos{

    
    public function obtenerSucursales(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM sucursal";
        $st = $this->con->query($sql);
    
        while($rs = $st->fetch_array(MYSQL_BOTH)){
            $id_suc = $rs['id_suc'];
            $nom_suc = $rs['nom_suc'];
            $ciu_suc = $rs['ciu_suc'];
            $s = new Sucursal($id_suc,$nom_suc,$ciu_suc);
            $lista[] = $s;
        }
        $this->desconexion();
        return $lista;
    }

}


?>