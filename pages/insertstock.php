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
      
      

          $qs=htmlspecialchars($_POST['qs']);
          
          $libelle=htmlspecialchars($_POST['libelle']);
          
          $nomdepot=htmlspecialchars($_POST['ndepot']);
   $requet1="select * from medica_stocké where ndepot='$nomdepot' and code_medica='$libelle'";
   $select1=$connex->query($requet1);
   $count=$select1->rowCount();
   if($count==0) {
       $requete2="insert into medica_stocké(ndepot,code_medica,QT_stocké,date) values (?,?,?,?) ";
       $select=$connex->prepare($requete2);
       $select2=$select->execute(array($nomdepot,$libelle,$qs,$date));

   } 
   else{
       $q=$select1->fetch()['QT_stocké']+$qs;
       $requete3="update medica_stocké set QT_stocké='$q' where ndepot='$nomdepot' and code_medica='$libelle' ";
       $select3=$connex->query($requete3);
   }   
         
 
      
  }
 header("location:stock.php?nomdepot=&libelle=&page=2&size=3");
 
 ?>