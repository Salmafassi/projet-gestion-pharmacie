<?php
require_once("identifier1.php");
include("connexion.php");
$idvente=htmlspecialchars($_GET['id']);
$requete="delete from medica_vendu where id_vendu=$idvente";
$connex->query($requete);
header("location:vente.php?nomprenom=&libelle=&size=20");

?>