<?php 

class Sucursal{

    private $id_suc;
    private $nom_suc;
    private $ciu_suc;

    public function Sucursal($id_suc,$nom_suc,$ciu_suc){
        
        $this->id_suc = $id_suc;
        $this->nom_suc = $nom_suc;
        $this->ciu_suc = $ciu_suc;
    }


    public function getId_suc(){
        return $this->id_suc;
    }

    public function getNom_suc(){
        return $this->nom_suc;
    }

    public function getCiu_suc(){
        return $this->ciu_suc;
    }
}

?>