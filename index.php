<?php
include 'extend/headerInicio.php';
require ("model/usuario.php");
require ('conexion/conexion.php');
require ("conexion/daoUsuario.php");

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
  $nom = $_REQUEST['regnom'];
  echo json_encode($daoUsu->consultarUsuarioJson($nom));
}


if (isset($_REQUEST['btn_log'])){

  $nom = $_REQUEST['lognom'];
  $pass = $_REQUEST['logpass'];

  $u = $daoUsu->comprobarLogin($nom,$pass);

  if ($u){
    echo 'El usuario y la contrasenia coinciden';
    header('location:menu/');
    exit;
  }else{
    echo 'Revise el usuario o contrasenia';
  }
}

if(isset($_REQUEST['listarusu'])){
  echo json_encode($daoUsu->obtenerUsuariosJson());
}

?>



<div class="parallax-container hide-on-small-only">
<div id="parallax"><img src="img/bg.jpg"></div>
</div>
<div class="section blue ">
<div class="row container">
  <h1 class="header white-text">Clinica Lourde</h1>
  <p class="flow-text white-text text-darken-3 lighten-3">Pequeño demo de página web con PHP y MySQL. Version web y posterior versión movil.</p>
</div>
</div>
<div class="container">
  <div class="row">
    <div class="col s12 m6 l6">
     <div class="card horizontal z-depth-2">
       <div class="card-stacked">
         <div class="card-content grey-text text-darken-3">
         <span class="card-title center-align"><b>Crear Cuenta</b></span>
           <p>Si no tiene cuenta, creela aquí.</p>
           <form method="GET">
           <div class="col s12 m6 l6">
               <input type="text" id="regnom"  name="regnom" class="validate">
               <label for="regnom">Nombre de Usuario</label>
            </div>
            <div class="col s12 m6 l6">
               <input type="password" id="regpass" name="regpass" class="validate">
               <label for="regpass">Contraseña</label>
            </div>
           <div class="col s12 m6 l12">
               <input type="email" id="regmail"  name="regmail" class="validate">
               <label for="regmail" data-error="wrong" data-success="right">Email</label>
            </div>

         </div>
           <button name="btn_reg" id="btn_reg" type="submit" class="btn blue">Registrar</button>
          </form>
       </div>
     </div>
    </div>
    <div class="col s12 m6 l6">
     <div class="card horizontal z-depth-2">
       <div class="card-stacked">
         <div class="card-content grey-text text-darken-3">
         <span class="card-title center-align"><b>Iniciar Sesion</b></span>
           <p>Ingrese con su email y contraseña</p>
           <form method="GET">
           <div class="col s12 m12 l12">
               <input type="text" id="lognom"  name="lognom" class="validate">
               <label for="lognom">Nombre de usuario</label>
             </div>
             <div class="col s12 m12 l12">
               <input type="password" id="logpass" name="logpass" class="validate">
               <label for="logpass">Contraseña</label>
             </div>
         </div>
           <button name="btn_log" id="btn_log" type="submit" class="btn white grey-text text-darken-3 z-depth-2">Iniciar</button>
          </form>
       </div>
     </div>
    </div>
    </div>
</div>

<?php include 'extend/scripts.php';?>
</body>
</html>
