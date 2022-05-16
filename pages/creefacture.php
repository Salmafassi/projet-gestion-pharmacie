<?php 
 require_once("identifier1.php"); 
 require_once("connexion.php");
 
 $a=date('y-m-d');
 $requete="select * from calendrier where date='$a'";
 $select=$connex->query($requete);
 if($select->rowCount()==0){
   $requete1="insert into calendrier set date='$a'";
   $select1=$connex->query($requete1);
 }
 $nfacture=htmlspecialchars($_POST['nfacture']);
 $nomclient=htmlspecialchars($_POST['selectclient']);
 $tp=htmlspecialchars($_POST['selectmp']);
$reste=htmlspecialchars($_POST['reste']);
 $avance=htmlspecialchars($_POST['avance']);
 $ht=htmlspecialchars($_POST['Ht']);
 $tva=htmlspecialchars($_POST['tva']);
 $ttc=htmlspecialchars($_POST['ttc']);
 $remise=htmlspecialchars($_POST['remise']);
 $m=$_POST['medicas'];
 $quantite=$_POST['quantites'];
 $prixu=$_POST['prixu'];
 $total=$_POST['total'];
 $depots=$_POST['depots'];
 $requete="select * from facture where N_facture='$nfacture'";
 $select=$connex->query($requete);
 
 if($select->rowCount()>0){
   $message="ce code de facture est déjà existe choisissez un autre code";
   header("Location:ajouterfacture.php?message=$message");
   exit;
 }
 for($i=0;$i<count($m);$i++){
    $nd=$depots[$i];
    $q=$quantite[$i];
    $code=$m[$i];
    $requete="select * from medica_stocké where ndepot='$nd' and code_medica='$code' ";
    $select=$connex->query($requete);
    $qs=$select->fetch()['QT_stocké'];
    $requete1="select * from medicament where code='$code'";
    $select1=$connex->query($requete1);
    $date_exp=strtotime($select1->fetch()['date_experation']);
    $datecourant=strtotime(date('y-m-d'));
    if($datecourant>$date_exp){
      $message="Désolée! le medicament est déjà périmé";
      header("Location:ajouterfacture.php?message1=$message");
      exit;
    }
    if($qs<$q){
      $requete="select * from depot where N_depot='$nd'";
      $select=$connex->query($requete);
      $nomdepot=$select->fetch()['nom_depot'];
      $message="Désolée! la quantité en stock de depot ".$nomdepot." n'est suffisante il contient seulement ".$qs. " veuillez saisir de nouveau";
      header("Location:ajouterfacture.php?message1=$message");
      exit;
    }
   
 }
 
 for($i=0;$i<count($m);$i++){
  $nd=$depots[$i];
  $q=$quantite[$i];
  $code=$m[$i];
  $requete="select * from medica_stocké where ndepot='$nd' and code_medica='$code' ";
  $select=$connex->query($requete);
  $qs=$select->fetch()['QT_stocké'];
  
  $nqs=$qs-$q;
  $requete="update medica_stocké  set QT_stocké='$nqs'  where ndepot='$nd' and code_medica='$code' ";
  $select=$connex->query($requete);
}


include("layout1.php");
$nbrproduct=count($m);

$requete3="insert into `facture` (`N_facture`, `date_facture`, `idclient`, `nbrproduits`, `MHT`, `id_paiement`, `remise`,`avance`,`MTTC`) values('$nfacture','$a','$nomclient','$nbrproduct','$ht','$tp','$remise','$avance','$ttc')";
$select3=$connex->query($requete3);
for($i=0;$i<count($m);$i++){
 $code=$m[$i];
 $nd=$depots[$i];

  $requete1="insert into `comporter` (`quantite`,`nfacture`,`code_medica`,`depot`) values('$quantite[$i]','$nfacture','$code','$nd')";
  $select1=$connex->query($requete1);
  $requete4="insert into medica_vendu(`QT_vendu`,`code_medica`,`idclient`,`date`) values('$quantite[$i]','$code','$nomclient','$a')";
  $select4=$connex->query($requete4);
}
$requete5="select * from client where id_client='$nomclient'";
$select5=$connex->query($requete5);
$client=$select5->fetch()['nomComplet'];
$requete6="select * from type_paiement where id_paiement='$tp'";
$select6=$connex->query($requete6);
$t_p=$select6->fetch()['type_paiement'];
$ut=isset($_GET['idu'])?$_GET['idu']:"";
?>

<div class="right_col" role="main">
<div class="container-fluid">
  <div class="row">
     <div class="col-md-9  col-sm-3 col-md-auto"> 
     <div class="alert alert-success alert-dismissible" role="alert">
      <strong>la facture est crée avec succés</strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>
    <div class="panel panel-secondary panel-fluid" style="margin-top:60px;height:relative;width:1200px;">
        <div class="panel-heading" style="font-weight:bold;font-size:20px">FACTURE : <?= $nfacture; ?></div>
        
        <hr weight="150px">
        <form action="pdf.php" method="post">
        <div class="panel-body">
          <input type="text" value="<?= $nfacture; ?>" hidden name="nfacture">
            <div class="form-group">
                <label for="" class="col-sm-12 col-md-3 offset-md-10 control-label" >date:<?php echo $a; ?></label>
                <input type="text" value=<?= $a; ?> hidden name="date">
            </div>

            <div class="col-md-6 col-xs-12 pull pull-left">
            <?php 
              $requete3="select * from utilisateurs where id_utilisateur='$ut'";
              $select3=$connex->query($requete3);
              $pharmacie=$select3->fetch()['pharmacie'];

?>
            <div class="form-group">
            <label for="" class="col-sm-8 control-label" style="text-align:left;">Pharmacie: <?= $pharmacie; ?> </label>
            <input type="text" value="<?= $pharmacie; ?>" name="ph"  hidden>
            </div> 
            <br>
            <div class="form-group">
            <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Nom client: <?= $client; ?> </label>
            <input type="text" value="<?= $client; ?>" name="client" hidden >
            </div>
            
            <br>
            
            <div class="form-group">
            <label for="" class="col-sm-8 control-label" style="text-align:left;">Type paiement: <?= $t_p; ?> </label>
            <input type="text" value="<?= $t_p; ?>" name="tp"  hidden>
            </div> 
            <br>
           
           </div>


           <!-- Editable table -->

  <div class="card-body " style="margin-top:100px">
    <div id="table" class="table-editable">
      <table class="table table-bordered table-responsive-md table-striped text-center test" id="test">
        <thead class="bg-warning">
          <tr>
            
            
            <th class="text-center">medicament</th>
            <th class="text-center">quantite</th>
            <th class="text-center">prix unitaire</th>
            <th class="text-center">montant totatale</th>
            
            
          </tr>
        </thead>
        <tbody>
          <tr>
         <?php for($i=0;$i<count($m);$i++){?>
              <tr>
                <?php $requete="select * from medicament where code='$m[$i]'";
                $select=$connex->query($requete);
                $libelle=$select->fetch()['libellé'];
                ?>
                <td class="text-center" ><input name='libelle[]' value="<?= $libelle; ?>" hidden ><?= $libelle; ?></td>
                <td class="text-center"><input name='quantite[]' value="<?= $quantite[$i]; ?>" hidden><?= $quantite[$i]; ?></td>
                <td class="text-center"><input name='prixu[]' value="<?= $prixu[$i]; ?>" hidden><?= $prixu[$i]; ?></td>
                <td class="text-center"><input name='total[]' value="<?= $total[$i]; ?>" hidden><?= $total[$i]; ?></td>
              </tr>
            <?php } ?>
          </tr>
        </tbody>
      </table>
      
              

              <br><br>
              <div class="col-md-6 offset-md-6 col-xs-12">
                  <div class="form-group">
                  <label for="HT" class="col-sm-5 control-label" >Montant HT</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control"   disabled=""  autocomplete="off" value="<?= $ht; ?>" style='height:35px'>
                      <input type="text" class="form-control"  name="Ht" autocomplete="off" hidden value="<?= $ht; ?>" style='height:35px'>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="tva" class="col-sm-5 control-label">TVA 20%</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control"   disabled="" autocomplete="off" value="<?= $tva; ?>" style="height:35px">
                      <input type="text" class="form-control"  name="tva"  autocomplete="off" hidden value="<?= $tva; ?>" style="height:35px">
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="remise" class="col-sm-5 control-label">Remise % </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control"  placeholder="Remise"   disabled=""   autocomplete="off" value="<?= $remise; ?>" style="height:35px">
                      <input type="text" class="form-control" name="remise" placeholder="Remise"  hidden  autocomplete="off" value="<?= $remise; ?>" style="height:35px">
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Montant TTC </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control"  disabled="" autocomplete="off" value="<?= $ttc; ?> "  style="height:35px">
                      <input type="text" class="form-control" id="ttc" name="ttc" hidden autocomplete="off" value="<?= $ttc; ?> "  style="height:35px">
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Avance </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control"  disabled="" autocomplete="off" value="<?= $avance; ?>" style="height:35px">
                      <input type="text" class="form-control" id="avance" name="avance" hidden autocomplete="off" value="<?= $avance; ?>" style="height:35px">
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Reste A Payer </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="reste" disabled=""  autocomplete="off" value="<?= $reste; ?> "  style="height:35px">
                      <input type="text" class="form-control" id="rest" name="reste" autocomplete="off"  value="<?= $reste; ?> " hidden style="height:35px">
                    </div>
                  </div>
              </div>
              <?php $a=$_SERVER['HTTP_REFERER'];?>
              <button type="submit" class="btn btn-primary" style="width:90px;height:30px;font-size:13px" name="imprimer">imprimer</button>
                <a href="<?= $a; ?>" class="btn btn-warning"  style="width:90px;height:30px;font-size:13px">Retour</a>
    </div>
  </div>

<!-- Editable table -->
                  </form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php  include("layout2.php");?>