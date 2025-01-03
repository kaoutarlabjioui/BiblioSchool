<?php



class Connection{

private $servername='localhost';
private $username='root';
private $password='';


public function connect(){


try{

$connection = new PDO ("mysql:host=$this->servername;dbname=biblio",$this->username,$this->password);
$connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
return $connection;
}
catch ( PDOException $e){

    echo "Connection failed: " . $e->getMessage();

}


}

}



?>