<?php

require_once("identifier1.php");
require_once('connexion.php');
$connexstag=$connex->prepare("select * from medica_vendu as mv where mv.idclient=?");
$connexstag->execute(array($_GET['id']));


$connexsupprimer=$connex->prepare("delete from client where id_client=?");
$connexsupprimer->execute(array($_GET['id']));
header("location:client.php?nomprenom=&size=20");

 

?>