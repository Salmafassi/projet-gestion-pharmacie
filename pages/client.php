<?php 
include("identifier1.php");
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

 $nomprenom=isset($_GET['nomprenom'])?$_GET['nomprenom']:" ";

$requete="select * from client where nomComplet like '%$nomprenom%'  limit $size offset $offeset";
$connexselect=$connex->query($requete);
   
   $requete="select count(*) countc from client where (nomComplet like '%$nomprenom%' ) ";
   $connexcount=$connex->query($requete);
   $tab=$connexcount->fetch();
   $nbrclient=$tab['countc'];

   $reste=$nbrclient % $size;
   if($reste==0){
       $nbrpage=$nbrclient/$size;
   }
   else{
       $nbrpage=floor($nbrclient/$size)+1;
   }



?>


    <div class="right_col" role="main">
    <div class="container" >
       
    <div class="panel panel-success panel-fluid" style="margin-top:60px;height:120px;">
        <div class="panel-heading">Rechercher des clients..</div>
        <div class="panel-body">
           <form action="client.php" class="form-inline" method="get">
              <div class="form-group ">
              <input type="text" name="nomprenom" class="form-control " placeholder="tapez le nom et prenom" style="width:250px;height:30px;font-size:13px;" value=<?= $nomprenom; ?>  >
                </div>
               &nbsp;&nbsp;
               
                <button type="submit" value="rechercher...." class="btn btn-success" style="width:90px;height:30px;font-size:12px;">
                <span class="glyphicon glyphicon-search"></span>  
                rechercher...</button>
                &nbsp;&nbsp;
               <a href="nouveauclient.php" style="margin-left:10;margin-right:600px">
               <span class="glyphicon glyphicon-plus"></span>  
               nouveau client</a>
               <div style="float:none" >
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
        <div class="panel-heading"  style="background-color:#00d4ff;">Listes des clients(<?= $nbrclient; ?>) clients</div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                      <th>id_client</th>
                      <th>nom de client</th>
                      
                      <th>telephone</th>
                      <th>email</th>
                      
                      <th>Action</th>
                  </tr>  
               </thead>
                <tbody>
                    <?php 
                    while($ligne=$connexselect->fetch()){
                    ?>
                    <tr>
                        <td><?= $ligne['id_client']; ?></td>
                        <td><?= $ligne['nomComplet']; ?></td>
                        
                        <td><?= $ligne['telephone']; ?></td>
                        <td><?= $ligne['email']; ?></td>
                        <td><a href="editclient.php?idclient=<?= $ligne['id_client']; ?> " ><span class="glyphicon glyphicon-edit"></span></a> &nbsp; <a onclick="return confirm('Être-vous sûr de vouloir supprimer ce client? \n Attention! tous les ventes et les factures liées à ce client vont être supprimer');" href="supprissionclient.php?id=<?= $ligne['id_client']; ?> " > <span class="glyphicon glyphicon-trash"></a></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                </table>
        </div>
        <div class="panel-footer">
                    <ul class="pagination pagination-lg justify-content-end ">
             <?php for($i=1; $i<=$nbrpage; $i++){  ?>       
      <li class="page-item <?php if($page==$i) echo 'active' ?> " ><a href="client.php?nomprenom=<?= $nomprenom; ?>&amp;page=<?= $i; ?>&amp;size=<?= $size; ?>" class="page-link" ><?= $i; ?></a></li>
             <?php } ?>
    </ul>
       </div>         

            
    </div>
</div>




             </div>
<!-- end content -->
<?php include("layout2.php"); ?>