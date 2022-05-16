
<?php 
require_once("identifier1.php");
include("connexion.php");
 include("layout1.php");
$requete="select * from famiile ";
$select=$connex->query($requete);
$message=isset($_GET['message'])?$_GET['message']:"";
?>
<div class="right_col" role="main">
    <div class="container">
    

    <div class="panel  "  style="margin-top:60px;height:550px;width:700px;margin-left:350px">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez saisir les donnees de nouveau medicament</div>
        <div class="panel-body">
        <form action="insertmedicament.php"  method="post">
              <div class="form-group ">
                <?php if(!empty($message)){?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                  <strong><?= $message; ?></strong>  
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                    
                      </div>  
                      <?php } ?>
                  <label for="code">code de medicament:</label>
                   <input type="text" name="code" class="form-control " placeholder="tapez le code" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="libellé">libellé:</label>
                   <input type="text" name="libellé" class="form-control " placeholder="tapez libellé de medicament" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="date_expiration">date d'expiration:</label>
                   <input type="date" name="date_expiration" class="form-control " placeholder="tapez date d'expiration" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="prixvente">prix unitaire de vente:</label>
                   <input type="text" name="prixvente" class="form-control " placeholder="tapez le prix souhaité" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="stockm">Stock Mini:</label>
                   <input type="text" name="stockm" class="form-control " placeholder="tapez le stock mini" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="famille"> famille de medicament:</label>
                   <select name="famille" id="" width="50px">
                       <?php while($ligne=$select->fetch()) { ?>
                        <option value="<?= $ligne['id_famille']; ?>"><?= $ligne['libellé_famille']; ?> </option>
                        <?php }?>
                   </select> 
                </div>
                
                <button type="submit" value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                
               
               
           </form>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>