<?php
 
 require_once("identifier1.php");
 require_once('connexion.php');
  if(isset($_POST['enregistrer'])){
      if(!empty($_POST['name']) and !empty($_POST['ville']) ){
          $name=htmlspecialchars($_POST['name']);
          $ville=htmlspecialchars($_POST['ville']);
         
 $requete="insert into depot(nom_depot,ville) values(?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($name,$ville));
      }
  }
 header("location:depot.php");
 
 ?>