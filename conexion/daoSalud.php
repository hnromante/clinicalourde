<?php 

//require ('../model/salud.php');
//VARIABLES DE LA CALSE salid
//Este DAO incluye EL metodo para listar
class DaoSalud extends AccesoDatos{

    public function obtenerSalud(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM salud";
        $st = $this->con->query($sql);
    
        while($rs = $st->fetch_array(MYSQL_BOTH)){
            $id_sal = $rs['id_sal'];
            $tipo_sal = $rs['tipo_sal'];
            $nom_sal = $rs['nom_sal'];
            $s = new Salud($id_sal,$tipo_sal,$nom_sal);
            $lista[] = $s;
        }
        $this->desconexion();
        return $lista;
    }

}


?>