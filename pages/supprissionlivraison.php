<?php
require_once("identifier1.php");
include("connexion.php");
$idlivraison=htmlspecialchars($_GET['id']);
$requete="delete from medica_livré where id_livré=$idlivraison";
$connex->query($requete);
header("location:livraison.php?nomprenom=&libelle=&size=20");

?>