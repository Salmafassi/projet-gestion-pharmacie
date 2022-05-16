<?php
session_start();
require_once("connexion.php");
$login=isset($_POST['login'])?$_POST['login']:"";
$pwd=isset($_POST['pwd'])?$_POST['pwd']:"";


$selectutilisateur=$connex->prepare("select * from utilisateurs where login=?  AND mot_de_passe=?");
$selectutilisateur->execute(array($login,$pwd));

if($user=$selectutilisateur->fetch()){
    
      $_SESSION['user']=$user;
      header("location:../secure.php");
    
}
else{
    $_SESSION['error']="le mot de passe ou login est incorrecte";
    header("location:login1.php");
}

?>