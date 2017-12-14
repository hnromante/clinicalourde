<?php
echo "<h1>JSON CLINICA LOURDE - USURIOS</h1>";
require ("../model/usuario.php");
require ('../conexion/conexion.php');
require ("../conexion/daoUsuario.php");

$daoUsu = new DaoUsuario();
if (isset($_REQUEST['btn_reg'])){
  $nom = $_REQUEST['regnom'];
  $pass = $_REQUEST['regpass'];
  $email = $_REQUEST['regmail'];

  #CONSTRUCT: Usuario($id_usr,$nom_usr,$mail_usr,$pass_usr,$admin,$bloqueo,$creacion)
  $u = new Usuario('',$nom,$email,$pass,1,0,'');

  $daoUsu->agregarUsuario($u);
}
//Metodo comprobarUsuarioJson
if (isset($_REQUEST['comprobarusu'])){
  $nom = $_REQUEST['nom'];
  if(!is_null($daoUsu->consultarUsuarioJson($nom))){
    echo "<h4>DATOS DEL USUARIO: ".$nom."</h4>";
    echo json_encode($daoUsu->consultarUsuarioJson($nom));
  }else{
    echo "<h4>NO SE ENCONTARON DATOS DE: ".$nom."</h4>";
    echo json_encode($daoUsu->consultarUsuarioJson($nom));
  }

}
//LISTAR TODOS LOS USUARIOS
if(isset($_REQUEST['listarusu'])){

  echo "<h4>LISTADO DE USUARIOS EN JSON</h4>";
  echo json_encode($daoUsu->obtenerUsuariosJson());
}
//COMPROBAR EL LOGIN, DEVUELVE UN OBJETO JSON SI ENCUENTRA Y NULL SI NO
if(isset($_REQUEST['comprobarlogin'])){
  if (isset($_REQUEST['nom']) and isset($_REQUEST['contra'])){

    $nom = $_REQUEST['nom'];
    $pass = $_REQUEST['contra'];
    $res = $daoUsu->comprobarloginJson($nom,$pass);
    echo "<br>";
    echo $nom;
    echo "<br>";
    echo $pass;

    if ($res){
        echo "<h4>USUARIO ENCONTRADO</h4>";
        echo json_encode($res);
    }else{
        echo "<h4>NO SE ENCONTRO UN USUARIO CON ESE NOMBRE Y CONTRASEÑA</h4>";
        echo json_encode($res);
    }
  }else{
    echo "<h4>REVISE EL URL</h4>";
    echo "<h4>Ingrese un nom= y contra=</h4>";
  }
}
//AGREGAR USUARIO
if(isset($_REQUEST['agregar'])){
    if (isset($_REQUEST['nom']) and isset($_REQUEST['mail']) and isset($_REQUEST['pass'])){

    $nom = str_replace('%20', ' ', $_REQUEST['nom']);
    $mail = str_replace('%20', ' ', $_REQUEST['mail']);
    $pass = str_replace('%20', ' ', $_REQUEST['pass']);;
    $u = new Usuario('',$nom,$mail,$pass,1,0,'');
    $daoUsu->agregarUsuario($u);

  }else{
    echo "<h4>REVISE EL URL</h4>";
    echo "<h4>Ingrese un nom= , mail= y  pass=</h4>";
  }
}
//MODIFICAR USUARIO
if(isset($_REQUEST['modificar'])){
    if (isset($_REQUEST['id']) and isset($_REQUEST['nom']) and isset($_REQUEST['mail']) and isset($_REQUEST['pass']) and isset($_REQUEST['admin']) and isset($_REQUEST['bloqueo'])){

    $id = str_replace('%20', ' ', $_REQUEST['id']);
    $nom = str_replace('%20', ' ', $_REQUEST['nom']);
    $mail = str_replace('%20', ' ', $_REQUEST['mail']);
    $pass = str_replace('%20', ' ', $_REQUEST['pass']);
    $admin = str_replace('%20', ' ', $_REQUEST['admin']);
    $bloqueo = str_replace('%20', ' ', $_REQUEST['bloqueo']);
    $u = new Usuario($id,$nom,$mail,$pass,$admin,$bloqueo,'');
    $daoUsu->modificarUsuario($u);

  }else{
    echo "<h4>REVISE EL URL</h4>";
    echo "<h4>Ingrese un nom= , mail=, pass=,admin=, bloqueo=</h4>";
  }
}
//ELIMINAR USUARIO
if(isset($_REQUEST['eliminar'])){
    if (isset($_REQUEST['id'])){

    $id = $_REQUEST['id'];

    $daoUsu->eliminarUsuario($id);

  }else{
    echo "<h4>REVISE EL URL PARA ELIMINAR</h4>";
    echo "<h4>Ingrese un id=</h4>";
  }
}
?>

</body>
</html>
