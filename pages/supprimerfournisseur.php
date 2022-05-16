<?php

require_once("identifier1.php");
require_once('connexion.php');
$connexstag=$connex->prepare("select * from medica_livré as mv where mv.idfournisseur=?");
$connexstag->execute(array($_GET['id']));


$connexsupprimer=$connex->prepare("delete from fournisseur where id_fournisseur=?");
$connexsupprimer->execute(array($_GET['id']));
header("location:fournisseur.php?nomprenom=&size=20");

 

?>