<?php 
include '../extend/header.php';
require_once ('../conexion/conexion.php');

require_once ('../model/especialidad.php');
require_once ('../conexion/daoEspecialidad.php');

require_once ('../model/especialista.php');
require_once ('../conexion/daoEspecialista.php');
$daoEspecialista = new DaoEspecialista();
$daoEspecialidad = new DaoEspecialidad();
?>
<!-- Seccion de listado reservas -->
  <div style="margin-top:5%" class="row">
    <div class="col s12 m12 l6 align-center offset-l4">
		<form method="GET" action="index.php">
		<div class="input-field col s6 m6 l4">
        	<input type="text" id="tf_busqueda"  name="tf_busqueda" value="" >
            	<label for="tf_busqueda">Busqueda</label>
		</div>
		<div class="input-field col s6 m6 l4">
			
        	<button name="btn_filtrar" id="btn_filtrar" type="submit" class="btn black"><i class="material-icons">search</i></button>
        </div>
        </form>
    </div>
  </div>
  <div style="margin-top:2%" class="row">
    <div class="col s6 m6 l6 center-align">
        <img src="../img/icono2.png" class="circle">
    </div>
    <div class="col s6 m6 l6 center-align">
        <img src="../img/res.jpg" class="circle">
    </div>
  </div>
  <div style="margin-top:2%" class="row">
    <div class="col s12 m12 l6">
    <div class="card">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Especialistas</span>
            <table class="responsive-table">
                <thead>
                    <tr>
                    	<th data-field="rut">Rut</th>
                        <th data-field="nom">Nombre</th>
                        <th data-field="ape">Apellido</th>
                        <th data-field="esp">Titutlo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($_REQUEST['btn_filtrar'])){
                    	$busqueda = $_REQUEST['tf_busqueda'];
						$lista = $daoEspecialista->buscarEspecialista($busqueda);

                        if(!empty($lista)){
                            foreach($lista as $e){
                                echo '<tr>';
                                echo '<td>'.$e->getRut_esp().'</td>';
                                echo '<td>'.$e->getNom_esp().'</td>';
                                echo '<td>'.$e->getApe_esp().'</td>';
                                echo '<td>'.$e->getTit_esp().'</td>';
                                echo '</tr>';
                            }
                            $count = count($lista);
                        echo "<div class='chip '>Resultado encontrados: $count</div>";
                        }else{
                                echo "<div class='chip red-text'>No hay coincidencia para $busqueda</div>";
                        }

                    }else{
						$lista = $daoEspecialista->obtenerEspecialistas();

	                    foreach($lista as $e){
	                        echo '<tr>';
	                        echo '<td>'.$e->getRut_esp().'</td>';
	                        echo '<td>'.$e->getNom_esp().'</td>';
	                        echo '<td>'.$e->getApe_esp().'</td>';
	                        echo '<td>'.$e->getTit_esp().'</td>';
	                        echo '</tr>';
	                    }
                        $count = count($lista);
                        echo "<div class='chip '>Resultado encontrados: $count</div>";
                    }

              		?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <div class="col s12 m12 l6">
    <div class="card">
        <div class="card-content grey-text text-darken-2">
            <span class="card-title">Especialidades</span>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th data-field="nom">Nombre</th>
                        <th data-field="ape">Descripcion</th>
                        <th data-field="nac">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (isset($_REQUEST['btn_filtrar'])){
                        $busqueda = $_REQUEST['tf_busqueda'];
                        $lista = $daoEspecialidad->buscarEspecialidades($busqueda);
                        if(!empty($lista)){
                            foreach($lista as $e){
                            echo '<tr>';
                            echo '<td>'.$e->getNom_esp().'</td>';
                            echo '<td>'.$e->getDesc_esp().'</td>';
                            echo '<td>'.$e->getPre_esp().'</td>';
                            echo '</tr>';
                            } 
                            $count = count($lista);
                        echo "<div class='chip '>Resultado encontrados: $count</div>";
                        }else{
                            echo "<div class='chip red-text'>No hay coincidencia para $busqueda</div>";
                        }

                    }else{
                        $lista = $daoEspecialidad->obtenerEspecialidades();

                        foreach($lista as $e){
                            echo '<tr>';
                            echo '<td>'.$e->getNom_esp().'</td>';
                            echo '<td>'.$e->getDesc_esp().'</td>';
                            echo '<td>'.$e->getPre_esp().'</td>';
                            echo '</tr>';
                        }
                        $count = count($lista);
                        echo "<div class='chip '>Resultado encontrados: $count</div>";
                   
                    }

					
                    
              		?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
  </div>

<?php include '../extend/scripts.php';?>
</body>
</html>
