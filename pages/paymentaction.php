<?php 
require_once("identifier1.php");
require_once("connexion.php");
$idf=htmlspecialchars($_POST['code']);
$avance=htmlspecialchars($_POST['mr']);
$requete="update facture set avance='$avance' where N_facture='$idf'";
$select=$connex->query($requete);
$message="le réglement de facture est effectué avec succés";
header("location:payment.php?message=$message&idf=$idf");

?>