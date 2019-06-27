<?php

class Personnage
{

    private $_force;
    private $_localisation;
    private $_experience;
    private $_degats;

    public function __construct($force, $degats){
        echo 'Voici le constructeur !'.'<br/>'; // Message s'affichant une fois que tout objet est créé.
        $this -> SetForce($force);
        $this -> SetDegats($degats);
        $this -> _experience =1; 


    }

    public function parler(){
        echo "je suis un objet : ";
        echo $this -> _force = $this ->_force+1;
        echo "<BR>";
    }
    public function gagnerexperience(){
        $this->_experience++;
    }

    public function afficherexperience(){
 
        echo"j'ai une experience de : ";
        echo $this->_experience;
        echo "<BR>";
    }

    public function frapper(Personnage $PersoAFrapper){

        //echo "le personnage frappé a des dega de : ";
        $PersoAFrapper -> _degats += $this-> _force;
        //echo"<BR>";
        /*
        echo "le personnage qui frapper a des force  de : ";
        echo $Perso1 = $this-> _force+1;
        echo "<BR>";
        */
    }

    // Mutateur chargé de modifier l'attribut $_force.
    public function SetForce($force){

        if (!is_int($force)) // S'il ne s'agit pas d'un nombre entier.
        {
          trigger_error('La force d\'un personnage doit être un nombre entier', E_USER_WARNING);
          return;
        }
        
        if ($force > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
          trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
          return;
        }
        
        $this->_force = $force;

    }

    // Mutateur chargé de modifier l'attribut $_force.
    public function SetExperience($experience){

        if (!is_int($experience)) // S'il ne s'agit pas d'un nombre entier.
        {
            trigger_error('L\'expérience d\'un personnage doit être un nombre entier', E_USER_WARNING);
            return;
        }
        
        if ($experience > 100) // On vérifie bien qu'on ne souhaite pas assigner une valeur supérieure à 100.
        {
            trigger_error('L\'expérience d\'un personnage ne peut dépasser 100', E_USER_WARNING);
            return;
        }
        
            $this->_experience = $experience;

    }

     // Mutateur chargé de modifier l'attribut $_degats.
  public function SetDegats($degats)
  {
    if (!is_int($degats)) // S'il ne s'agit pas d'un nombre entier.
    {
      trigger_error('Le niveau de dégâts d\'un personnage doit être un nombre entier', E_USER_WARNING);
      return;
    }

    $this->_degats = $degats;
  }

    // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force
    public function force(){

        return $this->_force;
    }

    // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience
    public function experience(){

        return $this->_experience;
    }
    // Ceci est la méthode degat() : elle se charge de renvoyer le contenu de l'attribut $_degat
    public function degats(){

        return $this->_degats;
    }
}


$Perso1 =new Personnage(60, 0);//Permier Personnage
$Perso2 =new Personnage(100, 10);//Deuxieme Personnage
/*
$Perso1->SetForce(10);
$Perso1->SetExperience(2);

$Perso2 ->SetForce(90);
$Perso2 -> SetExperience(58);
*/


$Perso1 -> frapper($Perso2);
$Perso1 -> gagnerexperience();

$Perso2 -> frapper($Perso1);
$Perso2 -> gagnerexperience();

echo 'Le personnage1 a '. $Perso1 -> force() .' de force, contrairement au personnage 2 qui a '.$Perso2 ->force() .' de force '.'<BR>';

echo 'Le personnage 1 a ', $Perso1->experience(), ' d\'expérience, contrairement au personnage 2 qui a ', $Perso2->experience(), ' d\'expérience.<br />';

echo 'Le personnage 1 a ', $Perso1->degats(), ' de dégâts, contrairement au personnage 2 qui a ', $Perso2->degats(), ' de dégâts.<br />';