<?php
include '../extend/header.php';
require_once ('../conexion/conexion.php');

require_once ('../model/reserva.php');
require_once ('../conexion/daoReserva.php');

$daoRes = new DaoReserva();
// CAPTURA DE DATOS FORMULARIO
if (isset($_REQUEST['codest'])){
    $cod = $_REQUEST['codest'];
    $daoRes->cambiarEstado($cod);
}
?>
<!-- Seccion de imagen y enunciado -->
<div class="container">
  <div style="margin-top:5%" class="row">
    <div class="col s12 m6 l6">
      <img class="circle" src="../img/res.jpg" width="50%" alt="" />
    </div>
    <div class="col s12 m6 l6">
      <p class="flow-text grey-text text-darken-2">Aca puedes ver todas las reservas asociadas a tu cuenta!</p>

    </div>
  </div>
</div>


<!-- Seccion de listado reservas -->
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l12">
    <div class="card ">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Mis reservas</span>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th data-field="id_res">ID</th>
                        <th data-field="pac">Paciente</th>
                        <th data-field="especialidad">Especialidad</th>
                        <th data-field="especialista">Especialista</th>
                        <th data-field="pag">Met. Pago</th>
                        <th data-field="suc">Sucursal</th>
                        <th data-field="obs">Observacion</th>
                        <th data-field="fecha">Fecha Reserva</th>
                        <th data-field="agregada">Agreaga en</th>
                        <th data-field="eli">Cambiar estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $lista = $daoRes->obtenerReservasUsu(1);

                    foreach($lista as $r){
                        echo '<tr>';
                        echo '<td>'.$r->getId_res().'</td>';
                        echo '<td>'.$r->getPac_res().'</td>';
                        echo '<td>'.$r->getEspecialidad_res().'</td>';
                        echo '<td>'.$r->getEspecialista_res().'</td>';
                        echo '<td>'.$r->getMet_pag_res().'</td>';
                        echo '<td>'.$r->getSuc_res().'</td>';
                        echo '<td>'.$r->getComentario().'</td>';
                        echo '<td>'.$r->getFecha().'</td>';
                        echo '<td>'.$r->getAgregadaEn().'</td>';

                        if ($r->getActiva()){
                            echo '<td class="green lighten-2 black-text"><a href="listadoRes.php?codest='.$r->getId_res().'"><i class="material-icons">compare_arrows</i>Activa</a></td>';
                        }else{
                            echo '<td class="red darken-2 black-text"><a href="listadoRes.php?codest='.$r->getId_res().'"><i class="material-icons">compare_arrows</i>Cancelada</a></td>';
                        }
                        echo '</tr>';
                    }

              ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>


<?php include '../extend/scripts.php' ?>


</body>
</html>
