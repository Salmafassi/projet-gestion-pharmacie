

<?php  
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$idvendu=htmlspecialchars($_GET['id_vendu']);
$libelle=htmlspecialchars($_GET['libelle']);
$date_exp=htmlspecialchars($_GET['date_exp']);
$nomcomplet=htmlspecialchars($_GET['nomcomplet']);
$qv=htmlspecialchars($_GET['qv']);
$pv=htmlspecialchars($_GET['pv']);
$date=htmlspecialchars($_GET['date']);
$requete="select * from medicament ";
$requete1="select * from client";
$requete2="select * from calendrier";
$select=$connex->query($requete);
$select2=$connex->query($requete1);
$select3=$connex->query($requete2);
?>
<div class="right_col" role="main">
    <div class="container-fluid">
    <div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">

    <div class="panel  " style="margin-top:60px;height:400px;width:700px;">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez editer la vente</div>
        <div class="panel-body">
        <form action="editaction5.php?id=<?= $idvendu; ?>"  method="post">
              <div class="form-group ">
                  <label for="qv">quantité vendu:</label>
                   <input type="text" name="qv" class="form-control " value="<?= $qv; ?>" placeholder="tapez la quantité vendue" style="height:40px;font-size:13px" > 
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
                  <label for="prenom">nom de client:</label>
                   <select name="prenom" id="" width="50px">
                       <?php while($ligne1=$select2->fetch()) { ?>
                        <option value="<?= $ligne1['id_client']; ?>" <?php if($ligne1['nomComplet']==$nomcomplet) echo "selected"; ?>><?= $ligne1['nomComplet']; ?> </option>
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