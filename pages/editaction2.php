
<?php
require_once("identifier1.php");
require_once('connexion.php');
if(isset($_POST['edit'])){
    $name=htmlspecialchars($_POST['name']);
    
    $email=htmlspecialchars($_POST['email']);
    $telephone=htmlspecialchars($_POST['tel']);
 $connexedit=$connex->prepare("update fournisseur set nomComplet=? , email=?, tel=? where id_fournisseur=?");
 $connexedit->execute(array($name,$email,$telephone,$_POST['idfournisseur']));
}
header("location:fournisseur.php?nomprenom=&size=20");

?>