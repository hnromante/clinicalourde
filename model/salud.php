<?php  

class Salud {
    
    private $id_sal;
    private $tipo_sal;
    private $nom_sal;

    #Cosntructor para inicializar todas las variables
    public function Salud($id_sal, $tipo_sal, $nom_sal){
        
        $this->id_sal = $id_sal;
        $this->tipo_sal = $tipo_sal;
        $this->nom_sal = $nom_sal;

    }
    
    public function getId_sal(){
        return $this->id_sal;
    }

    public function getTipo_sal(){
        return $this->tipo_sal;
    }
    
    public function getNom_sal(){
        return $this->nom_sal;
    }

}

?>