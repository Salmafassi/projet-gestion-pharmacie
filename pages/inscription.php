<?php

$message=isset($_GET['message'])?$_GET['message']:"";

?>


<html>
<head>
 <meta charset="utf-8">
 <title>se connecter</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css" >   
</head>
<body>
    

<div class="right_col" role="main">
  <div class="container">
    <div class="row">
     <div class="col-md-6 offset-3 mx-auto">
    <div class="panel panel-primary " style="margin-top:60px;height:700px;width:700px;">
        <div class="panel-heading"  >veuillez saisir votre infos</div>
        <div class="panel-body">
        <?php if(!empty($message)){?>
        <div class="alert alert-danger alert-dismissible" role="alert">
      <strong><?= $message; ?></strong>  
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>

         </button>
         
          </div>  
               <?php } ?>
        <form action="insertutilisateur.php"  method="post">
              <div class="form-group ">
                  <label for="nomc">Nom complet:</label>
                   <input type="text" name="name" class="form-control " placeholder="tapez votre nom complet" style="height:40px;font-size:13px" > 
                </div>
                
                <div class="form-group ">
                  <label for="email">Email:</label>
                   <input type="email" name="email" class="form-control " placeholder="tapez email" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pharmacie">Nom de Pharmacie:</label>
                   <input type="text" name="pharmacie" class="form-control " placeholder="tapez le nom de pharmacie" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="login">Login:</label>
                   <input type="text" name="login" class="form-control " placeholder="tapez login" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd">Password:</label>
                   <input type="password" name="pwd" class="form-control " placeholder="tapez le mot de passe" style="height:40px;font-size:13px" > 
                </div>
                <div class="form-group ">
                  <label for="pwd1">Confirmer votre mot de passe:</label>
                   <input type="password" name="pwd1" class="form-control " placeholder="tapez  de nouveau le mot de passe" style="height:40px;font-size:13px" > 
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
</body>
</html>
