
<?php 
require_once("identifier1.php");
include("connexion.php");
 include("layout1.php");
 $idu=htmlspecialchars($_GET['idu'])?$_GET['idu']:"";
 $requete="select * from utilisateurs where id_utilisateur='$idu'";
 $select=$connex->query($requete);
 $tab=$select->fetch();
 $name=$tab['nomComplet'];
 $login=$tab['login'];
 $pwd=$tab['mot_de_passe'];
 $pharmacie=$tab['pharmacie'];
 $email=$tab['email'];
 $tel=$tab['telephone'];
 $message=isset($_GET['message'])?$_GET['message']:"";
?>
<div class="right_col" role="main">
    <div class="container">
    

    <div class="panel  "  style="margin-top:60px;height:750px;width:700px;margin-left:350px">
        <div class="panel-heading"  style="background-color:#00d4ff;">modification des informations de l'utilisateur</div>
        <div class="panel-body">
        <?php if(!empty($message)){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
              <div class="form-group ">
              <form action="modifierprofile.php" method="post">
                  <label for="name">Nom Complet:</label>
                  
                   <input type="text" name="name" class="form-control " value="<?= $name; ?>" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="email">email:</label>
                   <input type="text" name="email" class="form-control " value="<?= $email; ?>" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pharmacie">Pharmacie:</label>
                   <input type="text" name="pharmacie" class="form-control " value="<?= $pharmacie; ?>" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="login">Login:</label>
                   <input type="text" name="login" class="form-control " value="<?= $login; ?>" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd"> l'ancien mot de passe:</label>
                   <input type="text" disabled="" class="form-control " value="<?= $pwd; ?>" style="height:40px;font-size:13px" > 
                   <input type="text" name="pwd" class="form-control " value="<?= $pwd; ?>"  hidden style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="tel"> Téléphone:</label>
                   <input type="text" name="tel" class="form-control " value="<?= $tel; ?>" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd1"> nouveau mot de passe:</label>
                   <input type="password" name="pwd1" class="form-control " placeholder="saisissez le mot de passe" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd2">Confirmer le mot de passe:</label>
                   <input type="password" name="pwd2" class="form-control " placeholder="Confirmer le mot de passe" style="height:40px;font-size:13px" > 
                </div>
                
                <button  value="enregistrer" class="btn btn-success" name="edit" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                edit...</button>
                
               
               
           </form>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>