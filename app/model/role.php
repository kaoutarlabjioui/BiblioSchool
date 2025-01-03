<?php
include '../config/db.php';

class Role{
private $id;
private $role_name;



public function getId(){
return $this->id;

}

public function getRole_name(){
return $this->role_name;

}

public function setId($id){
    $this->id=$id;
}


public function setRole_name($role_name){
$this->role_name=$role_name;

}


}



?>