<?php

class PersonnagesManager{

    private $_db;

    public function __construct($db){
       $this -> setDb($db);
    }

    public function add(Personnage $Perso){

        $Request = $this->_db->prepare('INSERT INTO personnage (nom, forcePerso, degats, niveau, experience) VALUE (:nom, :forcePerso, :degats, :niveau, :experience)');

        $Request->bindValue(':nom', $perso->nom());
        $Request->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $Request->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $Request->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $Request->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);

        $Request->execute();

    }

    public function delete(Personnage $Perso){

        $this ->_db ->exec('DELETE FROM personnage WHERE id ='.$Perso->id());

    }

    public function get($id){
        $id =(int)$id;

        $Request = $this->_db->query('SELECT * FROM personnage WHERE id ='.$id);
        $donnees =$Request ->fetch(PDO::FETCH_ASSOC);

        return new Personnage($donnees);

    }

    public function getList(){
        $Perso=[];
        $Request =$this->_db->prepare('SELECT * FROM personnage ORDER BY nom');
        while($donnees=$Request->fetch(PDO::FETCH_ASSOC)){
            $Perso[]= new Personnage($donnees);
        }
        return $perso;

    }

    public function update(Personnage $Perso){
        $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

        $q->bindValue(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindValue(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindValue(':experience', $perso->experience(), PDO::PARAM_INT);
        $q->bindValue(':id', $perso->id(), PDO::PARAM_INT);

        $q->execute();
    }

    public function setDb(PDO $db){
        $this -> _db = $db;
    }

}

$perso = new Personnage([
    'nom' => 'Victor',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 0
  ]);
  
  $db = new PDO('mysql:host=localhost;dbname=personnage', 'root', '');
  $manager = new PersonnagesManager($db);
      
  $manager->add($perso);
