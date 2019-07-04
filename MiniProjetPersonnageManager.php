<?php


class PersonnageManager{
private $_db;

public function __construct($db){

    $this -> setDb($db);
}
public function add(Personnage $perso)
  {
    // Préparation de la requête d'insertion.
    // Assignation des valeurs pour le nom du personnage.
    // Exécution de la requête.
    
    // Hydratation du personnage passé en paramètre avec assignation de son identifiant et des dégâts initiaux (= 0).
  }
  
  public function count()
  {
    // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
  }
  
  public function delete(Personnage $perso)
  {
    // Exécute une requête de type DELETE.
  }
  
  public function exists($info)
  {
    // Si le paramètre est un entier, c'est qu'on a fourni un identifiant.
      // On exécute alors une requête COUNT() avec une clause WHERE, et on retourne un boolean.
    
    // Sinon c'est qu'on a passé un nom.
    // Exécution d'une requête COUNT() avec une clause WHERE, et retourne un boolean.
  }
  
  public function get($info)
  {
    // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    
    // Sinon, on veut récupérer le personnage avec son nom.
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
  }
  
  public function getList($nom)
  {
    // Retourne la liste des personnages dont le nom n'est pas $nom.
    // Le résultat sera un tableau d'instances de Personnage.
  }
  
  public function update(Personnage $perso)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
  }

public function setDb($db){

    $this ->_db =$db;
}

}