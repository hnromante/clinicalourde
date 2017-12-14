<?php

// define('MYSQL_BOTH',MYSQLI_BOTH);
// define('MYSQL_NUM',MYSQLI_NUM);
// define('MYSQL_ASSOC',MYSQLI_ASSOC);
class AccesoDatos{

    protected $con;
              #mi
              #bd

    protected function conexion(){
        //Inicializamos la variable conexion utilizando la clas mysqli propia de PHP
        $this->con = new MySQLi("localhost","root","","id3524871_bd_clinicalourde") or die("Sin Conexion");
        // $this->con = new MySQLi("localhost","id3524871_arcegod","miguelitopopwine","id3524871_clinicalourde") or die("Sin Conexion");

        if($this->con->connect_errno){
            die('Error en la conexion! '.$this->con->connect_error);
        }
    }

    protected function desconexion(){
        $this->con->close();
    }


}

?>
