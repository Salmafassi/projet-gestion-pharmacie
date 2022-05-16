<?php include("layout1.php"); ?>
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

 $nomdepot=isset($_GET['nomdepot'])?$_GET['nomdepot']:" ";
 $libelle=isset($_GET['libelle'])?$_GET['libelle']:" ";

$requete="select  libellé,date_experation,QT_stocké,nom_depot,ville from depot as d, medicament as m, medica_stocké as ms where ( d.N_depot=ms.ndepot and m.code=ms.code_medica)  and (d.nom_depot like '$nomdepot%' )and (m.libellé like '%$libelle%')   limit $size offset $offeset";
$requete1="select libellé,date_experation,QT_stocké,nom_depot,ville from depot as d, medicament as m, medica_stocké as ms where ( d.N_depot=ms.ndepot and m.code=ms.code_medica)  and (d.nom_depot like '$nomdepot%' )and (m.libellé like '%$libelle%')   ";

$connexselect=$connex->query($requete);
   
   $connexselect1=$connex->query($requete1);
   
   $nbrstock=$connexselect1->rowCount();

   $reste=$nbrstock % $size;
   if($reste==0){
       $nbrpage=$nbrstock/$size;
   }
   else{
       $nbrpage=floor($nbrstock/$size)+1;
   }



?>


    <div class="right_col" role="main">
    <div class="container">
   <div class="row"> 
       <div class="col-md-12 ">
    <div class="panel panel-success " style="margin-top:60px;height:120px">
        <div class="panel-heading">Rechercher les médicaments stockés..</div>
        <div class="panel-body">
           <form action="stock.php" class="form-inline" method="get">
              <div class="form-group ">
              <input type="text" name="nomdepot" class="form-control " placeholder="tapez le nom et prenom de depot"style="width:250px;height:30px;font-size:13px;" value=<?= $nomdepot; ?>  >
                </div>
               &nbsp;&nbsp;
               <div class="form-group ">
              <input type="text" name="libelle" class="form-control " placeholder="tapez libelle medicament" style="width:250px;height:30px;font-size:13px;"  value=<?= $libelle; ?>  >
                </div>
                &nbsp;&nbsp;
                <button type="submit" value="rechercher...." class="btn btn-success" style="width:90px;height:30px;font-size:12px;">
                <span class="glyphicon glyphicon-search"></span>  
                rechercher...</button>
                &nbsp;&nbsp;
               <a href="nouveaustock.php" style="margin-left:10">
               <span class="glyphicon glyphicon-plus"></span>  
               nouveau entrée</a>
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
    <div class="panel panel-primary " style="margin-top:60px">
        <div class="panel-heading">Liste des médicaments stockées (<?= $nbrstock; ?> éléments stockés)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                      <th>libellé medicament</th>
                      <th>nom de depot</th>
                      <th>ville</th>
                      
                      <th>quantité stocké</th>
                      <th>date_premier_stockage</th>
                      <th>date d'expiration</th>
                      <th>disponibilité</th>
                      <th>Action</th>
                  </tr>  
               </thead>
                <tbody>
                    <?php 
                    while($ligne=$connexselect->fetch()){
                    ?>
                    <tr>
                        <td><?= $ligne['libellé']; ?></td>
                        <td><?= $ligne['nom_depot']; ?></td>
                        <td><?= $ligne['ville']; ?></td>
                       
                        <td><?= $ligne['QT_stocké']; ?></td>
                        <td><?= $ligne['date']; ?></td>
                        <td ><?php 
                        $datecourant=strtotime(date('y-m-d'));
                        $date_exp=strtotime($ligne['date_experation']);
                        if($datecourant>$date_exp){
                            echo "périmé";
                        }else{
                            echo $ligne['date_experation'];
                        } 
                        ?>
                         </td>
                        <?php if($ligne['QT_stocké']==0){
                            $color="red";
                            
                        }
                        else{
                           $color="green";
                             
                        } ?>
                        <td style="background-color:<?= $color; ?>"><?php if($ligne['QT_stocké']==0){
                            
                            echo "non disponible";
                        }
                        else{
                           
                            echo "disponible"; 
                        } ?></td>
                        <td><a href="editstock.php?id_stocké=<?= $ligne['id_stocké']; ?>&amp;libelle=<?= $ligne['libellé']; ?>&amp;date_exp=<?= $ligne['date_experation']; ?>&amp;nomdepot=<?= $ligne['nom_depot']; ?>&amp;qs=<?= $ligne['QT_stocké']; ?>&amp;ville=<?= $ligne['ville']; ?>&amp;date=<?= $ligne['date']; ?>" ><span class="glyphicon glyphicon-edit"></span></a> &nbsp; <a onclick="return confirm('etes vous sur de vouloir supprimer');" href="supprissionstock.php?id=<?= $ligne['id_stocké']; ?> " > <span class="glyphicon glyphicon-trash"></span></a></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                </table>
        </div>
        <div class="panel-footer">
                    <ul class="pagination pagination-lg justify-content-end ">
             <?php for($i=1; $i<=$nbrpage; $i++){  ?>       
      <li class="page-item <?php if($page==$i) echo 'active' ?> " ><a href="stock.php?nomdepot=<?= $nomdepot; ?>&amp;libelle=<?= $libelle; ?>&amp;page=<?= $i; ?>&amp;size=<?= $size; ?>" class="page-link" ><?= $i; ?></a></li>
             <?php } ?>
    </ul>
       </div>         

            
    </div>
</div>




             </div>
<!-- end content -->
<?php include("layout2.php"); ?>