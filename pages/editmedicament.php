<?php
require_once("identifier1.php");
require_once('connexion.php');

    $anciencode=htmlspecialchars($_POST['code1']);
    $nouveaucode=htmlspecialchars($_POST['code2']);
    $libelle=htmlspecialchars($_POST['libellé']);
    $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date'])));
    $famille=htmlspecialchars($_POST['famille']);
    $pv=htmlspecialchars($_POST['pv']);
    $sm=htmlspecialchars($_POST['sm']);
     if($nouveaucode!=$anciencode){
    $requete="select * from medicament where code='$nouveaucode'";
    $select=$connex->query($requete);
    if($select->rowCount()>0){
   
        $message1="ce code est déjà existe entrez un nouveau code";
        $code=$anciencode;
        header("location:editmedicaments.php?message1=$message1&idmedica=$code");
    } 
    else{
        $requete1="update medicament set code='$nouveaucode' ,libellé='$libelle' ,date_experation='$date' ,id_famille='$famille' ,prixvente='$pv', stockmini='$sm' where code='$anciencode'";
        $select1=$connex->query($requete1);
        $message2="la modification des données est effectuée avec succès";
        $code=$nouveaucode;
        header("location:editmedicaments.php?message2=$message2&idmedica=$code");
    }

}
    else{
        $requete1="update medicament set code='$nouveaucode' ,libellé='$libelle' ,date_experation='$date' ,id_famille='$famille' ,prixvente='$pv', stockmini='$sm' where code='$anciencode'";
        $select1=$connex->query($requete1);
        $message2="la modification des données est effectuée avec succès";
        $code=$nouveaucode;
        header("location:editmedicaments.php?message2=$message2&idmedica=$code");
    }
   
   


?>