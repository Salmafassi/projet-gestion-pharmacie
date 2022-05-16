<?php
                require_once("identifier1.php");
                include("connexion.php");
                $a=$_POST['medica'];
                $requete="select * from medicament where code='$a' ";
                $requete1="select * from medica_stocké where code_medica='$a'";
                $select=$connex->query($requete);
                $select1=$connex->query($requete1);
                // $depot=$select1->fetch()['ndepot'];
                
                while($ligne=$select1->fetch()){
                    $depot[]=isset($ligne['ndepot'])?$ligne['ndepot']:"0";
                    $nd=$ligne['ndepot'];
                    $requete2="select * from depot where N_depot='$nd'";
                    $select2=$connex->query($requete2);
                    $tab=$select2->fetch();
                    $nomdepot[]=isset($tab['nom_depot'])?$tab['nom_depot']:"no depot disponible";
                }
                $prix1=$select->fetch();
                $prix=isset($prix1['prixvente'])?$prix1['prixvente']:"";
                
                $data["prix"] = $prix;
                $data["nomdepot"]=$nomdepot;
                
                $data["depot"]=$depot;
                
                echo json_encode($data);
                ?> 