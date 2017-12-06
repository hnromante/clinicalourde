<?php 
//require ('conexion.php');
//DAO ESPECIALISTA
//Esta clase solo cuenta con el metodo para llenar el comboBox

class DaoEspecialista extends AccesoDatos{
    //Metodo para obtener todos los especialistas
    public function obtenerEspecialistas(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM especialistas";
        $st = $this->con->query($sql);

        while ($rs = $st->fetch_array(MYSQL_BOTH)){
            $rut_esp = $rs['rut_esp'];
            $nom_esp = $rs['nom_esp'];
            $ape_esp = $rs['ape_esp'];
            $nac_esp = $rs['nac_esp'];
            $tit_esp = $rs['tit_esp'];
            $esp = new Especialista($rut_esp,$nom_esp,$ape_esp,$nac_esp,$tit_esp);
            $lista[] = $esp;
        }
        $this->desconexion();
        return $lista;

    }

    public function buscarEspecialista($busqueda){
        $this->conexion();
        $lista = array();
        $sql = "SELECT rut_esp, nom_esp, ape_esp, nac_esp, tit_esp
        FROM especialistas
        WHERE
        (
            rut_esp LIKE '%$busqueda%'
            OR nom_esp LIKE '%$busqueda%'
            OR ape_esp LIKE '%$busqueda%'
            OR tit_esp LIKE '%$busqueda%'
        )";

        $st = $this->con->query($sql);

        while ($rs = $st->fetch_array(MYSQL_BOTH)){
            $rut_esp = $rs['rut_esp'];
            $nom_esp = $rs['nom_esp'];
            $ape_esp = $rs['ape_esp'];
            $nac_esp = $rs['nac_esp'];
            $tit_esp = $rs['tit_esp'];

            $esp = new Especialista($rut_esp,$nom_esp,$ape_esp,$nac_esp,$tit_esp);
            $lista[] = $esp;
        }
        $this->desconexion();
        
        return $lista;
    }
}

?>
