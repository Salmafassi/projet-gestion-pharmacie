
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
    

    <div class="panel  "  style="margin-top:60px;height:550px;width:700px;margin-left:350px">
        <div class="panel-heading"  style="background-color:#00d4ff;">Informations de l'utilisateur</div>
        <div class="panel-body">
        <?php if(!empty($message)){?>
        <div class="alert alert-success alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
              <div class="form-group ">
              
                  <label for="name">Nom Complet:</label>
                   <input type="text" name="name" class="form-control " value="<?= $name; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="email">email:</label>
                   <input type="text" name="email" class="form-control " value="<?= $email; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pharmacie">Pharmacie:</label>
                   <input type="text" name="pharmacie" class="form-control " value="<?= $pharmacie; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="login">Login:</label>
                   <input type="text" name="login" class="form-control " value="<?= $login; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd">Mot de passe:</label>
                   <input type="text" name="pwd" class="form-control " value="<?= $pwd; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                
                <div class="form-group ">
                  <label for="tel">telephone:</label>
                   <input type="text" name="tel" class="form-control " value="<?= $tel; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                
                <!-- <button  value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                 -->
               
               
           </form>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>