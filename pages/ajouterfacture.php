<?php 
 require_once("identifier1.php"); 
include("connexion.php");
 include("layout1.php");

$a=date('y-m-d');
$requete="select * from client ";
$requete2="select * from medicament";
$requete3="select * from type_paiement";
$select=$connex->query($requete);
$select2=$connex->query($requete2);
$select3=$connex->query($requete3);
$message=isset($_GET['message'])?$_GET['message']:"";
$message1=isset($_GET['message1'])?$_GET['message1']:"";
?>

<script type="text/javascript">
   $(document).ready(function() {
                        $("#medica").change(function() {
                          $.ajax({
                            url:'prixu.php',
                                              method:"POST",
                                              data:$("#medica").serialize(),
                                              success:function(r){
                                                 
                                              $("#depot option").remove();
                                             
                                              const data = JSON.parse(r);
                                                
                                                $("#prixu").val(data.prix);
                                                var newOptionSelect='';
                                                
                                                // if(typeof(data.nomdepot.length)!='number'){
                                                //   
                                                // }
                                                // else{
                                                  if(data.nomdepot[0]!=""){
                                                     for($i=0;$i<data.nomdepot.length;$i++){
                                                 
                                                   var newOptionSelect= '<option value='+data.depot[$i]+'>'+data.nomdepot[$i]+'</option>';
                                                $("#depot").append(newOptionSelect);
                                                
                                               }
                                                  }
                                                 else{
                                                   var a='<option>no depot disponible</option>';
                                               $("#depot").append(a); 
                                                 }
                                                // }
                                                  
                                                
                                               
                                                
                                               
                                              }
                                            });
                                            return false;
                    }); 
                  
                  }); 
                //   $("#medica").change(function() {
                //           $.ajax({
                //                              url:'depotselect.php',
                //                               method:"POST",
                //                               data:$("#medica").serialize(),
                //                               success:function(r){
                //                                 $("#depot").val(r);
                //                               }
                //                             });
                //                             return false;
                //                           }); 
                  
                // });
</script>
<div class="right_col" role="main">
<div class="container-fluid">
  <div class="row">
     <div class="col-md-8  col-sm-3 col-md-auto"> 
     
     
    <div class="panel panel-secondary panel-fluid" style="margin-top:60px;height:relative;width:1200px;">
        <div class="panel-heading">ajouter une facture</div>
        <?php $idu=$_SESSION['user']['id_utilisateur'];?>
        <form action="creefacture.php?idu=<?= $idu; ?>" method="post">
        <div class="panel-body">
          <?php if(!empty($message)){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
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
      
               <div class="form-group">
                <label for="" class="col-sm-12 col-md-3 offset-md-10 control-label" >date:<?php echo $a; ?></label>
            </div>
             <BR></BR>
             <div class="col-md-4 col-xs-12 pull pull-left">
            <div class="form-group">
              <label for="" class="col-sm-5 control-label" style="text-align:left;">N FACTURE:</label>  
                <input type="text" class="control-form" id="nfacture" placeholder="taper le numero de facture" name="nfacture" required>
            </div>
            </div>
            <div class="col-md-4 col-xs-12 pull pull-left">
              
            <label for="" class="col-sm-5 control-label" style="text-align:left;">Nom client</label>

            <div class="" >
                <select name="selectclient" id="" class="control-form" required>
                      <option value=""></option>
                       <?php  while($ligne=$select->fetch()){?>
                           <option value="<?= $ligne['id_client'];?>"><?= $ligne['nomComplet'];?></option>
                        <?php  } ?>
                </select>
            </div>
            
            <br>
                  <div class="form-group">
                  <label for="paiement" class="col-sm-5 control-label">Mode de paiement </label>
                  <div class="col-sm-7">
                      <select name="selectmp" id=" " style="height:20px;width:100px" required >
                      <?php  while($ligne=$select3->fetch()){?>
                           <option value="<?= $ligne['id_paiement'];?>"><?= $ligne['type_paiement'];?></option>
                        <?php  } ?>
                      </select>
                      
                    </div>
                  </div>
           </div>


           <!-- Editable table -->

  <div class="card-body " style="margin-top:100px">
    <div id="table" class="table-editable">
        <label for="">choisir un medicament :</label>
            
               <select name="medica" id="medica" class="control-form" required >
                      <option></option>
                       <?php  while($ligne=$select2->fetch()){?>
                           <option value="<?= $ligne['code'];?>"><?= $ligne['libellé'];?></option>
                        <?php  } ?>
                </select>
              
                la quantite:
                <input type="text" class="control-form" id="quantite" placeholder="choisir la quantite" name="quantite" required>
                <input type="text" id="prixu"  hidden>
                <div class="form-group" style="margin-left:100px">
                  <label for="depot">depot ciblé</label>
                <select name="depot" id="depot" class="control-form"  >
                    
                          <option value="">no depot disponible</option>
                       
                </select>
                </div>
                <input type="text" hidden >
                <script>
                
                    $(document).ready(function(){
                        $(".add").click(function() {
                       
                          var medicament = $("#medica option:selected").text();
                          var medicament1=$("#medica").val();
                            var quantite = $("#quantite").val();
                            var prixu=$("#prixu").val();
                            var total=eval(prixu*quantite);
                           var depot=$('#depot  option:selected').val();
                           var nomdepot=$('#depot  option:selected').text();
                            var ligne = "<tr><td class='text-center'><input type='checkbox' name='select'></td><td class='text-center'><input name='medicas[]'hidden value="+medicament1 +">"+medicament+"</td><td class='text-center' ><input name='quantites[]'hidden value="+quantite +">"+ quantite +"</td><td class='text-center' ><input name='depots[]'hidden value="+depot +">"+ nomdepot +"</td><td class='text-center'><input name='prixu[]'hidden value="+prixu +">"+prixu+"</td><td class='text-center total'><input name='total[]'hidden value="+total +">"+total+"</td></tr>";
                            $("table.test").append(ligne);
                           
                        });
                        $(".delete").click(function() {
                            $("table.test").find('input[name="select"]').each(function() {
                                if ($(this).is(":checked")) {
                                    $(this).parents("table.test tr").remove();
                                }
                            });
                         
                        });  
                     
                    $(".resultat").click(function() {
                       var sum=0;
                            
                             $('.total').each(function(){
                               sum+=parseFloat($(this).text());

                             });
                             $('#HT').val(sum);$('#H').val(sum);
                             var mt= $('#HT').val();
                             var tva=eval($('#HT').val()*0.2);
                             $('#tva').val(tva);$('#t').val(tva);
                             var remise=eval(($('#remise').val()*0.01)*$('#HT').val());
                             var avance=$('#avance').val();
                             var ttc=parseInt(mt)+parseInt(tva)-parseInt(remise);
                              $('#ttc').val(ttc); $('#tt').val(ttc);
                              var rest=parseInt(ttc)-parseInt(avance);
                               $('#reste').val(rest);$('#rest').val(rest);
                            
                      }); 
                    
                    $("#remise").keyup(function(){
                              
                              var mt=$('#HT').val();
                              var tva=$('#tva').val();
                              var avance=$('#avance').val();
                              var remise=eval(($('#remise').val()*0.01)*$('#HT').val());
                              var ttc=parseInt(mt)+parseInt(tva)-parseInt(remise); $('#ttc').val(ttc);$('#tt').val(ttc);
                              var rest=parseInt(ttc)-parseInt(avance);
                               $('#reste').val(rest);$('#rest').val(rest);
                              
                    });
                    $("#avance").keyup(function(){
                              
                             var ttc=$('#ttc').val();
                             var avance=$('#avance').val();
                             var reste=eval(ttc-avance);
                             $('#reste').val(reste);$('#rest').val(reste);
                              
                    });
                 });
                </script>
               <p></p>
                
      <span class="table-add float-right mb-3 mr-2" >
        
       <a href="#!" class="text-success add" >
         <span class="glyphicon glyphicon-plus " style="font-size:30px"  ></span></a >
     </span>
      <table class="table table-bordered table-responsive-md table-striped text-center test" id="test">
        <thead class="bg-warning">
          <tr>
            <th>Sélectionner</th>
            
            <th class="text-center">medicament</th>
            <th class="text-center">quantite</th>
            <th class="text-center">depot</th>
            <th class="text-center">prix unitaire</th>
            
            <th class="text-center">montant totatale</th>
            
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- <td class="pt-3-half" contenteditable="true">Aurelia Vega</td>
            <td class="pt-3-half" contenteditable="true">30</td>
            <td class="pt-3-half" contenteditable="true">Deepends</td>
            <td class="pt-3-half" contenteditable="true">Spain</td>
            <td class="pt-3-half" contenteditable="true">Madrid</td> -->
            
           
          </tr>
          <!-- This is our clonable table line -->
          <tr>
           
          </tr>
          <!-- This is our clonable table line -->
          <tr>
            
          </tr>
          <!-- This is our clonable table line -->
          <tr class="hide">
            
          </tr>
        </tbody>
      </table>
      <span class="table-remove"
                ><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 delete" style="width:90px;height:30px;font-size:13px">
                  Remove
                </button></span
              >
              <span class="float-right resultat"
                ><button type="button" class="btn btn-success btn-rounded btn-sm my-0 " style="width:90px;height:30px;font-size:13px" >
                  Resultat
                </button></span
              >

              <br><br>
              <div class="col-md-6 offset-md-6 col-xs-12">
                  <div class="form-group">
                  <label for="HT" class="col-sm-5 control-label" >Montant HT</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="HT"  disabled=""  autocomplete="off" value="0.00" style='height:35px'>
                      <input type="text" class="form-control"  id="H" name="Ht"  autocomplete="off" value="0.00" style='height:35px' hidden>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="tva" class="col-sm-5 control-label">TVA 20%</label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="tva"  disabled="" autocomplete="off" value="0.00" style="height:35px">
                      <input type="text" class="form-control" id="t" name="tva"  autocomplete="off" value="0.00" style="height:35px" hidden>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="remise" class="col-sm-5 control-label">Remise % </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="remise" name="remise" placeholder="Remise"  autocomplete="off"     value="0.00" style="height:35px">
                      
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Montant TTC </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="ttc" disabled="" autocomplete="off" value="0.00 "  style="height:35px">
                      <input type="text" class="form-control" id="tt" name="ttc"  autocomplete="off" value="0.00 "  style="height:35px" hidden>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Avance </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="avance" name="avance" autocomplete="off" value="0.00 " style="height:35px">
                      
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                  <label for="ttc" class="col-sm-5 control-label">Reste A Payer </label>
                  <div class="col-sm-7">
                      <input type="text" class="form-control" id="reste" disabled=""  autocomplete="off" value="0.00 "  style="height:35px">
                      <input type="text" class="form-control" id="rest" name="reste" autocomplete="off"  value="0.00" hidden style="height:35px">
                    </div>
                  </div>
                 
              </div>
              
              <button type="submit" class="btn btn-primary" name="facture" style="width:90px;height:30px;font-size:13px">créer facture</button>
                <a href="" class="btn btn-warning"  style="width:90px;height:30px;font-size:13px">Retour</a>
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