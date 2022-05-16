

<?php 
require_once("identifier1.php");
include("layout1.php");
include("connexion.php");
$idclient=htmlspecialchars($_GET['idclient']);
$select=$connex->query("select * from client where id_client=$idclient");
$select=$select->fetch();

?>
<div class="right_col" role="main">

<div class="container-fluid">
    <div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">

    <div class="panel  " style="margin-top:60px;height:450px;width:700px;">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez editer les infos de client</div>
        <div class="panel-body">
        <form action="editaction1.php?idclient=<?= $_GET['idclient']; ?>"  method="post">
              <div class="form-group ">
                  <label for="nom">nom:</label>
                   <input type="text" name="name" class="form-control " value=<?= $select['nomComplet']; ?> style="height:40px;font-size:13px"> 
                </div>
            
                
                <div class="form-group ">
                <label for="email">email :</label>
                <input type="email" name="email" class="form-control" value=<?= $select['email']; ?> style="height:40px;font-size:13px"> 
                </div>
                <div class="form-group ">
                <label for="tel">telephone :</label>
                <input type="text" name="tel" class="form-control" value=<?= $select['telephone']; ?> style="height:40px;font-size:13px"> 
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