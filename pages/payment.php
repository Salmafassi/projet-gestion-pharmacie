
<?php 
require_once("identifier1.php");
include("connexion.php");
 include("layout1.php");
$idf=isset($_GET['idf'])?$_GET['idf']:"";
$requete="select * from facture where N_facture='$idf'";
$select=$connex->query($requete);
$tab=$select->fetch();
$mht=$tab['MHT'];
$mttc=$tab['MTTC'];
$avance=$tab['avance'];
$reste=$mttc-$avance;
$message=isset($_GET['message'])?$_GET['message']:"";
?>
<script>
    $(document).ready(function(){
    $("#avance").keyup(function(){
                              
                              var ttc=$('#ttc').val();
                              var avance=$('#avance').val();
                              var reste=eval(ttc-avance);
                              $('#reste').val(reste);$('#rest').val(reste);
                               
                     });
                    });
</script>
<div class="right_col" role="main">
    <div class="container">
    
   
    <div class="panel "  style="margin-top:60px;height:550px;width:700px;margin-left:350px">
        <div class="panel-heading text-center"  style="background-color:#00d4ff;">veuillez solder la facture</div>
        <div class="panel-body">
        <?php 
            if(!empty($message)){?>
              <div class="alert alert-success alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div> 
        
           <?php }?>
        <form action="paymentaction.php"  method="post">
              <div class="form-group ">
             
                  <label for="code">Numero de facture:</label>
                   <input type="text"  class="form-control " value="<?= $idf; ?>" disabled="" style="height:40px;font-size:13px" > 
                   <input type="text" name="code" hidden class="form-control "  value="<?= $idf; ?>"  style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="mht">Montant HT:</label>
                   <input type="text" name="mht" class="form-control " value="<?= $mht; ?>" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="mttc">Montant TTC:</label>
                   <input type="text" name="mttc" class="form-control " value="<?= $mttc; ?>"id="ttc" disabled="" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="mr">Montant Réglé:</label>
                   <input type="text" name="mr" class="form-control " value="<?= $avance; ?>" id="avance" style="height:40px;font-size:13px" > 
                   
                </div>
                <div class="form-group ">
                <label for="reste">Reste A Payer:</label>
                   <input type="text"  class="form-control " value="<?= $reste; ?>" id="reste"  disabled="" style="height:40px;font-size:13px" > 
                   <input type="text" name="reste" class="form-control " value="<?= $reste; ?>" id="rest" hidden  style="height:40px;font-size:13px" > 
                </div>
                </div>

                <button type="submit" value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px;margin-left:300px" >
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                
               
               
           </form>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>