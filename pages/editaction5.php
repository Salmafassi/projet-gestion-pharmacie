<?php
require_once("identifier1.php");
require_once('connexion.php');

    $qv=htmlspecialchars($_POST['qv']);
    
    $libelle=htmlspecialchars($_POST['libelle']);
    $prenom=htmlspecialchars($_POST['prenom']);
    $id=htmlspecialchars($_GET['id']);
    if(!empty($_POST['date1'])){
        $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date1'])));
         $requete2="insert into calendrier(date) values('$date')";
        $query_run=$connex->query($requete2);
        
    }
   
    else{
        $date=htmlspecialchars($_POST['date']);
    }
 $connexedit=$connex->prepare("update medica_vendu set QT_vendu=? , code_medica=?, idclient=?, date=? where id_vendu=?");
 $connexedit->execute(array($qv,$libelle,$prenom,$date,$id));

header("location:vente.php?nomprenom=&libelle=&size=20");

?>