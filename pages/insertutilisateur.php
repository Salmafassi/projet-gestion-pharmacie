<?php 

require_once("connexion.php");
if(isset($_POST['enregistrer'])){
    $nomc=htmlspecialchars($_POST['name']);
    $email=htmlspecialchars($_POST['email']);
    $pharmacie=htmlspecialchars($_POST['pharmacie']);
    $login=htmlspecialchars($_POST['login']);
    $pwd=htmlspecialchars($_POST['pwd']);
    $pwd1=htmlspecialchars($_POST['pwd1']);
    if($pwd!=$pwd1){
     $message="les deux mot de passes ne sont pas identiques";
     header("location:inscription.php?message=$message");
    }
    else{
     $requete="insert into utilisateurs(nomComplet,login,mot_de_passe,pharmacie,email) values('$nomc','$login','$pwd','$pharmacie','$email')";
     $select=$connex->query($requete);

    
    }
header("location:login1.php");
}








?>