<?php 
include '../extend/header.php';
require_once ('../conexion/conexion.php');

require_once ('../model/paciente.php');
require_once ('../conexion/daoPaciente.php');

require_once ('../model/especialidad.php');
require_once ('../conexion/daoEspecialidad.php');

require_once ('../model/especialista.php');
require_once ('../conexion/daoEspecialista.php');

require_once ('../model/metodoPago.php');
require_once ('../conexion/daoMetPago.php');

require_once ('../model/sucursal.php');
require_once ('../conexion/daoSucursal.php');


require_once ('../model/reserva.php');
require_once ('../conexion/daoReserva.php');
// CAPTURA DE DATOS FORMULARIO
$daoRes = new DaoReserva();
if (isset($_REQUEST['btn_res'])){

  $pac = $_REQUEST['cb_paciente'];
  $esp = $_REQUEST['cb_especialidad'];
  $espe = $_REQUEST['cb_especialista'];
  $met = $_REQUEST['cb_metodopago'];
  $suc = $_REQUEST['cb_sucursal'];
  $obs = $_REQUEST['tf_obs'];
  $fecha = $_REQUEST['fecha'];
  // echo $pac;
  // echo $esp;
  // echo $espe;
  // echo $met;
  // echo $suc;
  // echo $obs;
  // echo $fecha;
  #1 EN USR_PAC temporalmente ponemos 1 hasta poder capturar el usuario por SESION ACTIVA.
  $r = new Reserva('',1,$pac,$esp,$espe,$met,$suc,$obs,$fecha,$fecha,1);
  $daoRes->agregarReserva($r);
}



?>
<!-- Seccion de imagen y enunciado -->
<div class="container">
  <div style="margin-top:5%" class="row">
    <div class="col s12 m6 l6">
      <img class="circle" src="../img/res.jpg" width="50%" alt="" />
    </div>
    <div class="col s12 m6 l6">
      <p class="flow-text grey-text text-darken-2">Genera tu reserva de hora seleccionando el paciente, hora y sucursal.</p>
 
    </div>
  </div>
</div>
<!-- Seccion de Formulario-->

  <div style="margin-top:5%" class="row">
  <div class="col s12 m12 l12">
  <div class="card horizontal  ">
      <div class="card-content grey-text text-darken-2">
          <span class="card-title">Agregar una Reserva</span>

          <!-- INICIO FORMULARIO RESERVAS -->
          <form class="form" action="index.php" method="POST" name="formreservas">
              <!-- Select Pacientes -->
              <div class="input-field col s12 m6 l6">
                  <select name="cb_paciente" id="cb_paciente" required class="validate">
                    <option value="" disabled selected >Elija un paciente</option>
                    
                    <?php 
                      $daoPac = new DaoPaciente();

                      $lista = $daoPac->obtenerPacientesUsu(1); #Reemplazar el 1 por el  id del usuario dinamicamente
                      foreach ($lista as $pac) {
                        echo '<option value="'.$pac->getRut_pac().'">'.$pac->getNom_pac().' '.$pac->getApe_pac().'</option>';
                      }

                    ?>
                  </select>
                  <label>Paciente</label>
              </div>
              <!-- Select Especialidades -->
              <div class="input-field col s12 m6 l6">
                  <select name="cb_especialidad" id="cb_especialidad" required class="validate">
                    <option value="" disabled selected >Seleccionar especialidad</option>
                      <?php 
                        $daoEspecialidad = new DaoEspecialidad();
                        $lista = $daoEspecialidad->obtenerEspecialidades();

                        foreach ($lista as $esp) {
                          echo '<option value="'.$esp->getId_esp().'">'.$esp->getNom_esp().' - $'.$esp->getPre_esp().'</option>';
                        }
                      ?>
                  </select>
                  <label>Especialidad</label>
              </div>
              <!-- Select Especialista -->
              <div class="input-field col s12 m6 l6">
                  <select name="cb_especialista" id="cb_especialista" required class="validate">
                    <option value="" disabled selected >Seleccionar especialista</option>
                    
                    <?php 
                    $daoEspecialista = new DaoEspecialista();
                    $lista = $daoEspecialista->obtenerEspecialistas();

                    foreach ($lista as $espe) {
                      echo '<option value="'.$espe->getRut_esp().'">'.$espe->getNom_esp().' '.$espe->getApe_esp().' - '.$espe->getTit_esp().'</option>';
                    }

                    ?>
                  </select>
                  <label>Especilista</label>
              </div>
              <!-- Select Metodo de pago -->
              <div class="input-field col s12 m6 l6">
                  <select name="cb_metodopago" id="cb_metodopago" required class="validate">
                    <option value="" disabled selected >Seleccionar método de pago</option>
                    
                    <?php 
                    $daoMet = new DaoMetodoPago();

                    $lista = $daoMet->obtenerMetodoPago();

                    foreach ($lista as $met) {
                      echo '<option value="'.$met->getId_met().'">'.$met->getTipo_met().' - '.$met->getNom_met().'</option>';
                    }

                    ?>
                  </select>
                  <label>Metodo de pago</label>
              </div>
              <!-- Select sucursal -->
              <div class="input-field col s12 m6 l6">
                  <select name="cb_sucursal" id="cb_sucursal" required class="validate">
                    <option value="" disabled required selected >Seleccionar sucursal</option>
                    
                    <?php
                    $daoSuc = new DaoSucursal(); 
                    $lista = $daoSuc->obtenerSucursales();

                    foreach ($lista as $suc) {
                      echo '<option value="'.$suc->getId_Suc().'">'.$suc->getCiu_suc().' - '.$suc->getNom_suc().'</option>';
                    }

                    ?>
                  </select>
                  <label>Sucursal</label>
              </div>                            
              <!-- Observacion reserva -->
              <div class="input-field col s12 m6 l6">
                  <input type="text" id="tf_obs"  name="tf_obs" required >
                  <label for="tf_obs">Observacion</label>
              </div>
              <!-- Fecha de reserva -->
              <div class="col s12 m12 l12">
                <input type="text" id="fecha"  name="fecha" required class="datepicker" placeholder="Seleccione una fecha" >
              </div>
              <!-- Boton enviar formulario -->
              <div class="input-field col 12 m6 l6">
                <button id="btn_res" name="btn_res" type="submit" class="btn blue darken-1">Guardar <i class="material-icons ">send</i></button>
              </div>

              </form> 
              <!-- FIN FORMULARIO DE RESERVAS -->
      </div>
  </div>
  </div>
</div>

<?php include '../extend/scripts.php' ?>

<script type="text/javascript">
    var cb_paciente = $('#cb_paciente');
    var cb_especialista = $('#cb_especialista');
    var cb_especialidad = $('#cb_especialidad');
    var cb_sucursal = $('#cb_sucursal');
    var cb_metodopago = $('#cb_metodopago');
    var fecha = $('#fecha');
  $(document).ready(function(){
      $('#btn_pac').click(function(){
        if(cb_paciente.val() == ''){
          cb_paciente.focus();
        }
        if(cb_especialista.val() == ''){
          cb_especialista.focus();
        }
        if(cb_especialidad.val() == ''){
          cb_especialidad.focus();
        }
        if(cb_sucursal.val() == ''){
          cb_sucursal.focus();
        }
        if(cb_metodopago.val() == ''){
          cb_metodopago.focus();
        }
        if(fecha.val() == ''){
          fecha.focus();
        }
      });
  });

  </script>

</body>
</html>

