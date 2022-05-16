<?php
require_once("identifier1.php");
require_once('connexion.php');

    $ql=htmlspecialchars($_POST['ql']);
    $prixachat=htmlspecialchars($_POST['prixachat']);
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
 $connexedit=$connex->prepare("update medica_livré set QT_livré=? , code_medica=?, idfournisseur=?, date=? ,prixachat=? where id_livré=?");
 $connexedit->execute(array($ql,$libelle,$prenom,$date,$prixachat,$id));

header("location:livraison.php?nomprenom=&libelle=&size=20");

?>