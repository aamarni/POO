<?php
class Personnage
{
  private $_force;
  private $_localisation;
  private $_experience;
  private $_degats;
  private static $_compteur =0;

  // Déclarations des constantes en rapport avec la force.

  const FORCE_PETITE = 20;
  const FORCE_MOYENNE = 50;
  const FORCE_GRANDE = 80;

    // Variable statique PRIVÉE.
    private static $_texteADire = 'Je vais tous vous tuer !';

  public function __construct()
  {
    // N'oubliez pas qu'il faut assigner la valeur d'un attribut uniquement depuis son setter !
   // $this->setForce($forceInitiale);
    //$this -> parler();
    self::$_compteur++;
  }

  public function deplacer()
  {

  }

  public function frapper()
  {

  }

  public function gagnerExperience()
  {

  }
  
  public function setForce($force)
  {
    // On vérifie qu'on nous donne bien soit une « FORCE_PETITE », soit une « FORCE_MOYENNE », soit une « FORCE_GRANDE ».
    echo 'La force ','<BR>';
    if (in_array($force, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE]))
    {
     echo $this->_force = $force;
     echo '<BR>';
    }
    
  }

  public static function parler(){

    echo 'je vais tout dire rrr','<BR>';
    echo self::$_texteADire;
    echo '<BR>';
  }

  public function getcompteur(){

    return self::$_compteur;
  }
}

$perso = new Personnage(Personnage::FORCE_PETITE);
$perso = new Personnage(Personnage::FORCE_MOYENNE);
$perso = new Personnage(Personnage::FORCE_GRANDE);

$perso::parler();

echo $perso::getcompteur();

