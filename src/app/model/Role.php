<?php
namespace src\app\model;

use Connection;
use PDO;

class Role{
private $id;
private $role_name;
private $db;

public function __construct(){

    $this->db=(new Connection())->connect();
   
   }

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

public function findById($id){
    $sql='select * from Roles where id=:id';
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $data=$stmt->fetch(PDO::FETCH_ASSOC);
    $role=new Role();
    $role->setRole_name($data[0]['role']);
    return $role;
}


}



?>