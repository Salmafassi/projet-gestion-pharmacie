
<?php
require_once("identifier1.php");
require_once('connexion.php');
if(isset($_POST['edit'])){
    $name=htmlspecialchars($_POST['nom']);
    $ville=htmlspecialchars($_POST['ville']);
   
 $connexedit=$connex->prepare("update depot set nom_depot=? , ville=? where N_depot=?");
 $connexedit->execute(array($name,$ville,$_GET['ndepot']));
}
header("location:depot.php?nomdepot=&size=20");

?>