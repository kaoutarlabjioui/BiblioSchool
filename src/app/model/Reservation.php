<?php


use Connection;

class Reservation{
private $id;
private $livre;
private $dateretour;
private $etat;
private $user;
private $db;

public function __construct(){
    $this->db=(new Connection())->connect();
}

public function __toString()
{

}









}




?>