<?php 
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$requete="select * from medicament ";
$requete1="select * from depot";
$requete2="select * from calendrier";
$requete3="select * from client";
$select=$connex->query($requete);
$select2=$connex->query($requete1);
$select3=$connex->query($requete2);
$select4=$connex->query($requete3);
$message=isset($_GET['message'])?$_GET['message']:"";
$message1=isset($_GET['message1'])?$_GET['message1']:"";
// $libelle=isset($_GET['li'])?$_GET['li']:"";
?>
<script type="text/javascript">
   $(document).ready(function() {
                        $("#medica").change(function() {
                          $.ajax({
                                              url:'prixu1.php',
                                              method:"POST",
                                              data:$("#medica").serialize(),
                                              success:function(r){
                                
                                                
                                                $("#prixu").val(r);$("#prix").val(r);
                                           
                                                
                                                
                                              }
                                            });
                                            return false;
 


                    }); 
                  
                  }); 
             
</script>
    
<div class="right_col" role="main">
    <div class="container-fluid">
      <div class="row">
         <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto"> 

    <div class="panel  " style="margin-top:60px;height:500px;width:700px;">
   
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez saisir un nouveau sortie</div>
        <div class="panel-body">
        <?php if(!empty($message)){?>
        <div class="alert alert-success alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
               <?php if(!empty($message1)){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
      <strong><?= $message1; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
        <form action="depotsortie.php"  method="post">
               
        
                <div class="form-group ">
                  <label for="libelle">libellé medicament:</label>
                   <select name="medica" id="medica">
                       <?php while($select1=$select->fetch()) { ?>
                        <option value="<?= $select1['code']; ?>"><?= $select1['libellé']; ?> </option>
                        <?php }?>
                   </select> 
                </div>
                <div class="form-group ">
                                <label for="q">quantité :</label>
                                <input type="text" name="q" class="form-control " value="" placeholder="tapez la quantité " style="height:40px;font-size:13px" required> 
                </div>
                <div class="form-group ">
                                <label for="pv">le prix de vente :</label>
                                <input type="text"  class="form-control "  disabled="" id="prixu" style="height:40px;font-size:13px" > 
                                <input type="text" name="pv" class="form-control "  hidden id="prix" style="height:40px;font-size:13px" >
                              </div>
                <div class="form-group ">
                  <label for="nom">nom de client:</label>
                   <select name="nom" id="">
                       <?php while($select1=$select4->fetch()) { ?>
                        <option value="<?= $select1['id_client']; ?>"><?= $select1['nomComplet']; ?> </option>
                        <?php }?>

                   </select> 
                </div>
                
               
           
                
             
                <div class="form-group ">
                  <label for="date"> selectionner une date existante:</label>
                   <select name="date" id="">
                       <?php while($ligne2=$select3->fetch()) { ?>
                        <option value="<?= $ligne2['date']; ?>"><?= $ligne2['date']; ?> </option>
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
                  
               
                <button type="submit" value="continue" class="btn btn-success" name="continue" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                continue...</button>
                
               
               
           </form>
           
   
    
        </div>
    </div>
    </div>
</div> 
</div>
</div>
<?php  include("layout2.php");?>