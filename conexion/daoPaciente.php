<?php

// require ('../model/paciente.php');

//Este DAO contiene los metodo para Crear, Leer, Actualizar y Eliminar. Ademas de consultar si existe.
// Las variables de rut, nom, ape, tel y dir son propias de la clase paciente,
// mientras que usu_pac es una FK que hace referencia a la clase Usuario, quien agrego al paciente, lo mismo con sal_pac.


class DaoPaciente extends AccesoDatos{ #Herencia EXTENDS con, conexion(), desconexion()

    //Metodo para listar TODOS los pacientes
    public function obtenerPacientes(){
        $this->conexion();
        $lista = array();
        $sql = "SELECT * FROM pacientes";

        $st = $this->con->query($sql);

        while ($rs = $st->fetch_array(MYSQL_BOTH)) {
            $rut_pac = $rs['rut_pac'];
            $nom_pac = $rs['nom_pac'];
            $ape_pac = $rs['ape_pac'];
            $tel_pac = $rs['tel_pac'];
            $dir_pac = $rs['dir_pac'];
            #FOREIGN KEY TABLA RELACIONAL usuarios, salud
            $usu_pac = $rs['usu_pac'];
            $sal_pac = $rs['sal_pac'];

            $p = new Paciente($rut_pac,$nom_pac,$ape_pac,$tel_pac,$dir_pac,$usu_pac,$sal_pac);

            $lista[] = $p;

        }
        $this->desconexion();
        return $lista;
    }

    //Metodo para capturar los pacientes EXCLUSIVOS de solo un usuario.
    public function obtenerPacientesUsu($id_usu){

        $this->conexion();
        $lista = array();
        $sql = "SELECT rut_pac, nom_pac, ape_pac, tel_pac, dir_pac,nom_usr,nom_sal FROM `pacientes`,`usuarios`,`salud` WHERE pacientes.sal_pac = salud.id_sal AND pacientes.usu_pac = usuarios.id_usr AND pacientes.usu_pac = '$id_usu'";
        $st = $this->con->query($sql);


        //Asignacion de variable 'dinamica'
        while ($rs = $st->fetch_array(MYSQL_BOTH)) {
            $rut_pac = $rs['rut_pac'];
            $nom_pac = $rs['nom_pac'];
            $ape_pac = $rs['ape_pac'];
            $tel_pac = $rs['tel_pac'];
            $dir_pac = $rs['dir_pac'];
            #FOREIGN KEY TABLA RELACIONAL usuarios, salud
            $usu_pac = $rs['nom_usr'];
            $sal_pac = $rs['nom_sal'];

            $p = new Paciente($rut_pac,$nom_pac,$ape_pac,$tel_pac,$dir_pac,$usu_pac,$sal_pac);

            $lista[] = $p;

        }
        $this->desconexion();
        return $lista;

    }

    //Antes de llamr a los metodos de agregar, modificar o eliminar, es necesario consular si el paciente existe.
    //Si encuentra un paciente, va a retornar el OBJETO paciente. Si no lo encuentra, retorna 0
    public function consularPaciente($rut_pac){
        $this->conexion();
        $sql = "SELECT * FROM pacientes WHERE rut_pac='$rut_pac'";
        $st = $this->con->query($sql);

        if($rs = $st->fetch_array(MYSQL_BOTH)){
            $rut_pac = $rs['rut_pac'];
            $nom_pac = $rs['nom_pac'];
            $ape_pac = $rs['ape_pac'];
            $tel_pac = $rs['tel_pac'];
            $dir_pac = $rs['dir_pac'];
            #FOREIGN KEY TABLA RELACIONAL usuarios, salud
            $usu_pac = $rs['usu_pac'];
            $sal_pac = $rs['sal_pac'];

            $p = new Paciente($rut_pac,$nom_pac,$ape_pac,$tel_pac,$dir_pac,$usu_pac,$sal_pac);
            $this->desconexion();
            return $p;
        }

        $this->desconexion();
        return 0;
    }


    //Metodo para agregar pacientes (X USUARIO)
    public function agregarPaciente(Paciente $p){
        $this->conexion();

        $rut_pac = $p->getRut_pac();
        $nom_pac = $p->getNom_pac();
        $ape_pac = $p->getApe_pac();
        $tel_pac = $p->getTel_pac();
        $dir_pac = $p->getDir_pac();

        #FOREIGN KEY TABLA RELACIONAL usuarios, salud
        $usu_pac = $p->getUsu_pac();
        $sal_pac = $p->getSal_pac();

        $sql = "INSERT INTO pacientes VALUES ('$rut_pac','$nom_pac','$ape_pac','$tel_pac','$dir_pac',$usu_pac,$sal_pac)";
        $st = $this->con->query($sql);

        if($this->con->affected_rows > 0){
            echo 'Se ha agregado el paciente correctamente. status=true';
        }else{
            echo 'No se ha podido agregar el paciente. status=false';
        }
        $this->desconexion();

    }

    //Metodo para eliminar el paciente (X USUARIO)
    public function eliminarPaciente($rut_pac){
        $this->conexion();

        $sql = "DELETE FROM pacientes WHERE rut_pac='$rut_pac'";
        $st = $this->con->query($sql);

        if($this->con->affected_rows > 0){
            echo 'Se elimino correctamente el paciente';
        }else{
            echo 'No se pudo eliminar el paciente';
        }

        $this->desconexion();
    }

    public function modificarPaciente($p){
        $this->conexion();
        $rut_pac = $p->getRut_pac();
        $nom_pac = $p->getNom_pac();
        $ape_pac = $p->getApe_pac();
        $tel_pac = $p->getTel_pac();
        $dir_pac = $p->getDir_pac();
        $usu_pac = $p->getUsu_pac();
        $sal_pac = $p->getSal_pac();

        $sql = "UPDATE pacientes SET nom_pac='$nom_pac', ape_pac='$ape_pac', tel_pac='$tel_pac', dir_pac='$dir_pac', sal_pac='$sal_pac' WHERE rut_pac='$rut_pac';";
        $st = $this->con->query($sql);

        if ($this->con->affected_rows > 0){
            echo 'Se actualizo la informacion del usuario';
        }else{
            echo '...ERROR!, no se pudo actualizar la informaciond del usuario';
        }
        $this->desconexion();
    }

    //METODOS JSON
    public function obtenerPacientesJson($id){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM pacientes, salud WHERE sal_pac=id_sal AND usu_pac=$id";
        $st = $this->con->query($sql);
        while($row = mysqli_fetch_object($st)){
            $lista[] = $row;
        }

        $this->desconexion();
        return $lista;
    }

    public function consultarpac($rut){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM pacientes, salud WHERE sal_pac=id_sal AND rut_pac=$rut";
        $st = $this->con->query($sql);
        while($row = mysqli_fetch_object($st)){
            $lista[] = $row;
        }

        $this->desconexion();
        if (empty($lista)) {
            echo "status=false ";
        } else {
          # code...
        }

        return $lista;
    }

}

?>
