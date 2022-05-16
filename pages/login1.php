<?php 
session_start();
if(isset($_SESSION['error'])){
    $message=$_SESSION['error'];
    
}
else{
    $message="";
}
session_destroy();
?>
<html>
<head>
 <meta charset="utf-8">
 <title>se connecter</title>
 <link rel="stylesheet" href="../css/bootstrap.min.css" >   
</head>
<body>
 <style>
     body{
         background-image: url("../images/ph2.jpg");
         background-color: #cccccc;
         background-size:cover;
     }
 </style>   
<div class="container " >
 <div class="col-md-4 col-md-offset-2">

    <div class="panel  " style="margin-top:180px;width:600px" >
        <div class="panel-heading text-center" style="background-color:#00d4ff;" >se connecter</div>
        <div class="panel-body">
        <form action="seconnecter1.php"  method="post">
              <div class="form-group ">
                  <?php  if($message!=""){ ?>
                  <div class="alert alert-danger"><?= $message; ?></div>
                  <?php } ?>
                  <label for="login">login:</label>
                   <input type="text" name="login" class="form-control "  > 
                </div>
            
                <div class="form-group ">
                <label for="pwd">mot de passe :</label>
                <input type="password" name="pwd" class="form-control"  > 
                </div>
                <button type="submit"  class="btn btn-success" name="connexion">
                <span class="glyphicon glyphicon-log-in"></span>  
                se connecter</button>
                <button   class="btn btn-warning" name="sign_up" style="float:right">
                <a href="inscription.php">sign up</a></button>
               
               
           </form>
        </div>
    </div>
                  </div>
</div>
</body>

</html>