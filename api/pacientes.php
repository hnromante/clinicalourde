<?php

require ("../model/paciente.php");
require ('../conexion/conexion.php');
require ("../conexion/daoPaciente.php");

$daoPac = new DaoPaciente();



//LISTAR TODOS LOS USUARIOS
if(isset($_REQUEST['listarpac'])){
  $id = $_REQUEST['idusr'];
  echo json_encode($daoPac->obtenerPacientesJson($id));
}

//AGREGAR USUARIO
if(isset($_REQUEST['agregar'])){
    if (isset($_REQUEST['rut']) and isset($_REQUEST['nom']) and isset($_REQUEST['ape']) and isset($_REQUEST['tel']) and isset($_REQUEST['dir'])  and isset($_REQUEST['usu']) and isset($_REQUEST['sal'])){

    $rut = str_replace('%20', ' ', $_REQUEST['rut']);
    $nom = str_replace('%20', ' ', $_REQUEST['nom']);
    $ape = str_replace('%20', ' ', $_REQUEST['ape']);;
    $tel = str_replace('%20', ' ', $_REQUEST['tel']);
    $dir = str_replace('%20', ' ', $_REQUEST['dir']);
    $usu = str_replace('%20', ' ', $_REQUEST['usu']);;
    $sal = str_replace('%20', ' ', $_REQUEST['sal']);;
    // $u = new Usuario('',$nom,$mail,$pass,1,0,'');
    $p = new Paciente ($rut,$nom,$ape,$tel,$dir,$usu,$sal);
    $daoPac->agregarPaciente($p);

  }else{
    echo "<h4>REVISE EL URL</h4> ";
    echo "<h4>Ingrese un nom= , mail= y  pass=</h4>";
  }
}

if(isset($_REQUEST['consultarpac'])){
  $rut = $_REQUEST['rutpac'];
  echo json_encode($daoPac->consultarpac($rut));
}


?>

</body>
</html>
