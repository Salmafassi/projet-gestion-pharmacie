<?php 
require_once("identifier1.php");
require_once("connexion.php");
$idf=$_GET['idf'];
$requete="delete from comporter where nfacture='$idf'";
$connex->query($requete);
$requete1="delete from facture where N_facture='$idf'";
$connex->query($requete1);
header("location:listefacture.php?nomprenom=&datef=&size=20");


?>