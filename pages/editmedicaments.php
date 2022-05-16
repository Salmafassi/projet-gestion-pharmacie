

<?php
require_once("identifier1.php");  
include("layout1.php");
include("connexion.php");
$idmedica=htmlspecialchars($_GET['idmedica']);
$select=$connex->query("select * from medicament where code='$idmedica'");
$select=$select->fetch();
$requete2="select * from famiile ";
$select2=$connex->query($requete2);
$message1=isset($_GET['message1'])?$_GET['message1']:"";
$message2=isset($_GET['message2'])?$_GET['message2']:"";
?>
<div class="right_col" role="main">

<div class="container-fluid">
    <div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">

    <div class="panel  " style="margin-top:60px;height:560px;width:700px;">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez editer les infos de medicament</div>
        <div class="panel-body">
        <?php if(!empty($message1)){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
      <strong><?= $message1; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
               <?php if(!empty($message2)){?>
        <div class="alert alert-success alert-dismissible" role="alert">
      <strong><?= $message2; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
        <form action="editmedicament.php"  method="post">
              <div class="form-group ">
                  <label for="code2">code médicament:</label>
                   <input type="text" name="code2" class="form-control " value="<?= $idmedica; ?>" style="height:40px;font-size:13px"> 
                   <input type="text" name="code1"  value="<?= $idmedica; ?>"  hidden>
                </div>
            
                
                <div class="form-group ">
                <label for="libellé ">libellé :</label>
                <input type="text" name="libellé" class="form-control" value="<?= $select['libellé']; ?>" style="height:40px;font-size:13px"> 
                </div>
                <div class="form-group ">
                <label for="date">date d'expiration :</label>
                <input type="date" name="date" class="form-control" value="<?= $select['date_experation']; ?>" style="height:40px;font-size:13px"> 
                </div>
                <div class="form-group ">
                <label for="famille">famille:</label>
               
                  <select name="famille" >
                      <?php while($ligne=$select2->fetch()){?>
                         <option value="<?= $ligne['id_famille']; ?>" <?php  if($ligne['id_famille']==$select['id_famille']) echo "selected"?>><?= $ligne['libellé_famille']; ?></option>
                        <?php } ?>
                  </select>
                </div>
                <div class="form-group ">
                <label for="pv">prix de vente:</label>
                <input type="text" name="pv" class="form-control" value="<?= $select['prixvente']; ?>" style="height:40px;font-size:13px"> 
                </div>
                <div class="form-group ">
                <label for="sm">Stock Mini:</label>
                <input type="text" name="sm" class="form-control" value="<?= $select['stockmini']; ?>" style="height:40px;font-size:13px"> 
                </div>
                <button type="submit" value="edit" class="btn btn-success" name="edit"  style="height:30px;font-size:13px;margin-left:300px">
                <span class="glyphicon glyphicon-save"></span>  
                edit...</button>
                
               
               
           </form>
        </div>
    </div>
    </div>
</div>
</div>
</div>
<?php  include("layout2.php");?>