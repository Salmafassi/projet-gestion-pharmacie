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
$requete="select date from medica_vendu ORDER BY date";
$select=$connex->query($requete);
$a1=$select->fetch()['date'][0];
$a=date('y-m-d');
 
 $date=isset($_GET['datef'])?htmlspecialchars($_GET['datef']):$a1;
 $date2=isset($_GET['datef1'])?htmlspecialchars($_GET['datef1']):$a;


$requete="select  id_vendu,nomComplet,libellé,date_experation,QT_vendu,prixvente,date from client as c, medicament as m, medica_vendu as mv where ( c.id_client=mv.idclient and m.code=mv.code_medica ) and (mv.date between '$date' and '$date2' ) limit $size offset $offeset";
$requete1="select id_vendu,nomComplet,libellé,date_experation,QT_vendu,prixvente,date from client as c, medicament as m, medica_vendu as mv where ( c.id_client=mv.idclient and m.code=mv.code_medica)  and ( mv.date between '$date' and '$date2')  ";

$connexselect=$connex->query($requete);
   
   $connexselect1=$connex->query($requete1);
   
   $nbrvente=$connexselect1->rowCount();

   $reste=$nbrvente % $size;
   if($reste==0){
       $nbrpage=$nbrvente/$size;
   }
   else{
       $nbrpage=floor($nbrvente/$size)+1;
   }



?>


    <div class="right_col" role="main">
    <div class="container">
   <div class="row"> 
       <div class="col-md-12 ">
    <div class="panel panel-success panel-fluid" style="margin-top:60px;height:120px">
        <div class="panel-heading">Rechercher les médicaments vendus..</div>
        <div class="panel-body">
           <form action="vente.php" class="form-inline" method="get">
              
              
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
        <div class="panel-heading"  style="background-color:#00d4ff;">Listes des ventes (<?= $nbrvente; ?>) ventes
        
    </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                      <th>libellé medicament</th>
                      <th>date d'experation</th>
                      <th>nom de client</th>
                      
                      <th>quantité vendue</th>
                      <th>prix de vente</th>
                      <th>date de vente</th>
                      <th>Action</th>
                  </tr>  
               </thead>
                <tbody>
                    <?php 
                    while($ligne=$connexselect->fetch()){
                    ?>
                    <tr>
                        <td><?= $ligne['libellé']; ?></td>
                        <td><?= $ligne['date_experation']; ?></td>
                        <td><?= $ligne['nomComplet']; ?></td>
                       
                        <td><?= $ligne['QT_vendu']; ?></td>
                        <td><?= $ligne['prixvente']; ?></td>
                        <td><?= $ligne['date']; ?></td>
                        <td><a href="editvente.php?id_vendu=<?= $ligne['id_vendu']; ?>&amp;libelle=<?= $ligne['libellé']; ?>&amp;date_exp=<?= $ligne['date_experation']; ?>&amp;nomcomplet=<?= $ligne['nomComplet']; ?>&amp;qv=<?= $ligne['QT_vendu']; ?>&amp;pv=<?= $ligne['prixvente']; ?>&amp;date=<?= $ligne['date']; ?>" ><span class="glyphicon glyphicon-edit"></span></a> &nbsp; <a onclick="return confirm('etes vous sur de vouloir supprimer');" href="supprissionvente.php?id=<?= $ligne['id_vendu']; ?> " > <span class="glyphicon glyphicon-trash"></span></a></td>
                        
                    </tr>
                    <?php } ?>
                    
                </tbody>
                </table>
        </div>
        <div class="panel-footer">
                    <ul class="pagination pagination-lg justify-content-end ">
             <?php for($i=1; $i<=$nbrpage; $i++){  ?>       
      <li class="page-item <?php if($page==$i) echo 'active' ?> " ><a href="vente.php?page=<?= $i; ?>&amp;size=<?= $size; ?>&amp;datef=<?= $date; ?>&amp;datef1=<?= $date2; ?>" class="page-link" ><?= $i; ?></a></li>
             <?php } ?>
    </ul>
       </div>         

            
    </div>
</div>




             </div>
<!-- end content -->
<?php include("layout2.php"); ?>