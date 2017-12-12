<?php 

class MetodoPago{
    
    private $id_met;
    private $tipo_met;
    private $nom_met;

    public function MetodoPago($id_met,$tipo_met,$nom_met){
        
        $this->id_met = $id_met;
        $this->tipo_met = $tipo_met;
        $this->nom_met = $nom_met;

    }

    public function getId_met(){
        return $this->id_met;
    }

    public function getTipo_met(){
        return $this->tipo_met;
    }
    
    public function getNom_met(){
        return $this->nom_met;
    }
}

?>
