<?php 
namespace src\app\model;
require_once 'C:\wamp64\www\BiblioSchool\vendor\autoload.php';
use PDO;
use src\config\Connection;

class Categorie{

private $id;
private $categorie_name;
private $db;


public function __construct( $categorie_name){
    $this->categorie_name=$categorie_name;
    $this->db=(new Connection())-> connect();
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


public function __toString()
{
    return 'the categorie is : ' . $this->getCategorie_name() ;
}


public function setCategorie_name($categorie_name){

   $this->categorie_name=$categorie_name;

}

public function getCategorieByName($categorie_name){
   
    $query='select * from Categories where categorie_name=:categorie_name';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':categorie_name',$categorie_name);
     if ($stmt->execute()){
        $id=$stmt->fetchColumn();
        return $id;
     }
    else {
        return false;
    }




}

public function CreateCategorie()
{
    $categorie_name=$this->getCategorie_name();
   
if($this->getCategorieByName($categorie_name)){

    return $this->getCategorieByName($categorie_name);

}

    $query='insert into Categories (categorie_name ) values (:categorie_name)';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':categorie_name',$this->categorie_name);
    $stmt->execute();
    $id=$this->db->lastInsertId();
    return $id;
}

public function UpdateCategorie()
{
    //maper function ;
    $query = 'update Categories set categorie_name = :categorie_name where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$this->id);
    $stmt->bindparam(':categorie_name',$this->categorie_name);
    return  $stmt->execute();

}

public function DeleteCategorie()
{

$query='delete from Categories where id= :id ';
$stmt=$this->db->prepare($query);
$stmt->bindparam(':id',$this->id);
return $stmt->execute();

}

public function findAll()
{
    $query='select * from Categories ';
    $stmt=$this->db->prepare($query);
    return $stmt->execute();
}


public function FindOne()
{

$query='select * from Categories where id=:id';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':id',$this->id);
return $stmt->execute();

}







}


?>