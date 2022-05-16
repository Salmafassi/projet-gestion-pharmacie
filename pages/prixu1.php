<?php
                require_once("identifier1.php");
                include("connexion.php");
                $a=$_POST['medica'];
                $requete="select * from medicament where code='$a' ";
                
                $select=$connex->query($requete);
                
                // $depot=$select1->fetch()['ndepot'];
                
               
                $prix1=$select->fetch();
                $prix=isset($prix1['prixvente'])?$prix1['prixvente']:"";
                
               echo $prix;
                ?> 