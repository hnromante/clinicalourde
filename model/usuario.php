
<?php 

class Usuario{

    private $id_usr;
    private $nom_usr;
    private $mail_usr;
    private $pass_usr;
    private $admin;
    private $bloqueo;
    private $cracion;

    public function Usuario($id_usr,$nom_usr,$mail_usr,$pass_usr,$admin,$bloqueo,$creacion){

        $this->id_usr = $id_usr;
        $this->nom_usr = $nom_usr;
        $this->mail_usr = $mail_usr;
        $this->pass_usr = $pass_usr;
        $this->admin = $admin;
        $this->bloqueo = $bloqueo;
        $this->creacion = $creacion;
        
    }
    

    public function getId_usr(){
        return $this->id_usr;
    }

    public function getNom_usr(){
        return $this->nom_usr;
    }

    public function getMail_usr(){
        return $this->mail_usr;
    }

    public function getPass_usr(){
        return $this->pass_usr;
    }

    public function getAdmin(){
        return $this->admin;
    }

    public function getBloqueo(){
        return $this->bloqueo;
    }

    public function getCreacion(){
        return $this->creacion;
    }
}




?>