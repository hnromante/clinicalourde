<?php 

class Especialidad{
    private $id_esp;
    private $nom_esp;
    private $desc_esp;
    private $pre_esp;

    public function Especialidad($id_esp,$nom_esp,$desc_esp,$pre_esp) {
        $this->id_esp = $id_esp;
        $this->nom_esp = $nom_esp;
        $this->desc_esp = $desc_esp;
        $this->pre_esp = $pre_esp;
    }

    public function getId_esp(){
        return $this->id_esp;
    }

    public function getNom_esp(){
        return $this->nom_esp;
    }

    public function getDesc_esp(){
        return $this->desc_esp;
    }

    public function getPre_esp(){
        return $this->pre_esp;
    }

    
}

?> 