<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" > 
    <link rel="stylesheet" href="../css/bootstrap.css" > 
    <link rel="stylesheet" href="../css1/styleapp.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
 <script src="../js/jquery-3.3.1.js"></script> 
 <style type="text/css">
      table {
    margin: 18px 0;
    width: 100%;
    border-collapse: collapse;
}
table th,
table td {
    text-align: left;
    padding: 6px;
}
table,
th,
td {
    border: 1px solid #000;
}
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <title>Gestion pharmacie | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="navbar nav_title" style="">
            <img src="../images/logo5.png" class="img-fluid" style="width:170px;height:160px">
            </div>

            <div class="clearfix"></div>
             
            <!-- menu profile quick info -->
            <!-- <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div> -->
            <!-- /menu profile quick info -->

            <br /><br /><br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" href="index.php"><img src="../images/home.png" width="20" height="20" > &nbsp;&nbsp;&nbsp;Home </a>
                   
                  </li>

                  <li style="background-color:#00d4ff;"><a style="font-size:13px" ><img src="../images/medicine.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
   Médicaments <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="background-color:black;">
                      <li><a href="ajoutermedica.php" >Ajouter un médicament</a></li>
                      <li><a href="medicaments.php?libelle=&date=&size=20" >Liste des Médicaments</a></li>
                      <li><a href="stock.php?nomdepot=&libelle=&size=20">Consulter le stock</a></li>
                      
                      <!-- <li><a href="perimer.php">medicaments perimés</a></li> -->
                    </ul>
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" href="vente.php?nomprenom=&libelle=&date=&size=20"><img src="../images/shopping-bag.png" width="20" height="20" > &nbsp;&nbsp;&nbsp;Bon De Livraison </a>
                   
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" href="livraison.php?nomprenom=&libelle=&size=20"><img src="../images/shopping-cart.png" width="20" height="20" > &nbsp;&nbsp;&nbsp;Bon De Commande </a>
                   
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" ><img src="../images/customer.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
   Fournisseurs<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="background-color:black;">
                      <li><a href="nouveaufournisseur.php">Ajouter Fournisseur</a></li>
                      <li><a href="fournisseur.php?nomprenom=&size=20">Liste Des Fournisseurs</a></li>
                      
                    </ul>
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px"><img src="../images/clients.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
            Clients <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="background-color:black;">
                      <li><a href="nouveauclient.php">Ajouter  Client</a></li>
                      <li><a href="client.php?nomprenom=&size=20">Liste Des Clients</a></li>
                    </ul>
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px"><img src="../images/operations.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
            Opérations <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="background-color:black;">
                      <li><a href="achat.php">Entrés</a></li>
                      <li><a href="sortie.php">Sorties</a></li>
                      
                    </ul>
                  </li>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px"><img src="../images/facture.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
   Facture <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="background-color:black;">
                      <li><a href="ajouterfacture.php">Ajouter Facture</a></li>
                      <li><a href="listefacture.php?nomprenom=&datef=&size=20"> Liste des Factures</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li style="background-color:#00d4ff;"><a style="font-size:13px"><img src="../images/money.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
            Depot <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu"  style="background-color:black;">
                      <li><a href="nouveaudepot.php">Ajouter Depot</a></li>
                      <li><a href="depot.php?nomdepot=&size=20">Liste des Depots</a></li>
                      
                    </ul>
                  </li>
                  <?php $idu=$_SESSION['user']['id_utilisateur'];
                   
                  
                  ?>
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" href="parametre.php?idu=<?= $idu; ?>"><img src="../images/settings.png" width="20" height="20">&nbsp;&nbsp;&nbsp;
                  Paramètres </a>
                  
                                 
                 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login1.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
<!-- style="margin-right: 5px;margin-left:1050px" -->
<!-- style="display:none;" -->
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav " style="float:none;" >
              <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><?= $_SESSION['user']['nomComplet'];; ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown" >
                  <?php $idu=$_SESSION['user']['id_utilisateur'];?>
                    <a class="dropdown-item"  href="profile.php?idu=<?= $idu; ?>"> Profile</a>
                      <a class="dropdown-item"  href="parametre.php?idu=<?= $idu; ?>">
                        
                        <span>Settings</span>
                      </a>
                  
                    <a class="dropdown-item"  href="login1.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        