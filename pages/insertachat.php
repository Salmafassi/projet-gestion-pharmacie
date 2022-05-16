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
       
            $libelle=htmlspecialchars($_POST['libelle']);
        
        
            $nom=htmlspecialchars($_POST['nom']);
        
          $pa=htmlspecialchars($_POST['pa']);
          $q=htmlspecialchars($_POST['q']);
         
         
          
          $nomdepot=htmlspecialchars($_POST['ndepot']);
   $requet1="select * from medica_stocké where ndepot='$nomdepot' and code_medica='$libelle'";
   $select1=$connex->query($requet1);
   $count=$select1->rowCount();
   if($count==0) {
       $requete2="insert into medica_stocké(ndepot,code_medica,QT_stocké,date) values (?,?,?,?) ";
       $select=$connex->prepare($requete2);
       $select2=$select->execute(array($nomdepot,$libelle,$q,$date));
        $qs=$q;
   } 
   else{
       $qt=$select1->fetch()['QT_stocké']+$q;
       $requete3="update medica_stocké set QT_stocké='$qt' where ndepot='$nomdepot' and code_medica='$libelle' ";
       $select3=$connex->query($requete3);
       $qs=$qt;
   }   
   $requete="insert into medica_livré(QT_livré,code_medica,idfournisseur,date,prixachat) values(?,?,?,?,?)";
 $insertf=$connex->prepare($requete);
 $insertf->execute(array($q,$libelle,$nom,$date,$pa));
 $requete1="select libellé from medicament where code='$libelle'";
 $select1=$connex->query($requete1);
 $li=$select1->fetch()['libellé'];    
 $message="congrats! vous ajoutez ".$q." unités de ".$li." dans le stock de depot N ".$nomdepot." la quantité totale devient ".$qs;
      
  }
 header("location:achat.php?message=$message");
 
 ?>