<?php 
include '../extend/header.php';

require ('../model/paciente.php'); #IMPORT DE JAVA
require ('../model/salud.php');

require_once ('../conexion/conexion.php'); #IMPORTA ACCESO

require_once ('../conexion/daoPaciente.php');
require_once ('../conexion/daoSalud.php');

#Dao d = new DAO();
$daoPac = new DaoPaciente();

//Preguntamos si se presiono el boton para agregar paciente
if (isset($_REQUEST['btn_pac'])){ #!EMPTY
	$rut = $_REQUEST['tf_rut'];
	$nom = $_REQUEST['tf_nom'];
	$ape = $_REQUEST['tf_ape'];
	$tel = $_REQUEST['tf_tel'];
	$dir = $_REQUEST['tf_dir'];
	$sal = $_REQUEST['tf_sal'];

	$p = new Paciente($rut,$nom,$ape,$tel,$dir,1,$sal); #Reemplazar 1 con el usuario generado dinamicamente.

	$daoPac->agregarPaciente($p);
}

$rut_pac='';
$nom_pac='';
$ape_pac='';
$tel_pac='';
$dir_pac='';
$usu_pac='';
$sal_pac='';
$btnagre='disabled';
$btneli='disabled';
$btnmod='disabled';

if (isset($_REQUEST['btn_consultar'])){
  $rut = $_REQUEST['tf_rut'];
  $p= $daoPac->consularPaciente($rut);
  if ($p){ // EXISTE
    $rut_pac = $p->getRut_pac();
    $nom_pac = $p->getNom_pac();
    $ape_pac = $p->getApe_pac();
    $tel_pac = $p->getTel_pac();
    $dir_pac = $p->getDir_pac();
    $usu_pac = $p->getUsu_pac();
    $sal_pac = $p->getSal_pac();
    //Si se encuentra el paciente, deshabilitamos 
    $btnagre ='disabled';
    $btnmod = '';
    $btneli='';
      echo 'Paciente encontrado, puede eliminar o modificarlo';
  }else{ //retorno 0
    $btnagre='';
    $btneli='disabled';
    $btnmod = 'disabled';
    echo 'No se encontro el Paciente, puede agregar!';
    $rut_pac = $rut;
    }
}
// Preguntamos si se envio un parametro para eliminar un paciente
if (isset($_REQUEST['codeli'])){
    $cod = $_REQUEST['codeli'];
    $daoPac->eliminarPaciente($cod);
}

if (isset($_REQUEST['btn_eliminar'])){
  $rut = $_REQUEST['tf_rut'];
  $daoPac->eliminarPaciente($rut);
  $cod ='';
}
if (isset($_REQUEST['btn_modificar'])){
  $rut = $_REQUEST['tf_rut'];
  $nom = $_REQUEST['tf_nom'];
  $ape = $_REQUEST['tf_ape'];
  $tel = $_REQUEST['tf_tel'];
  $dir = $_REQUEST['tf_dir'];
  $sal = $_REQUEST['tf_sal'];
  $p = new Paciente($rut,$nom,$ape,$tel,$dir,1,$sal);
  $daoPac->modificarPaciente($p);
  $cod ='';
}

?>

  <div style="margin-top:5%" class="row">
    <div class="col s12 m6 l6">
      <img src="../img/logo1.png" width="90%" alt="" />
    </div>
    <div class="col s12 m6 l6">
      <p class="flow-text grey-text text-darken-2">Bienvenido a clinica Lourde, JPerez!. Acá podrás agregar a tu familia para que puedan ser atendidos por nuestros especialistas. Revisa nuestras especialidades en el menu de la izquierda</p>
 
    </div>
  </div>
  <div style="margin-top:3%" class="row">
  <div class="col s12 m12 l12">
  <div class="card horizontal">
      <div class="card-content grey-text text-darken-2">
          <span class="card-title">Agregar un paciente</span>
          <form class="form" action="index.php" method="POST" >
                
                <div class="input-field col s6 m6 l2">
                  <input type="text" id="tf_rut"  name="tf_rut" required value="<?php echo $rut_pac; ?>" >
                  <label for="tf_rut">Rut</label>
                </div>
                <div class="input-field col s6 m6 l2">
                <button name="btn_consultar" id="btn_consultar" type="submit" class="btn black">Consultar</button>
                </div>
                <div class="input-field col s12 m4 l4">
                  <input type="text" id="tf_nom"  name="tf_nom" value="<?php echo $nom_pac; ?>" >
                  <label for="tf_nom">Nombre</label>
                </div>
                <div class="input-field col s12 m4 l4">
                  <input type="text" id="tf_ape"  name="tf_ape" value="<?php echo $ape_pac; ?>" >
                  <label for="tf_ape">Apellido</label>
                </div>
                <div class="input-field col s12 m4 l4">
                  <input type="text" id="tf_tel"  name="tf_tel" value="<?php echo $tel_pac; ?>" >
                  <label for="tf_tel">Telefono</label>
                </div>
                <div class="input-field col s12 m4 l4">
                  <input type="text" id="tf_dir"  name="tf_dir" value="<?php echo $dir_pac; ?>" >
                  <label for="tf_dir">Direccion</label>
                </div>
                <div class="input-field col s12 m4 l4">
                    <select name="tf_sal">
                      <option value="" disabled selected>Elija un tipo de salud</option>
                      <?php
                      $daoSal = new DaoSalud();
                      $lista = $daoSal->obtenerSalud();

                      foreach ($lista as $salud) {
                        echo '<option value="'.$salud->getId_Sal().'">'.$salud->getNom_sal().'</option>';
                      }

                      ?>
                    </select>
                    <label>Salud</label>
                 </div>
                <div class="input-field col s6 m4 l4">
                <button id="btn_pac" name="btn_pac" type="submit" class="btn green" <?php echo $btnagre; ?>>Guardar <i class="material-icons">send</i></button>
                </div>
                <div class="input-field col s6 m4 l4">
                <button name="btn_modificar" id="btn_modificar" type="submit" class="btn blue" <?php echo $btnmod; ?> >Modificar <i class="material-icons">edit</i></button>
                </div>
                <div class="input-field col s6 m4 l4">
                <button name="btn_eliminar" id="btn_eliminar" type="submit" class="btn red" <?php echo $btneli; ?> >Eliminar <i class="material-icons">delete</i></button>
                </div>

              </form> 
      </div>
  </div>
  </div>
</div>
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Listado de pacientes asociados a JPerez</span>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th data-field="rut">Rut</th>
                        <th data-field="nom">Nombre</th>
                        <th data-field="ape">Apellido</th>
                        <th data-field="tel">Telefono</th>
                        <th data-field="dir">Dirección</th>
                        <th data-field="sal">Salud</th>
                        <th data-field="usu">Agregado por</th>
                        <th data-field="eli">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    

			               $lista = $daoPac->obtenerPacientesUsu(1);
        			        foreach($lista as $p){
        			            echo '<tr>';
        			            echo '<td>'.$p->getRut_pac().'</td>';
        			            echo '<td>'.$p->getNom_pac().'</td>';
        			            echo '<td>'.$p->getApe_pac().'</td>';
        			            echo '<td>'.$p->getTel_pac().'</td>';
        			            echo '<td>'.$p->getDir_pac().'</td>';
        			            echo '<td>'.$p->getSal_pac().'</td>';
                          echo '<td>'.$p->getUsu_pac().'</td>';
        			            echo '<td><a href="index.php?codeli='.$p->getRut_pac().'"><i class="material-icons">delete</i></a></td>';
        			            echo '</tr>';
        			        }
			        
        			?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>
<?php include '../extend/scripts.php'?>
</body>
</html>

