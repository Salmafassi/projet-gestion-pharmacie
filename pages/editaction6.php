<?php
require_once("identifier1.php");
require_once('connexion.php');

    $qs=htmlspecialchars($_POST['qs']);
    
    $libelle=htmlspecialchars($_POST['libelle']);
    $nomdepot=htmlspecialchars($_POST['nomdepot']);
    $id=htmlspecialchars($_GET['id']);
    if(!empty($_POST['date1'])){
        $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date1'])));
         $requete2="insert into calendrier(date) values('$date')";
        $query_run=$connex->query($requete2);
        
    }
   
    else{
        $date=htmlspecialchars($_POST['date']);
    }
 $connexedit=$connex->prepare("update medica_stocké set QT_stocké=? , code_medica=?, ndepot=?, date=? where id_stocké=?");
 $connexedit->execute(array($qs,$libelle,$nomdepot,$date,$id));

header("location:stock.php?nomdepot=&libelle=&page=1&size=3");

?>