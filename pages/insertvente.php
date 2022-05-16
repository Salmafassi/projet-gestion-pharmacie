<?php
 require_once("identifier1.php");
 require_once('connexion.php');
  
  if(isset($_POST['enregistrer'])){
      
        if(isset($_POST['date1']) && !empty($_POST['date1'])){
            $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date1'])));
             $requete2="insert into calendrier(date) values('$date')";
            $query_run=$connex->query($requete2);
            
        }
       
        else{
            $date=htmlspecialchars($_POST['date']);
        }
      
      

          $qv=htmlspecialchars($_POST['qv']);
          $prixvente=htmlspecialchars($_POST['prixvente']);
          $libelle=htmlspecialchars($_POST['libelle']);
          
          $prenom=htmlspecialchars($_POST['prenom']);
          
         
 $requete="insert into medica_vendu(QT_vendu,code_medica,idclient,date,prixvente) values(?,?,?,?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($qv,$libelle,$prenom,$date,$prixvente));
      
  }
 header("location:vente.php");
 
 ?>