<?php 
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");

$message=isset($_GET['message'])?$_GET['message']:"";
$li=isset($_GET['li'])?$_GET['li']:"";
$nom=isset($_GET['nom'])?$_GET['nom']:"";
$q=isset($_GET['q'])?$_GET['q']:"";
$pv=isset($_GET['pv'])?$_GET['pv']:"";
$date=isset($_GET['date'])?$_GET['date']:"";
$depot=isset($_GET['depot'])?$_GET['depot']:"";
// $libelle=isset($_GET['li'])?$_GET['li']:"";
?>
<div class="right_col" role="main">
<div class="container-fluid">
      <div class="row">
         <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto"> 

    <div class="panel  " style="margin-top:60px;height:620px;width:600px;">
        <div class="panel-heading"  style="background-color:#00d4ff;"> valider facture</div>
        <div class="panel-body">
        <?php if(!empty($message)){?>
        <div class="alert alert-success alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
        <form action="validerfacture.php"  method="post">
       
           
        <div class="form-group ">
                                <label for="li">libellé medicament :</label>
                                <?php $requete="select * from medicament where code='$li'";
                                      $select=$connex->query($requete);
                                      $medica=$select->fetch()['libellé'];
                                ?>
                                <input type="text"  name="li" class="form-control " value="<?= $medica; ?>" readonly style="height:40px;font-size:13px" > 
                                <input type="text"  name="code" class="form-control " hidden value="<?= $li; ?> " style="height:40px;font-size:13px" > 
                </div>
        <div class="form-group ">
                                <label for="q">quantité :</label>
                                <input type="text"  name="q" class="form-control " value="<?= $q; ?> " readonly style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <label for="nom">nom de client :</label>
                                <?php 
                                $requete="select * from client where id_client='$nom'";
                                $select=$connex->query($requete);
                                $nomclient=$select->fetch()['nomComplet'];
                                ?>
                                <input type="text"   name="nomclient" class="form-control " value="<?= $nomclient; ?> "  readonly style="height:40px;font-size:13px" > 
                                <input type="text"   name="nom" class="form-control "  hidden value="<?= $nom; ?> " style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <label for="pv">prix de vente :</label>
                                <input type="text"  name="pv" class="form-control " value="<?= $pv; ?> " readonly style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <label for="date">date :</label>
                                <input type="text" name="date" class="form-control "  value="<?= $date; ?> " readonly style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <label for="depot">depot :</label>
                                <?php 
                                  $requete="select * from depot where N_depot='$depot'";
                                  $select=$connex->query($requete);
                                  $nomdepot=$select->fetch()['nom_depot'];
                                ?>
                                <input type="text" name="nomdepot" class="form-control "  value="<?= $nomdepot; ?> " readonly style="height:40px;font-size:13px" > 
                                <input type="text" name="depot" class="form-control " hidden value="<?= $depot; ?> " style="height:40px;font-size:13px" >
                </div>
               
                
               
                <button type="submit" value="valider" class="btn btn-success" name="valider" style="height:30px;font-size:13px;margin-left:60px">
                <span class="glyphicon glyphicon-save"></span>  
                valider la facture...</button>
                
              
                <a href="sortie.php" class="btn btn-warning"  style="width:90px;height:30px;font-size:13px;float:right;margin-left:5px">Retour</a>
               
               
           </form>
           
           </div>
        </div>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>