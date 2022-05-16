<?php
 require_once("identifier1.php");
 require_once('connexion.php');
  if(isset($_POST['enregistrer'])){
      if(!empty($_POST['code']) and !empty($_POST['libellé']) and !empty($_POST['date_expiration']) and !empty($_POST['famille']) and !empty($_POST['prixvente'])  ){
          $code=htmlspecialchars($_POST['code']);
          $libellé=htmlspecialchars($_POST['libellé']);
          $date_exp=date('y-m-d',strtotime(htmlspecialchars($_POST['date_expiration'])));
          $prixvente=htmlspecialchars($_POST['prixvente']);
          $famille=htmlspecialchars($_POST['famille']);
          $stockm=htmlspecialchars($_POST['stockm']);
 $requete="insert into medicament(code,libellé,date_experation,id_famille,prixvente,stockmini) values(?,?,?,?,?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($code,$libellé,$date_exp,$famille,$prixvente,$stockm));
 header("location:medicaments.php");
      }
      else{
          $message="veuillez entrer tous les champs";
           header("location:ajoutermedica.php?message=$message");
      }
  }

 
 ?>