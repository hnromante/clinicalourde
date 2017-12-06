<?php 

class Paciente{

    private $rut_pac;
    private $nom_pac;
    private $ape_pac;
    private $tel_pac;
    private $dir_pac;

    #FOREIGN KEY TABLA RELACIONAL usuarios, salud
    private $usu_pac;
    private $sal_pac;

    public function Paciente ($rut_pac,$nom_pac,$ape_pac,$tel_pac,$dir_pac,$usu_pac,$sal_pac){

        $this->rut_pac = $rut_pac;
        $this->nom_pac = $nom_pac;
        $this->ape_pac = $ape_pac;
        $this->tel_pac = $tel_pac;
        $this->dir_pac = $dir_pac;
        $this->usu_pac = $usu_pac;
        $this->sal_pac = $sal_pac;

        
    }

    public function getRut_pac(){
        return $this->rut_pac;
    }

    public function getNom_pac(){
        return $this->nom_pac;
    }

    public function getApe_pac(){
        return $this->ape_pac;
    }

    public function getTel_pac(){
        return $this->tel_pac;
    }

    public function getDir_pac(){
        return $this->dir_pac;
    }
    public function getUsu_pac(){
        return $this->usu_pac;
    }

    public function getSal_pac(){
        return $this->sal_pac;
    }
}

?>