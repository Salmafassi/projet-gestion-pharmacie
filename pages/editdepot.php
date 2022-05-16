
<?php  
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$ndepot=htmlspecialchars($_GET['ndepot']);
$select=$connex->query("select * from depot where N_depot=$ndepot");
$select=$select->fetch();

?>
<div class="right_col" role="main">
<div class="container">
<div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">

    <div class="panel  " style="margin-top:60px;height:450px;width:700px;">

    
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez editer les infos de depot</div>
        <div class="panel-body">
        <form action="editaction3.php?ndepot=<?= $ndepot; ?>"  method="post">
              <div class="form-group ">
                  <label for="nom">nom de depot:</label>
                   <input type="text" name="nom" class="form-control " value=<?= $select['nom_depot']; ?> style="height:40px;font-size:13px"> 
                </div>
            
                <div class="form-group ">
                <label for="ville">ville :</label>
                <input type="text" name="ville" class="form-control" value=<?= $select['ville']; ?> style="height:40px;font-size:13px"> 
                </div>
                <button type="submit" value="edit" class="btn btn-success" name="edit"  style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                edit...</button>
                
               
               
           </form>
        </div>
    </div>
    </div>
    </div>
</div>
</div>
<?php  include("layout2.php");?>