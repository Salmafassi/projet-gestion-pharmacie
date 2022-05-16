

<?php 
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$idlivré=htmlspecialchars($_GET['id_livré']);
$libelle=htmlspecialchars($_GET['libelle']);
$date_exp=htmlspecialchars($_GET['date_exp']);
$nomcomplet=htmlspecialchars($_GET['nomcomplet']);
$ql=htmlspecialchars($_GET['ql']);
$pa=htmlspecialchars($_GET['pa']);
$date=htmlspecialchars($_GET['date']);
$requete="select * from medicament ";
$requete1="select * from fournisseur";
$requete2="select * from calendrier";
$select=$connex->query($requete);
$select2=$connex->query($requete1);
$select3=$connex->query($requete2);
?>

<div class="right_col" role="main">
<div class="container-fluid">
    <div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">
    

    <div class="panel  " style="margin-top:60px;height:550px;width:700px;">
        <div class="panel-heading"  style="background-color:#00d4ff;">editer les données de livraison</div>
        <div class="panel-body">
        <form action="editaction4.php?id=<?= $idlivré; ?>"  method="post">
              <div class="form-group ">
                  <label for="ql">quantité livré:</label>
                   <input type="text" name="ql" class="form-control " value="<?= $ql; ?>" placeholder="tapez la quantité livrée" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="prixachat">prix d'achat:</label>
                   <input type="text" name="prixachat" class="form-control " value="<?= $pa; ?>" placeholder="tapez le prix d'achat" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="libelle">libellé medicament:</label>
                   <select name="libelle" id="">
                       <?php while($select1=$select->fetch()) { ?>
                        <option value="<?= $select1['code']; ?>" <?php if($select1['libellé']==$libelle) echo "selected"; ?>><?= $select1['libellé']; ?> </option>
                        <?php }?>
                   </select> 
                </div>
                <div class="form-group ">
                  <label for="prenom">nom de fournisseur:</label>
                   <select name="prenom" id="" width="50px">
                       <?php while($ligne1=$select2->fetch()) { ?>
                        <option value="<?= $ligne1['id_fournisseur']; ?>" <?php if($ligne1['nomComplet']==$nomcomplet) echo "selected"; ?>><?= $ligne1['nomComplet']; ?> </option>
                        <?php }?>
                   </select> 
                </div>
               
                
             
                <div class="form-group ">
                  <label for="date"> selectionner une date existante:</label>
                   <select name="date" id="">
                       <?php while($ligne2=$select3->fetch()) { ?>
                        <option value="<?= $ligne2['date']; ?>"  <?php if($ligne2['date']==$date) echo "selected"; ?>><?= $ligne2['date']; ?> </option>
                        <?php }?>
                   </select>

                   <a  data-toggle="collapse" data-target="#demo" class=" bg-warning"  style="height:25px;font-size:13px"  >choisir un nouveau date</a>
                   <div id="demo" class="collapse">
                     
                      <div class="form-group ">
                     
                        <label for="date1"> nouveau date:</label>
                        <input type="date" name="date1" class="form-control "  style="height:40px;font-size:13px" ><br><br> 
                        
                      
                      </div>
                   </div>
                </div>
                  
               
                <button type="submit" value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                
               
               
           </form>
        </div>
    </div>
    </div>
  </div> 
</div>
</div>
<?php  include("layout2.php");?>