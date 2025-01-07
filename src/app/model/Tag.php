<?php
namespace src\app\model;
require_once 'C:\wamp64\www\BiblioSchool\vendor\autoload.php';
use PDO;
use src\config\Connection;

class Tag
{

private $id;
private $tag_name;
private $livre=[];
private $db;


public function __construct($tag_name)
{
    $this->tag_name=$tag_name;

    $this->db=(new Connection())->connect();

}

public function getId(){
    return $this->id;
}

public function getTagname(){

    return $this->tag_name;
}

public function getLivre(){
    return $this->livre;
}


public function setId($id){

    $this->id=$id;

}

public function setTagname($tag_name){
    $this->tag_name=$tag_name;
}


public function getTagByTagName($tag_name){

$query='select * from Tags where tag_name=:tag_name';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':tag_name',$tag_name);
 if ($stmt->execute()){
    $id=$stmt->fetchColumn();
    return $id;
 }
else {
    return false;
}

}

public function __toString()
{
    return 'the tag is : ' .$this->getTagname();
}

public function createTag(){
    $tag_name=$this->getTagname();
if($this->getTagByTagName($tag_name)){
        return $this->getTagByTagName($tag_name);
    }
else{
    $query='insert into Tags (tag_name) values (:tag_name)';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':tag_name',$this->tag_name);
    $stmt->execute();
     $last_id=$this->db->query('select MAX(id) from TAgs')->fetchColumn();
    return    $last_id;
}

}

public function deleteTag(){
    $query='delete from Tags where id= :id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$this->id);
    return $stmt->execute();


}


public function updateTag(){
    $query='update Tags set tag_name =:tag_name where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$this->id);
    $stmt->bindParam(':tag_name',$this->tag_name);
    return $stmt->execute();
}

public function getAlltag(){
    $query='select * from Tags ';
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

public function AddLivreTag(Livre $livre){

    $this->livre[]=$livre;

}

}





?>