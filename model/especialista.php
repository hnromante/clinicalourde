<?php

class Especialista{

    private $rut_esp;
    private $nom_esp;
    private $ape_esp;
    private $nac_esp;
    private $tit_esp;

    public function Especialista($rut_esp,$nom_esp,$ape_esp,$nac_esp,$tit_esp){
        $this->rut_esp = $rut_esp;
        $this->nom_esp = $nom_esp;
        $this->ape_esp = $ape_esp;
        $this->nac_esp = $nac_esp;
        $this->tit_esp = $tit_esp;
    }

    public function getRut_esp(){
        return $this->rut_esp;
    }
    
    public function getNom_esp(){
        return $this->nom_esp;
    }

    public function getApe_esp(){
        return $this->ape_esp;
    }

    public function getNac_esp(){
        return $this->nac_esp;
    }

    public function getTit_esp(){
        return $this->tit_esp;
    }
}


?>