<?php 
require_once("identifier1.php");

include("layout1.php"); ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
         

<!-- endlayout1 -->

<?php 


require_once("connexion.php");
// if(isset($_GET['name'])){
//     $nomf=$_GET['name'];

// }else{
//     $nomf="";
// }
$size=isset($_GET['size'])?$_GET['size']:6;
$page=isset($_GET['page'])?$_GET['page']:1;
$offeset=($page-1)*$size;

$requete="select date_facture from facture ORDER BY date_facture";
$select=$connex->query($requete);
$a1=$select->fetch()['date_facture'][0];
$a=date('y-m-d');
 

 $date=isset($_GET['datef'])?htmlspecialchars($_GET['datef']):$a1;
 $date2=isset($_GET['datef1'])?htmlspecialchars($_GET['datef1']):$a;
$requete="select  N_facture,nomComplet,date_facture,nbrproduits,MTTC,type_paiement,avance,MHT from client as c, facture as f ,type_paiement as tp where ( c.id_client=f.idclient and f.id_paiement=tp.id_paiement )  and ( (f.date_facture between '$date' and '$date2' ) ) limit $size offset $offeset";
$requete1="select  N_facture,nomComplet,date_facture,nbrproduits,MTTC,type_paiement,avance,MHT from client as c, facture as f ,type_paiement as tp  where ( c.id_client=f.idclient and f.id_paiement=tp.id_paiement )  and ( (f.date_facture between '$date' and '$date2' ) ) ";

$connexselect=$connex->query($requete);
   
   $connexselect1=$connex->query($requete1);
   
   $nbrf=$connexselect1->rowCount();

   $reste=$nbrf % $size;
   if($reste==0){
       $nbrpage=$nbrf/$size;
   }
   else{
       $nbrpage=floor($nbrf/$size)+1;
   }



?>


    <div class="right_col" role="main">
    <div class="container">
   <div class="row"> 
       <div class="col-md-12 ">
    <div class="panel panel-success panel-fluid" style="margin-top:60px;height:120px">
        <div class="panel-heading">Rechercher les factures..</div>
        <div class="panel-body">
        
           <form action="listefacture.php?nomprenom=<?= $nomprenom; ?>&datef=<?= $date; ?>&datef1=<?= $date2; ?>" class="form-inline" method="get">
              
              
                &nbsp;&nbsp;
                <div class="form-group ">
                    <label for="">DE:</label>&nbsp;
              <input type="date" name="datef" class="form-control " style="width:250px;height:30px;font-size:13px;" value="<?= $date; ?>" >
                </div>
                &nbsp;&nbsp;
                <div class="form-group ">
                    <label for="">A: </label>&nbsp;
              <input type="date" name="datef1" class="form-control "  style="width:250px;height:30px;font-size:13px;"  value="<?= $date2; ?>" >
                </div>
                &nbsp;&nbsp;

                <button type="submit" value="rechercher...." class="btn btn-success" style="width:90px;height:30px;font-size:12px;">
                <span class="glyphicon glyphicon-search"></span>  
                rechercher...</button>
                &nbsp;&nbsp;
               <!-- <a href="nouvellevente.php" style="margin-left:10">
               <span class="glyphicon glyphicon-plus"></span>  
               nouvelle vente</a> -->
               <div style="margin-left:400px" >
                    afficher 
                        <select name="size" class="form-control"  onchange="this.form.submit()">
                    <option value="3" <?php if($size==="3") echo "selected";?>>3</option>
                    <option value="5" <?php if($size==="5") echo "selected";?>>5</option>
                    <option value="10" <?php if($size==="10") echo "selected";?>>10</option>
                    <option value="20" <?php if($size==="20") echo "selected";?>>20</option>
                
            
                      </select>
                      entites
                </div>
           </form>
        </div>
    
    </div>
    </div>
    </div>
    </div>
    <div class="panel  panel-fluid" style="margin-top:60px">
        <div class="panel-heading" style="background-color:#00d4ff;">Listes des factures (<?= $nbrf; ?>) factures
        
    </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                      <th>Numéro  Facture</th>
                      <th>Nom Client</th>
                      <th>Date Facture</th>
                      
                      <th>Produits Totaux</th>
                      <th>Montant HT</th>
                      <th>Montant TTC</th>
                      <th>Type de paiement</th>
                      <th>Montant réglé</th>
                      <th>Crédit</th>
                      <th>Action</th>
                  </tr>  
               </thead>
                <tbody>
                    <?php 
                    while($ligne=$connexselect->fetch()){
                    ?>
                    <tr>
                        <td class="text-center"><?= "F-".str_pad($ligne['N_facture'],7,"0",STR_PAD_LEFT); ?></td>
                        <td class="text-center"><?= $ligne['nomComplet']; ?></td>
                        <td class="text-center"><?= $ligne['date_facture']; ?></td>
                       
                        <td class="text-center"><?= $ligne['nbrproduits']; ?></td>
                        <td class="text-center"><?= $ligne['MHT']; ?></td>
                        <td class="text-center"><?= $ligne['MTTC']; ?></td>
                        <td class="text-center" style="font-size:15px">
                            <?php if($ligne['type_paiement']=="chèque"){
                                $color="label-warning";
                            }
                            elseif($ligne['type_paiement']=="espèce"){
                                $color="label-success";
                            }
                            else{
                                $color="label-primary";
                            }
                           ?>
                        <span class="label  <?= $color; ?>" width="30px"><?= $ligne['type_paiement']; ?></span>
                            
                        </td>
                        <td class="text-center"><?= $ligne['avance']; ?></td>
                        <?php $mp=($ligne['MTTC']-$ligne['avance']);?>
                        <td class="text-center"><?= $mp; ?></td>
                        <?php $idu=$_SESSION['user']['id_utilisateur']; ?>
                        <td class="text-center"><a href="pdf1.php?idf=<?= $ligne['N_facture']; ?>&amp;idu=<?= $idu; ?>" data-toggle="tooltip" title="print"><span class="glyphicon glyphicon-print"></span></a> &nbsp;<a href="payment.php?idf=<?= $ligne['N_facture']; ?>" data-toggle="tooltip" title="payer"><span class="glyphicon glyphicon-shopping-cart"></span></a> &nbsp;<a href="editfacture.php?nfacture=<?= $ligne['N_facture']; ?>" data-toggle="tooltip" title="edit"><span class="glyphicon glyphicon-edit"></span></a> &nbsp; <a onclick="return confirm('etes vous sur de vouloir supprimer');" href="supprissionfacture.php?idf=<?= $ligne['N_facture']; ?> " data-toggle="tooltip" title="supprimer"> <span class="glyphicon glyphicon-trash"></span></a></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                </table>
        </div>
        <div class="panel-footer">
                    <ul class="pagination pagination-lg justify-content-end ">
             <?php for($i=1; $i<=$nbrpage; $i++){  ?>       
      <li class="page-item <?php if($page==$i) echo 'active' ?> " ><a href="listefacture.php?nomprenom=<?= $nomprenom; ?>&amp;datef=<?= $date; ?>&amp;page=<?= $i; ?>&amp;size=<?= $size; ?>" class="page-link" ><?= $i; ?></a></li>
             <?php } ?>
    </ul>
       </div>         

            
    </div>
</div>




             </div>
<!-- end content -->
<?php include("layout2.php"); ?>