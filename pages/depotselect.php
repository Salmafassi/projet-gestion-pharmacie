<?php
                include("identifier1.php");
                include("connexion.php");
                $a=$_POST['medica'];
                $requete="select * from medica_stocké where code_medica='$a' ";
                $select=$connex->query($requete);
                $depot=$select->fetch();
                $p=$depot['ndepot'];
                foreach($p as $value){
                    $requete="select * from depot where N_depot='$value'";
                    $select=$connex->query($requete);
                    $nomdepot=$select->fetch()['nom_depot'];
                    echo $nomdepot;
                }
                ?> 