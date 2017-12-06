<?php 

//require('conexion.php');

    class DaoEspecialidad extends AccesoDatos{

        public function obtenerEspecialidades(){

            $lista = array();
            $this->conexion();
            $sql = "SELECT * FROM especialidades";
            $st = $this->con->query($sql);

            while($rs = $st->fetch_array(MYSQL_BOTH)){
                $id_esp  = (int)$rs['id_esp'];
                $nom_esp = $rs['nom_esp'];
                $desc_esp= $rs['desc_esp'];
                $pre_esp = (int)$rs['pre_esp'];

                $e = new Especialidad($id_esp,$nom_esp,$desc_esp,$pre_esp);
                $lista[]= $e;
            }

            $this->desconexion();
            return $lista;
    }
        public function buscarEspecialidades($busqueda){
            $this->conexion();
            $lista = array();
            $sql = "SELECT id_esp, nom_esp, desc_esp, pre_esp
            FROM especialidades
            WHERE
            (
                nom_esp LIKE '%$busqueda%'
                OR desc_esp LIKE '%$busqueda%'
            )";
            $st = $this->con->query($sql);

            while ($rs = $st->fetch_array(MYSQL_BOTH)){
                $id_esp  = (int)$rs['id_esp'];
                $nom_esp = $rs['nom_esp'];
                $desc_esp= $rs['desc_esp'];
                $pre_esp = (int)$rs['pre_esp'];

                $e = new Especialidad($id_esp,$nom_esp,$desc_esp,$pre_esp);
                $lista[]= $e;
            }
            $this->desconexion();
            return $lista;
        }



    }



?>