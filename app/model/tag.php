<?php

class Tag
{

private $id;
private $tag_name;
private $db;


public function __construct($db)
{

    $this->db=$db->connect();

}

public function getId(){
    return $this->id;
}

public function getTag_name(){

    return $this->tag_name;
}


public function setId($id){

    $this->id=$id;

}

public function setTag_name($tag_name){
    $this->tag_name=$tag_name;
}

public function CreerTag($tag_name){
    $query='insert into Tage (tag_name) values (:tag_name)';
    $stmt=$this->db->prepare($query);
    $stmt->bindParam(':tag_name',$tag_name);
    $stmt->execute();
return 
}


}



?>