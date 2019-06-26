<?php

class Personnage
{

    private $_force =20;
    private $_localisation;
    private $_experience = 0;
    private $_degat = 0;

    public function parler(){
        echo "je suis un objet : ";
        echo $this -> _force = $this ->_force+1;
        echo "<BR>";
    }
    public function gagnerexperience(){
        $this->_experience = $this->_experience+1;
    }

    public function afficherexperience(){
 
        echo"j'ai une experience de : ";
        echo $this->_experience;
        echo "<BR>";
    }

    public function frapper($Perso2){

        echo "le personnage frappé a des dega de : ";
        echo $Perso2 -> _degat += $this-> _force;
        echo"<BR>";

        //echo "le personnage qui frapper a des force  de : ".$Perso1 = $this-> _force+1 ."<BR>";

    }
}


$Perso = new Personnage;
$Perso ->parler();
$Perso -> gagnerexperience();
$Perso -> afficherexperience();
$Perso1 =new Personnage;
$Perso2 =new Personnage;
$Perso1 -> frapper($Perso2);
