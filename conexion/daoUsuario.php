<?php
#require ('conexion.php');
//require ('../model/usuario.php');
//Clase Dao Usuario
//Este DAO incluye los metodos para listar, updatear, consultar, agregar, eliminar (cambiar estado),
class DaoUsuario extends AccesoDatos{


    public function obtenerUsuarios(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM usuarios";
        $st = $this->con->query($sql);

        while($rs = $st->fetch_array(MYSQL_BOTH)){
            $id_usr = $rs['id_usr'];
            $nom_usr = $rs['nom_usr'];
            $mail_usr = $rs['mail_usr'];
            $pass_usr = $rs['pass_usr'];
            $admin = $rs['Admin'];
            $bloqueo = $rs['bloqueo'];
            $creacion = $rs['creacion'];
            $u = new Usuario($id_usr,$nom_usr,$mail_usr,$pass_usr,$admin,$bloqueo,$creacion);
            $lista[] = $u;
        }
        $this->desconexion();
        return $lista;
    }

    public function obtenerUsuariosJson(){
        $lista = array();
        $this->conexion();
        $sql = "SELECT * FROM usuarios";
        $st = $this->con->query($sql);
        while($row = mysqli_fetch_object($st)){
            $lista[] = $row;
        }

        $this->desconexion();
        return $lista;
    }



    //consultamos si existe el usuario POR SU NOMBRE DE USUARIO
    //devuelve un objeto USUARIO si existe o 0 si no.
    public function consultarUsuario($nom_usu){
        $this->conexion();
        $sql = "SELECT * FROM usuarios WHERE nom_usr='$nom_usu'";
        $st = $this->con->query($sql);

        if ($rs = $st->fetch_array(MYSQL_BOTH)){

            $id_usr = $rs['id_usr'];
            $nom_usr = $rs['nom_usr'];
            $mail_usr = $rs['mail_usr'];
            $pass_usr = $rs['pass_usr'];
            $admin = $rs['Admin'];
            $bloqueo = $rs['bloqueo'];
            $creacion = $rs['creacion'];
            $u = new Usuario($id_usr,$nom_usr,$mail_usr,$pass_usr,$admin,$bloqueo,$creacion);
            $this->desconexion();
            return $u;
        }
        $this->desconexion();
        return 0;
    }

    public function consultarUsuarioJson($nom_usu){
      $this->conexion();
      $sql = "SELECT * FROM usuarios WHERE nom_usr='$nom_usu'";
      $res = $this->con->query($sql);
      $val = mysqli_fetch_assoc($res);
      $this->desconexion();

      return $val;
    }

    public function comprobarLogin($nom_usu, $pass_usu){
        $this->conexion();
        $sql = "SELECT * FROM usuarios WHERE nom_usr='$nom_usu' AND pass_usr='$pass_usu' ";
        $st = $this->con->query($sql);

        if ($rs = $st->fetch_array(MYSQL_BOTH)){

            $id_usr = $rs['id_usr'];
            $nom_usr = $rs['nom_usr'];
            $mail_usr = $rs['mail_usr'];
            $pass_usr = $rs['pass_usr'];
            $admin = $rs['Admin'];
            $bloqueo = $rs['bloqueo'];
            $creacion = $rs['creacion'];
            $u = new Usuario($id_usr,$nom_usr,$mail_usr,$pass_usr,$admin,$bloqueo,$creacion);
            $this->desconexion();
            return $u;
        }
        $this->desconexion();
        return 0;
    }

    public function comprobarLoginJson($nom_usu, $pass_usu){
        $this->conexion();
        $sql = "SELECT * FROM usuarios WHERE nom_usr='$nom_usu' AND pass_usr='$pass_usu'";
        $st = $this->con->query($sql);


        $val = mysqli_fetch_assoc($st);

        $this->desconexion();
        return $val;
    }
    //Metodo para agregar un usuario
    public function agregarUsuario($u){
        $this->conexion();

        //$id_usr = $u->getId_usu();
        $nom_usr = $u->getNom_usr();
        $mail_usr = $u->getMail_usr();
        $pass_usr = $u->getPass_usr();
        $admin = $u->getAdmin();
        $bloqueo = $u->getBloqueo();


        $sql = "INSERT INTO usuarios VALUES (DEFAULT,'$nom_usr','$mail_usr','$pass_usr','$admin','$bloqueo', now());";
        echo $nom_usr;
        echo $mail_usr;
        echo $pass_usr;
        echo $admin;
        echo $bloqueo;
        echo "<br>";
        echo $sql;
        $st = $this->con->query($sql);

        if ($this->con->affected_rows > 0){
            echo 'Se agrego el usuario correctamente. status=true';

        }else{
            echo 'No se pudo agregar el usuario. status=false';
        }
        $this->desconexion();
    }

    public function modificarUsuario($u){
        $this->conexion();
        $id_usr = $u->getId_usr();
        $nom_usr = $u->getNom_usr();
        $mail_usr = $u->getMail_usr();
        $pass_usr = $u->getPass_usr();
        $admin = $u->getAdmin();
        $bloqueo = $u->getBloqueo();

        $sql = "UPDATE usuarios SET nom_usr='$nom_usr', mail_usr='$mail_usr', pass_usr='$pass_usr', Admin='$admin', bloqueo='$bloqueo' WHERE id_usr=$id_usr;";

        echo $sql;
        echo "<br>";
        $st = $this->con->query($sql);

        if ($this->con->affected_rows > 0){
            echo 'Se actualizo la informacion del usuario';
        }else{
            echo '...ERROR!, no se pudo actualizar la informacion del usuario';
        }
        $this->desconexion();
    }

    //Metodo para eliminar el usuario(Cambiar el estado)
    public function cambiarEstado($nom_usu){
        $this->conexion();
        //Antes de cambiar el estado, debemos recuperar el usuario actual y preguntar
        //si es 1 o 0.
        $bloqueo = 0;
        $sql = '';

        $usu = $this->consultarUsuario($nom_usu);
        if ($usu){
            //Capturamos el dato de bloqueo
            $bloqueo = $usu->getBloqueo();

        }else{
            echo 'No se pudo modificar el estado, el usuario con ese nombre no existe';
            return 0;
        }
        if ($bloqueo == 0){
            $sql = "UPDATE usuarios SET bloqueo='1' WHERE nom_usr='$nom_usu'";
        }else{
            $sql = "UPDATE usuarios SET bloqueo='0' WHERE nom_usr='$nom_usu'";
        }

        $st = $this->con->query($sql);

        if ($this->con->affected_rows > 0){
            echo 'Se cambio el el estado de bloqueo correctamente';
        }else{
            echo 'Error al cambiar el estado del usuario';
        }

        $this->desconexion();
    }

    public function eliminarUsuario($id_usu){
        $this->conexion();
        $sql = "DELETE FROM usuarios WHERE id_usr=$id_usu";

        $st = $this->con->query($sql);

        if($this->con->affected_rows > 0){
            echo 'Se elimino correctamente el usuario';
        }else{
            echo 'No se pudo eliminar el usuario';
        }
        $this->desconexion();
    }

}


?>
