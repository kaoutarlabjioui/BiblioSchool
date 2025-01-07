<?php 

session_start();

if (isset($_SESSION)) {
$user=$_SESSION['user'];

if($user->getRole()->getRole_name()=='Admine'){
    header('location: ./dashboard/AdminDashboard.php');
}

}







?>