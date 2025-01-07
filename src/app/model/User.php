<?php
namespace src\app\model;

use Connection;
use PDO;

class User{

private $id;
private $nom;
private $prenom;
private $email;
private $password;
private Role $role;
private  $db;


public function __construct(){

 $this->db=(new Connection())->connect();

}


public function setNom($name){
    $this->nom=$name;
}

public function setPrenom($prenom){
    $this->prenom=$prenom;
}

public function setEmail($email){
    $this->email=$email;
}

public function setPassword($password){
    $this->password=$password;
}

public function setRole($role){
    $this->role->findByid($role);
}

public function getRole(){
   return $this->role;
}


public function save(){

$query='insert into Users (nom,prenom,email,password,id_role) values (:nom,:prenom,:email,:password,:role)';
$stmt=$this->db->prepare($query);
$stmt->bindParam(':nom',$this->nom);
$stmt->bindParam(':prenom',$this->prenom);
$stmt->bindParam(':email',$this->email);
$stmt->bindParam(':password',$this->password);
$stmt->bindParam(':role',$this->role->getId());
$stmt->execute();



}

public function checkEmail($email){
    $sql='select * from Users where email = :email';
    $stmt=$this->db->prepare($sql);
    $stmt->bindParam(':email',$email);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}





}








?>