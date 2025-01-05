<?php

class Tag
{

private $id;
private $tag_name;
private $livre=[];
private $db;


public function __construct()
{

    $this->db=(new Connection())->connect();

}

public function getId(){
    return $this->id;
}

public function getTag_name(){

    return $this->tag_name;
}

public function getLivre(){
    return $this->livre;
}


public function setId($id){

    $this->id=$id;

}

public function setTag_name($tag_name){
    $this->tag_name=$tag_name;
}


public function gettagbyTag_name($tag_name){

$query='select * from Tags where tag_name=:tag_name';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':tag_name',$tag_name);
 if ($stmt->execute()){
    $id=$stmt->fetchColumn();
    var_dump($id);
    return $id;
 }
else {
    return false;
}

}


public function CreerTag($tag_name){
if($this->gettagbyTag_name($tag_name)){
        return $this->gettagbyTag_name($tag_name);
    }
else{
    $query='insert into Tags (tag_name) values (:tag_name)';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':tag_name',$tag_name);

    $stmt->execute();
    $last_id=$this->db->query('select MAX(id) from TAgs')->fetchColumn();
    return $last_id;
}

}

public function supprimerTag($id){

$query='delete from Tags where id=: id';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':id',$id);
return $stmt->execute();


}
public function AddLivreTag(Livre $livre){

    $this->livre[]=$livre;

}

public function ModifierTag($id,$tag_name){
    $query='update Tags set tag_name =:tag_name where id=:id';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':tag_name',$tag_name);
    return $stmt->execute();
}

public function getAlltag(){
    $query='select * from Tags ';
    $stmt=$this->db->prepare($query);
    $stmt->execute();
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}


}




?>