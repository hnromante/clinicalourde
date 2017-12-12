<?php 
//require ('conexion.php');
//Importar metodo conexion() y desconexion()
//require ('../model/metodoPago.php');
//Este DAO solo incluye el metodo para listar
class DaoMetodoPago extends AccesoDatos{ 

    public function obtenerMetodoPago(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM metodopago";
        $st = $this->con->query($sql);
    
        while($rs = $st->fetch_array(MYSQL_BOTH)){
            $id_met = $rs['id_met'];
            $tipo_met = $rs['tipo_met'];
            $nom_met = $rs['nom_met'];
            $m = new MetodoPago($id_met,$tipo_met,$nom_met);
            $lista[] = $m;
        }
        $this->desconexion();
        return $lista;
    }

}


?>