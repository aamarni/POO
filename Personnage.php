<?php

class Personnage
{

    private $_force =230;
    private $_localisation;
    private $_experience = 50;
    private $_degat;

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

    }


}


$Perso = new Personnage;
$Perso ->parler();
$Perso -> gagnerexperience();
$Perso -> afficherexperience();
