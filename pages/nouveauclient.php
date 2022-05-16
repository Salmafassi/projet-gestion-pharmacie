<?php 
require_once("identifier1.php");
include("layout1.php");?>
<div class="right_col" role="main">
  <div class="container-fluid">
    <div class="row">
     <div class="col-md-6 offset-md-3 col-sm-3 col-md-auto">
    <div class="panel  " style="margin-top:60px;height:400px;width:700px;">
        <div class="panel-heading"  style="background-color:#00d4ff;">veuillez saisir les donnees de nouveau client</div>
        <div class="panel-body">
        <form action="insertclient.php"  method="post">
              <div class="form-group ">
                  <label for="nom">nom:</label>
                   <input type="text" name="name" class="form-control " placeholder="tapez le nom de client" style="height:40px;font-size:13px" > 
                </div>
                
                <div class="form-group ">
                  <label for="email">email:</label>
                   <input type="email" name="email" class="form-control " placeholder="tapez email" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="telephone">tel:</label>
                   <input type="text" name="telephone" class="form-control " placeholder="tapez le numero de telephone" style="height:40px;font-size:13px" > 
                </div>
                
                <button type="submit" value="enregistrer" class="btn btn-success" name="enregistrer" style="height:30px;font-size:13px">
                <span class="glyphicon glyphicon-save"></span>  
                enregistrer...</button>
                
               
               
           </form>
          </div>
        </div>
    </div>
    </div> 
</div>
</div>
<?php  include("layout2.php");?>