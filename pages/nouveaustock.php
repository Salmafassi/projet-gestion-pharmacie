<?php  
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$requete="select * from medicament ";
$requete1="select * from depot";
$requete2="select * from calendrier";
$select=$connex->query($requete);
$select2=$connex->query($requete1);
$select3=$connex->query($requete2);

?>
<div class="right_col" role="main">
    <div class="container">
    

    <div class="panel " style="margin-top:60px;height:550px;width:700px;margin-left:350px">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez saisir un nouveau stock</div>
        <div class="panel-body">
        <form action="insertstock.php"  method="post">
              <div class="form-group ">
                  <label for="qs">quantité stocké:</label>
                   <input type="text" name="qs" class="form-control " placeholder="tapez la quantité stockée" style="height:40px;font-size:13px" > 
                </div>
                
                <div class="form-group ">
                  <label for="libelle">libellé medicament:</label>
                   <select name="libelle" id="">
                       <?php while($select1=$select->fetch()) { ?>
                        <option value="<?= $select1['code']; ?>"><?= $select1['libellé']; ?> </option>
                        <?php }?>
                   </select> 
                </div>
                <div class="form-group ">
                  <label for="ndepot">Numero de depot:</label>
                   <select name="ndepot" id="" width="50px">
                       <?php while($ligne1=$select2->fetch()) { ?>
                        <option value="<?= $ligne1['N_depot']; ?>"><?= $ligne1['nom_depot']; ?> </option>
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
                  
               
                <button type="submit" value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                
               
               
           </form>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>