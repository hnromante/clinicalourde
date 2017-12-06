<?php 
//require ('conexion.php');

class DaoReserva extends AccesoDatos{


	public function consultarReserva($id){
		$this->conexion();
		$sql = "SELECT * FROM reservas WHERE id_res='$id'";
		$st = $this->con->query($sql);

		if($rs = $st->fetch_array(MYSQL_BOTH)){
			$id_res = $rs['id_res'];
			$usr_res = $rs['usr_res'];
			$pac_res = $rs['pac_res'];
			$especialidad_res = $rs['especialidad_res'];
			$especialista_res = $rs['especialista_res'];
			$met_pag_res = $rs['met_pag_res'];
			$suc_res = $rs['suc_res'];
			$fecha = $rs['fecha_res'];
			$comentario_res = $rs['comentario_res'];
			$agregado_en = $rs['agregado_en'];
			$activa = $rs['activa'];
			$res = new Reserva($id_res,$usr_res,$pac_res,$especialidad_res,$especialista_res,$met_pag_res,$suc_res,$comentario_res,$fecha, $agregado_en, $activa);
			$this->desconexion();
			return $res;
		}
		$this->desconexion();
	}
	//Metodo especializado para obtener solo las reservas de un usuario.
	public function obtenerReservasUsu($id_usu){
		$this->conexion();
		$lista = array();

		$sql ="SELECT id_res AS id, pacientes.nom_pac AS nom,reservas.usr_res AS usu, pacientes.ape_pac AS ape, especialidades.nom_esp AS esp, 
			especialistas.nom_esp AS espe, metodopago.nom_met AS met, 
			sucursal.nom_suc AS suc, comentario_res AS obs, fecha_res AS fec, 
			agregado_en AS agregado, activa
			FROM reservas, usuarios, pacientes, especialidades, 
			especialistas, metodopago, sucursal 
			WHERE reservas.usr_res = usuarios.id_usr  AND reservas.pac_res = pacientes.rut_pac AND reservas.especialidad_res = especialidades.id_esp AND reservas.especialista_res = especialistas.rut_esp AND reservas.met_pag_res = metodopago.id_met AND reservas.suc_res = sucursal.id_suc AND usr_res='$id_usu'";
		$st = $this->con->query($sql);
		
		while ($rs = $st->fetch_array(MYSQL_BOTH)){
			$id = $rs['id'];
			$usu = $rs['usu'];
			$nom = $rs['nom'];
			$ape = $rs['ape']; #capturamos el apellido pero no lo insertamos
			$esp = $rs['esp'];
			$espe = $rs['espe'];
			$met = $rs['met'];
			$suc = $rs['suc'];
			$obs = $rs['obs'];
			$fec = $rs['fec'];
			$agregado = $rs['agregado'];
			$activa = $rs['activa'];
			$res = new Reserva($id,$usu,$nom.' '.$ape,$esp,$espe,$met,$suc,$obs,$fec,$agregado,$activa);
			$lista[] = $res; 
		}
		$this->desconexion();
		return $lista;
	}		

	public function agregarReserva($res){
		$this->conexion();
		$id_res = $res->getId_res();
		$usr_res = $res->getUsr_res();
		$pac_res = $res->getPac_res();
		$especialidad_res = $res->getEspecialidad_res();
		$especialista_res = $res->getEspecialista_res();
		$met_pag_res = $res->getMet_pag_res();
		$suc_res = $res->getSuc_res();
		$comentario_res = $res->getComentario();
 		$fecha = $res->getFecha();
 		$agregadaEn = $res->getFecha();
 		$activa = $res->getActiva();
		$sql = "INSERT INTO reservas VALUES ('','$usr_res','$pac_res','$especialidad_res','$especialista_res','$met_pag_res','$suc_res','$comentario_res','$fecha',now(),1);";
		

		$st = $this->con->query($sql);

		if ($this->con->affected_rows > 0){
			echo 'Se ha agregado la reserva correctamente';
		}else{
			echo '......ERROR! No se ha podido agregar la reserva ';
		}
		$this->desconexion();
	}

	public function cambiarEstado($id){
		
		$res = $this->consultarReserva($id);
		$this->conexion();
		$estado = $res->getActiva();
		$sql = '';

		if ($estado) {
			$sql = "UPDATE reservas SET activa=0 WHERE id_res='$id'";

		}else{
			$sql = "UPDATE reservas SET activa=1 WHERE id_res='$id'";
		}

		$st = $this->con->query($sql);

		if($this->con->affected_rows > 0 ){
			echo 'Se cambio el estado correctamente';
		}else{
			echo '...Error! No se pudo cambiar el estado';
		}
		$this->desconexion();

	}

}
?>
