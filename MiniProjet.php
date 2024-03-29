<?php

class Personnage{
 
    private $_id;
    private $_nom;
    private $_degats;

    const CEST_MOI=1;
    const PERSONNE_TUE=2;
    const PERSONNE_FRAPPE =3;

    public function __construct(array $donnees)
    {
        $this->hydrate($donnees);
    }
    
    public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        $method = 'set'.ucfirst($key);
        
        if (method_exists($this, $method))
        {
          $this->$method($value);
        }
      }
    }

    public function frapper(Personnage $perso){
      if ($perso->id() == $this->_id)
      {
        return self::CEST_MOI;
      }
      
      // On indique au personnage qu'il doit recevoir des dégâts.
      // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
      return $perso->recevoirDegats();
    }

     public function recevoirDegats(){
        $this->_degats += 5;
        
        // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
        if ($this->_degats >= 100)
        {
        return self::PERSONNAGE_TUE;
        }
        
        // Sinon, on se contente de dire que le personnage a bien été frappé.
        return self::PERSONNAGE_FRAPPE;
    }  

    /* GETTERS */
    public function degats(){
        return $this->_degats;
    }
    public function id(){
        return $this->_id;
    }
    public function nom(){
        return $this->_nom;
    }

    /* STTERS */

    public function setDegats($degats){
        $degats =(int)$degats;
        if($degats >= 0 && $degats <= 100){
            $this->_degats = $degats;
        }        
    }

    public function setId($id){
        $id =(int)$id;
        if($id >0){
            $this->_id = $id;
        }
    }
    public function setNom($nom){
        if(is_string($nom)){
            $this -> _nom = $nom;
        }        
    }

}

$perso = new Personnage([
    "id"=>1,
    "nom"=>'Amar',
    "degats"=>50
]);

echo $perso->nom();