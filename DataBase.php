<?php
class Personnage{
    private $_id;
    private $_nom;
    private $_forcePerso;
    private $_degats;
    private $_niveau;
    private $_experience;

    public function __construct($donnees){
        $this -> setNom($donnees['nom']);
        $this -> setDegats($donnees['degats']);
        $this -> setExperience($donnees['experience']);       
        $this -> setNiveau($donnees['niveau']);
        $this -> setForcePerso($donnees['forcePerso']);
    }
    // Listes de getters
    public function id(){
        echo 'Function id','<BR>';
        return $this ->_id;
    }
    public function nom(){
         return $this ->_nom;
         echo $this ->_nom;
         echo '<BR>';
    }
    public function forcePerso(){
        return $this ->_forcePerso;
    }
    public function degats(){
        return $this ->_degats;
    }
    public function niveau(){
        return $this ->_niveau;
    }
    public function experience(){
        return $this ->_experience;
    }
    // liste des setters
    public function setId($id){
        $id = (int)$id;
        if ($id > 0){
            $this ->_id =$id;
        }
    }
    public function setNom($nom){
        if(is_string($nom)){
            $this ->_nom =$nom;
        }
    }
    public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;
    
    if ($forcePerso >= 1 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }
  
  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    
    if ($niveau >= 1 && $niveau <= 100)
    {
      $this->_niveau = $niveau;
    }
  }
  
  public function setExperience($experience)
  {
    $experience = (int) $experience;
    
    if ($experience >= 1 && $experience <= 100)
    {
      $this->_experience = $experience;
    }
  }
}
/*
// On admet que $db est un objet PDO.
$db = new PDO('mysql:host=localhost;dbname=personnage', 'root', '');
$request = $db->query('SELECT *  FROM personnage');
    
while ($donnees = $request->fetch(PDO::FETCH_ASSOC)) // Chaque entrée sera récupérée et placée dans un array.
{
  //print_r($donnees).'<BR>';
  // On passe les données (stockées dans un tableau) concernant le personnage au constructeur de la classe.
  // On admet que le constructeur de la classe appelle chaque setter pour assigner les valeurs qu'on lui a données aux attributs correspondants.
  $perso = new Personnage($donnees);        
  echo $perso->nom(),' a ',$perso->forcePerso(),' de force, ', $perso->degats(),' de degats, ',$perso->experience(),' d\'experience et est au niveau ',$perso->niveau();
  echo '<BR>';
}
*/

class PersonnagesManager{

  private $_db;

  public function __construct($db){
     $this -> setDb($db);
  }

  public function add(Personnage $Perso){

    print_r($Perso);
    echo'<BR>';

      $Request = $this->_db->prepare('INSERT INTO personnage (nom, forcePerso, degats, niveau, experience) VALUE ('.'"'.$Perso->nom().'"'.','. $Perso->forcePerso().','.$Perso->degats().','.$Perso->niveau().','.$Perso->niveau());
/*
      $Request->bindValue(':nom', $Perso->nom());
      $Request->bindValue(':forcePerso', $Perso->forcePerso(), PDO::PARAM_INT);
      $Request->bindValue(':degats', $Perso->degats(), PDO::PARAM_INT);
      $Request->bindValue(':niveau', $Perso->niveau(), PDO::PARAM_INT);
      $Request->bindValue(':experience', $Perso->experience(), PDO::PARAM_INT);
*/
      $Request->execute();

      print_r($Request);
      echo '<BR>';

      print_r($this->_db);
      echo '<BR>';

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
      print_r($Request);
      while($donnees=$Request->fetch(PDO::FETCH_ASSOC)){
        echo'IIIIIIICCCCCCCCIIIIIIIIIIII'.'<BR>';
          $Perso[]= new Personnage($donnees);
          echo $Perso->nom(),' a ',$Perso->forcePerso(),' de force, ', $Perso->degats(),' de degats, ',$Perso->experience(),' d\'experience et est au niveau ',$perso->niveau();
  echo '<BR>';
      }
      return $Perso;

  }

  public function update(Personnage $Perso){
      $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

      $q->bindValue(':forcePerso', $Perso->forcePerso(), PDO::PARAM_INT);
      $q->bindValue(':degats', $Perso->degats(), PDO::PARAM_INT);
      $q->bindValue(':niveau', $Perso->niveau(), PDO::PARAM_INT);
      $q->bindValue(':experience', $Perso->experience(), PDO::PARAM_INT);
      $q->bindValue(':id', $Perso->id(), PDO::PARAM_INT);

      $q->execute();
  }

  public function setDb(PDO $db){
      $this->_db = $db;
      //var_dump($db);
  }

}

$Perso = new Personnage([
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

$db = new PDO('mysql:host=localhost;dbname=personnage', 'root', '');
$manager = new PersonnagesManager($db);
    
$manager->add($Perso);

$manager ->getList();
