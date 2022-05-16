<?php 
include('identifier1.php');
include("connexion.php");
$name=htmlspecialchars($_POST['name']);
$email=htmlspecialchars($_POST['email']);
$pharmacie=htmlspecialchars($_POST['pharmacie']);
$login=htmlspecialchars($_POST['login']);
$pwd=htmlspecialchars($_POST['pwd']);
$tel=htmlspecialchars($_POST['tel']);
$pwd1=isset($_POST['pwd1'])?$_POST['pwd1']:"";
$pwd2=isset($_POST['pwd2'])?$_POST['pwd2']:"";
$id=$_SESSION['user']['id_utilisateur'];
if($pwd1!=$pwd2){
    $message="les deux mot de passes ne sont pas identiques";
header("location:parametre.php?message=$message&idu=$id");
}
else{
    
    if($pwd1!=""){
        $pwd=$pwd1;
    }
$requete="update utilisateurs set nomComplet='$name',email='$email' ,pharmacie='$pharmacie' ,login='$login' ,mot_de_passe='$pwd' ,telephone='$tel' where id_utilisateur='$id'";
$select=$connex->query($requete);
$message="la modification des données de l'utilisateur est effectuée avec succès";
header("location:profile.php?message=$message&idu=$id");

}

?>