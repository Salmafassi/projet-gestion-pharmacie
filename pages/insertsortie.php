<?php
 require_once("identifier1.php");
 require_once('connexion.php');
  
      if(isset($_GET['valider'])){
    
            $libelle=htmlspecialchars($_GET['li']);
            $nom=htmlspecialchars($_GET['nom']);
        
          $pv=htmlspecialchars($_GET['pv']);
          $q=htmlspecialchars($_GET['q']);
          $date=htmlspecialchars($_GET['date']);
          $depot=htmlspecialchars($_GET['depot']);
  $requete="select * from medica_stocké where ndepot='$depot' and code_medica='$libelle'";
  $select=$connex->query($requete);
  $qs=$select->fetch()['QT_stocké'];
  $requete1="select * from medicament where code='$libelle'";
    $select1=$connex->query($requete1);
    $date_exp=strtotime($select1->fetch()['date_experation']);
    $datecourant=strtotime(date('y-m-d'));
    if($datecourant>$date_exp){
      $message1="Désolée! le medicament est déjà périmé";
      header("Location:sortie.php?message1=$message1");
      exit;
    }
  if($qs>=$q){
      $nq=$qs-$q;
      $requete1="update medica_stocké set QT_stocké='$nq' where ndepot='$depot' and code_medica='$libelle' ";
      $select1=$connex->query($requete1);
      $requete2="insert into medica_vendu(QT_vendu,code_medica,idclient,date) values('$q','$libelle','$nom','$date')";
      $select2=$connex->query($requete2);
      $message="l'operation de sortie est réussi maintenant la quantité en stock de depot n ".$depot." devient ".$nq;
      header("location:sortief.php?message=$message&li=$libelle&nom=$nom&pv=$pv&q=$q&date=$date&depot=$depot");
  }
  else{
      $message1="Desole! le stock n'est pas suffisant"." il contient seulement ".$qs;
      header("location:sortie.php?message1=$message1");
  }
         
     }
 
 
 
 ?>