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

 $libelle=isset($_GET['libelle'])?$_GET['libelle']:" ";

$requete="select * from medicament where libellé like '%$libelle%'   limit $size offset $offeset";
$connexselect=$connex->query($requete);
   
   $requete="select count(*) countl from medicament where libellé like '%$libelle%'  ";
   $connexcount=$connex->query($requete);
   $tab=$connexcount->fetch();
   $nbrmedica=$tab['countl'];

   $reste=$nbrmedica % $size;
   if($reste==0){
       $nbrpage=$nbrmedica/$size;
   }
   else{
       $nbrpage=floor($nbrmedica/$size)+1;
   }



?>


    <div class="right_col" role="main">
    <div class="container" >
       
    <div class="panel panel-success panel-fluid" style="margin-top:60px;height:120px;">
        <div class="panel-heading">Rechercher des médicaments..</div>
        <div class="panel-body">
           <form action="medicaments.php?libelle=<?= $libelle; ?>&amp;date=<?= $date; ?>" class="form-inline" method="get">
              <div class="form-group ">
              <input type="text" name="libelle" class="form-control " placeholder="tapez libellé médicament" style="width:250px;height:30px;font-size:13px;" value=<?= $libelle; ?>  >
                </div>
                &nbsp;&nbsp;
                
                <button type="submit" value="rechercher...." class="btn btn-success" style="width:90px;height:30px;font-size:12px;">
                <span class="glyphicon glyphicon-search"></span>  
                rechercher...</button>
                &nbsp;&nbsp;
               <a href="ajoutermedica.php" >
               <span class="glyphicon glyphicon-plus"></span>  
               nouveau medicament</a>
               <div style="margin-left:500px" >
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
    <div class="panel panel-primary " style="margin-top:60px">
        <div class="panel-heading"  style="background-color:#00d4ff;">Listes des médicaments(<?= $nbrmedica; ?>) </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                      <th>code medicament</th>
                      <th>libellé</th>
                      
                      <th>date d'expiration</th>
                      <th>famille</th>
                      <th>prix de vente</th>
                      <th>Stock Mini </th>
                      <th>Action</th>
                  </tr>  
               </thead>
                <tbody>
                    <?php 
                    while($ligne=$connexselect->fetch()){
                    ?>
                    <tr>
                        <td><?= $ligne['code']; ?></td>
                        <td><?= $ligne['libellé']; ?></td>
                        <td><?= $ligne['date_experation']; ?></td> 
                    <?php 
                    $a=$ligne['id_famille'];
                    $requete="select * from famiile where id_famille='$a'";
                    $select=$connex->query($requete);
                    $famille=$select->fetch()['libellé_famille'];
                    ?>    
                        <td><?= $famille; ?></td>
                        <td><?= $ligne['prixvente']; ?></td>
                        <td><?= $ligne['stockmini']; ?></td>
                        <td><a href="editmedicaments.php?idmedica=<?= $ligne['code']; ?> " ><span class="glyphicon glyphicon-edit"></span></a> &nbsp; <a onclick="return confirm('etes vous sur de vouloir supprimer');" href="supprissionmedica.php?id=<?= $ligne['code']; ?> " > <span class="glyphicon glyphicon-trash"></a></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                </table>
        </div>
        <div class="panel-footer">
                    <ul class="pagination pagination-lg justify-content-end ">
             <?php for($i=1; $i<=$nbrpage; $i++){  ?>       
      <li class="page-item <?php if($page==$i) echo 'active' ?> " ><a href="medicaments.php?libelle=<?= $libelle; ?>&amp;date=<?= $date; ?>&amp;page=<?= $i; ?>&amp;size=<?= $size; ?>" class="page-link" ><?= $i; ?></a></li>
             <?php } ?>
    </ul>
       </div>         

            
    </div>
</div>




             </div>
<!-- end content -->
<?php include("layout2.php"); ?>