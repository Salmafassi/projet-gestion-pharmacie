<?php
 require_once("identifier1.php");
 require_once('connexion.php');
  
  if(isset($_POST['enregistrer'])){
      
        if(isset($_POST['date1'])){
            $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date1'])));
             $requete2="insert into calendrier(date) values('$date')";
            $query_run=$connex->query($requete2);
            
        }
       
        else{
            $date=htmlspecialchars($_POST['date']);
        }
      
      

          $ql=htmlspecialchars($_POST['ql']);
          $prixachat=htmlspecialchars($_POST['prixachat']);
          $libelle=htmlspecialchars($_POST['libelle']);
          
          $prenom=htmlspecialchars($_POST['prenom']);
          
         
 $requete="insert into medica_livré(QT_livré,code_medica,idfournisseur,date,prixachat) values(?,?,?,?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($ql,$libelle,$prenom,$date,$prixachat));
      
  }
 header("location:livraison.php");
 
 ?>