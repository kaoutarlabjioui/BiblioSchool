<?php
namespace src\app\controller;
namespace src\app\model;



session_start();

class AuthController{




  private $user;

  public function __construct()
  {
    $this->user=new User();
  }

public function Signup(){

if($_SERVER['REQUEST_METHOD']=='POST'){

if (!empty($_POST['premon']) && !empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['password']))
{

$this->user->setPrenom($_POST['premon']);
$this->user->setNom($_POST['nom']);
$this->user->setEmail($_POST['email']);
$this->user->setPassword($_POST['password']);




if($this->user->save()){
    $_SESSION['user']=$this->user;

  
if($this->user->getRole()->getRole_name()=='admine'){
    header('location: ./dashboard/AdminDashboard.php');
}else if($this->user->getRole()->getRole_name()=='gerant'){

    header('location: ./dashboard/GerantDashboard.php');
}else if(($this->user->getRole()->getRole_name()=='gerant')){

    header('location: ./dashboard/usertDashboard.php');

}


}



}
}
}


public function login(){
if($_SERVER['REQUEST_METHOD']=='POST'){

if(!empty($_POST['email']) && !empty($_POST['password'])){

$check=$this->user->checkEmail($_POST['email']);
if($check!= null){
    if ($check['password']==$_POST['password']) {
        $_SESSION['user']=$check;
    }
}





}







}


}


}







?>