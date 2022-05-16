<?php
 require_once("identifier1.php");
 require_once('connexion.php');
  if(isset($_POST['enregistrer'])){
      if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['telephone'])){
          $name=htmlspecialchars($_POST['name']);
          
          $email=htmlspecialchars($_POST['email']);
          $tel=htmlspecialchars($_POST['telephone']);
 $requete="insert into client(nomComplet,email,telephone) values(?,?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($name,$email,$tel));
      }
  }
 header("location:client.php?nomprenom=&size=20");
 
 ?>