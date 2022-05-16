<?php 
include("identifier1.php");
include("layout1.php");
include("connexion.php");
$li=htmlspecialchars($_POST['medica']);

$nom=htmlspecialchars($_POST['nom']);
$pv=htmlspecialchars($_POST['pv']);
$q=htmlspecialchars($_POST['q']);
if(!empty($_POST['date1'])){
    $date=date('y-m-d',strtotime(htmlspecialchars($_POST['date1'])));
    $requete2="select * from calendrier where date='$date'";
    $select2=$connex->query($requete2);
    if($select2->rowCount()==0){
         $requete2="insert into calendrier(date) values('$date')";
    $connex->query($requete2);
    }
    
    
}

else{
    $date=htmlspecialchars($_POST['date']);
}


$requete="select * from depot where N_depot in (select ndepot from medica_stocké where code_medica='$li')";
$select=$connex->query($requete);

?>

<div class="right_col" role="main">
<div class="container-fluid">
      <div class="row">
         <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto"> 

    <div class="panel  " style="margin-top:60px;height:260px;width:600px;">
        <div class="panel-heading"  style="background-color:#00d4ff;"> veuillez saisir le depot cible</div>
        <div class="panel-body">
        
        <form action="insertsortie.php"  method="get">
       
           
        <div class="form-group ">
                                <!-- <label for="li">libellé medicament :</label> -->
                                <input type="text" hidden name="li" class="form-control " value="<?= $li; ?> " style="height:40px;font-size:13px" > 
                </div>
        <div class="form-group ">
                                <!-- <label for="q">quantité :</label> -->
                                <input type="text"hidden  name="q" class="form-control " value="<?= $q; ?> " style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <!-- <label for="nom">nom :</label> -->
                                <input type="text"  hidden name="nom" class="form-control " value="<?= $nom; ?> " style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <!-- <label for="pv">prix de vente :</label> -->
                                <input type="text" hidden name="pv" class="form-control " value="<?= $pv; ?> " style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                                <!-- <label for="date">date :</label> -->
                                <input type="text" name="date" class="form-control " hidden value="<?= $date; ?> " style="height:40px;font-size:13px" > 
                </div>
               
               
                <div style="margin-top:60px">
                <div class="form-group " >
                  <label for="depot">voici liste des depots qui contiennent le medicament veuillez choisir un depot:</label>
                   <select name="depot" id="">
                       <?php while($select1=$select->fetch()) { ?>
                        <option value="<?= $select1['N_depot']; ?>"><?= $select1['nom_depot']; ?> </option>
                        <?php }?>
                   </select> 
                 </div>
                </div>
                </div>  
               
                <button type="submit" value="valider" class="btn btn-success" name="valider" style="height:30px;font-size:13px;margin-left:30px">
                <span class="glyphicon glyphicon-save"></span>  
                valider...</button>
                <?php $a=$_SERVER['HTTP_REFERER'];?>
              
                <a href="<?= $a; ?>" class="btn btn-warning"  style="width:90px;height:30px;font-size:13px;float:right;margin-left:5px">Retour</a>
               
               
           </form>
           
           </div>
        </div>
        </div>
    </div>
     
</div>
</div>
<?php  include("layout2.php");?>