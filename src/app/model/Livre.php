<?php
namespace src\app\model;

use PDO;
use src\config\Connection;

class Livre{
    private $id;
    private $titre;
    private $auteur_name;
    private $tag=[];
    private $categorie;
    private $status;
    private $db;

    public function __construct()
    {
        $this->db=(new Connection())->connect();
    }

    public function getId(){
        return $this->id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getAuteur_name(){
        return $this->auteur_name;
    }

    public function getTag(){
        return $this->tag;
    }

    public function getCategorie(){
        return $this->categorie;
    }

    public function getStatus(){
        return $this->status;
    }

   public function setId($id){
    $this->id=$id;

    }

    public function setTitre($titre){

        $this->titre=$titre;

    }


    public function setAuteur_name($auteur_name){
      $this->auteur_name=$auteur_name;

    }
    
    public function setTag($tag){
        $this->tag=$tag;
    }


    public function setCategorie($categorie){

        $this->categorie=$categorie;

    }
  public function setStatus($status){
    $this->status=$status;
  }

  public function getOne($id){
    $query='select * from Livres where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

public function getAll(){
    $query='select * from Livres ';
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


public function Supprimerlivre($id){

$query='delet from Livres where id=:id';

$stmt=$this->db->prepare($query);
$stmt->bindParam(':id',$id);
return $stmt->execute();

}


public function ModifierLivre($id,$titre,$auteur){
    $query='update Livres set titre = :titre , auteur=:auteur where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':titre',$titre);
    $stmt->bindParam(':auteur',$auteur);
    $stmt->bindParam(':id',$id);
    return $stmt->execute();

}

public function AjouterLivre($titre,$auteur,$tags,Categorie $categorie){



$stmt=$this->db->prepare('insert into Livres (titre,auteur,categorie_id) values (:titre,:auteur,:categorie)');
$stmt->bindParam(':titre',$this->titre);
$stmt->bindParam(':auteur',$auteur);
$stmt->bindParam(':categorie',$this->categorie->getId());

  if($stmt->execute()){
    foreach($tags AS $tag){

        $id=$tag->CreerTag($tag->getTag_name());
        $sql='insert into livres_tags (Livre_id,tag_id) values (:livre,:tag)';
        $stmt2=$this->db->prepare($sql);
        $stmt2->bindParam(':livre',$stmt->fetchColumn());
        $stmt2->bindParam(':tag',$id);
    }

  }

}
}


// $categorie = Categorie::getCategorieByName("cat1");

// $categorie = new Categroei();

// $categorie->getByName("cat1");

// => {
//     $this->title = $data['title'];
//     $this->auteur = $data["auteur"];
// }


// var_dump($categorie);



// $livre = new Livre("ti1", "Nom Auteur", ['T1', 'T2'], $categorie);


// $livre->create();



?>