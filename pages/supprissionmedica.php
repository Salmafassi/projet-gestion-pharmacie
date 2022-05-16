<?php 
require_once("identifier1.php");
require_once('connexion.php');
$idm=htmlspecialchars($_GET['id']);
$requete="delete from medicament where code='$idm'";
$select=$connex->query($requete);
header("location:medicaments.php?libelle=&date=&size=20");


?>