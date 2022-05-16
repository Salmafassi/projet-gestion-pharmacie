
<?php
require_once("identifier1.php");
require_once('connexion.php');
if(isset($_POST['edit'])){
    $name=htmlspecialchars($_POST['name']);
   
    $email=htmlspecialchars($_POST['email']);
    $telephone=htmlspecialchars($_POST['tel']);
 $connexedit=$connex->prepare("update client set nomComplet=? , email=?, telephone=? where id_client=?");
 $connexedit->execute(array($name,$email,$telephone,$_GET['idclient']));
}
header("location:client.php?nomprenom=&size=20");

?>