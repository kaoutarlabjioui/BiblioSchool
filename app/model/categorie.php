<?php 



class Categorie{

private $id;
private $categorie_name;
private $db;


public function __construct($db){

    $this->db=$db-> connect();
}

public function getId(){
    return $this->id;
}

public function  getCategorie_name(){

    return $this->categorie_name;
}
public function setId($id){
    $this->id=$id;
}

public function setCategorie_name($categorie_name){

   $this->categorie_name=$categorie_name;

}



public function AjouterCategorie($categorie_name){

    $query='insert into Categorie (categorie_name ) values (:categorie_name)';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':categorie_name',$categorie_name);
    return $stmt->execute();
}

public function ModifierCategorie($id,$categorie_name){
    $query = 'update Categorie set categorie_name = :categorie_name where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->bindparam(':categorie_name',$categorie_name);
    return  $stmt->execute();

}

public function SupprimerCategorie($id){

$query='delete from Categorie where id= :id ';
$stmt=$this->db->prepare($query);
$stmt->bindparam(':id',$id);
return $stmt->execute();

}

public function FindAll(){
    $query='select * from Categorie ';
    $stmt=$this->db->prepare($query);
    return $stmt->execute();
}


public function FindOne($id){

$query='select * from Categorie where id=:id';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':id',$id);
return $stmt->execute();

}







}













?>