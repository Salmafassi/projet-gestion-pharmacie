<?php 
require_once("identifier1.php");
require_once('connexion.php');
$ndepot=htmlspecialchars($_GET['ndepot']);
$requete="delete from depot where N_depot='$ndepot'";
$select=$connex->query($requete);
header("location:depot.php?nomdepot=&size=20");


?>