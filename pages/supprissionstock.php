<?php
require_once("identifier1.php");
include("connexion.php");
$idstock=htmlspecialchars($_GET['id']);
$requete="delete from medica_stocké where id_stocké=$idstock";
$connex->query($requete);
header("location:stock.php?nomdepot=&libelle=&page=1&size=3");

?>