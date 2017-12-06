<?php 

class Reserva{

    private $id_res;
    #Foreign keys
    private $usr_res;
    private $pac_res;
    private $especialidad_res;
    private $especialista_res;
    private $met_pag_res;
    private $suc_res;
    #Campos propios de reserva
    private $comentario;
    private $fecha;
    private $agregadaEn;
    private $activa;


    public function Reserva($id_res,$usr_res,$pac_res,$especialidad_res,$especialista_res,$met_pag_res,$suc_res,$comentario,$fecha,$agregadaEn,$activa){
        $this->id_res = $id_res;
        $this->usr_res = $usr_res;
        $this->pac_res = $pac_res;
        $this->especialidad_res = $especialidad_res;
        $this->especialista_res = $especialista_res;
        $this->met_pag_res = $met_pag_res;
        $this->suc_res = $suc_res;
        $this->comentario = $comentario;
        $this->fecha = $fecha;
        $this->agregadaEn = $agregadaEn;
        $this->activa = $activa;
        
    }
    public function getId_res(){
        return $this->id_res;
    }

    public function getUsr_res(){
        return $this->usr_res;
    }

    public function getPac_res(){
        return $this->pac_res;
    }

    public function getEspecialidad_res(){
        return $this->especialidad_res;
    }

    public function getEspecialista_res(){
        return $this->especialista_res;
    }

    public function getMet_pag_res(){
        return $this->met_pag_res;
    }

    public function getSuc_res(){
        return $this->suc_res;
    }

    public function getComentario(){
        return $this->comentario;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getAgregadaEn(){
        return $this->agregadaEn;
    }

    public function getActiva(){
        return $this->activa;
    }
}   

?>