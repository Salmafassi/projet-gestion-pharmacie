<?php require_once("identifier1.php");
include("connexion.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />
  <link rel="stylesheet" href="../css1/styleapp.css"> 
    <title>Gestion pharmacie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
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
            
            <div class="navbar nav_title" style="border: 0;">
             <img src="../images/logo5.png" class="img-fluid" style="width:170px;height:160px;">
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
                  <li style="background-color:#00d4ff;"><a style="font-size:13px" href="vente.php?nomprenom=&date=&libelle=&size=20"><img src="../images/shopping-bag.png" width="20" height="20" > &nbsp;&nbsp;&nbsp;Bon De Livraison </a>
                   
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
                  <?php $idu=$_SESSION['user']['id_utilisateur']; ?>
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

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <?php $a=$_SESSION['user']['nomComplet'];?>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right" >
              <li class="nav-item dropdown " style="padding-left: 15px;">
                  <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/user.png" alt=""><?= $a; ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
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
        <!-- /top navigation -->
        <?php 
        $requete="select * from facture ";
        $select=$connex->query($requete);
        $sum=0;
        while($ligne=$select->fetch()){
          $sum+=$ligne['avance'];
        }
        $requete1="select * from client";
        $select1=$connex->query($requete1);
        $nbrclients=$select1->rowCount();
        $requete2="select * from fournisseur ";
        $select2=$connex->query($requete2);
        $nbrf=$select2->rowCount();
        $requete3="select * from medica_vendu ";
        $select3=$connex->query($requete3);
        $nbrv=$select3->rowCount();
        $requete="select * from medica_livré ";
        $select=$connex->query($requete);
        $nbra=$select->rowCount();
        $requete="select QT_stocké,stockmini from medicament as m ,medica_stocké as ms where ms.code_medica=m.code";
        $select=$connex->query($requete);
        $alert=0;
        while($ligne=$select->fetch()){
          if($ligne['QT_stocké']<=$ligne['stockmini'] && $ligne['QT_stocké']>0){
            $alert++;
          }
        }
        $a=date('y-m-d');
        $requete="select * from medica_vendu where date='$a' ";
        $select=$connex->query($requete);
        $nbrvj=$select->rowCount();
        $requete="select * from medica_livré where date='$a' ";
        $select=$connex->query($requete);
        $nbrlj=$select->rowCount();
        ?>
        <!-- page content -->
        <div class="right_col" role="main">
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">
        <div class="nav-item dropdown"></div>
        <ul class="navbar-nav overflow-hidden" role="tablist"></ul>
      </div>
      <div class="tab-content">
        <div class="tab-empty">
          <h2 class="text-center"  style="margin-top: 15px;font-size:45px;" > TABLEAU DE BORD</h2>
          <div class="row " style="margin-top:30px">
          <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             MONTANT PHARMACIE
             <div class="card-text "><?= $sum; ?></div>
           </div>
          <div class="card-footer">
          <a href="listefacture.php?nomprenom=&datef=&size=20">More info</a>
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             CLIENTS
             <div class="card-text "><?= $nbrclients; ?></div>
           </div>
          <div class="card-footer">
          <a href="client.php?nomprenom=&size=20">More info</a>
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             FOURNISSEURS
             <div class="card-text "><?= $nbrf; ?></div>
           </div>
          <div class="card-footer">
          <a href="fournisseur.php?nomprenom=&size=20">More info</a>
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             TOTAL VENTES
             <div class="card-text "><?= $nbrv; ?></div>
           </div>
          <div class="card-footer">
          <a href="vente.php?nomprenom=&libelle=&size=20">More info</a>
          </div>
        </div>
      </div>
      <div class="row" style="margin-top:100px">
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             TOTAL ACHATS
             <div class="card-text "><?= $nbra; ?></div>
           </div>
          <div class="card-footer">
          <a href="livraison.php?nomprenom=&libelle=&size=20">More info</a>
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             MEDICAMENTS EN ALERTE EN STOCK
             <div class="card-text "><?= $alert; ?></div>
           </div>
          <div class="card-footer">
          <a href="stock.php?nomdepot=&libelle=&size=20">More info</a>
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             VENTES JOURNALIERES
             <div class="card-text "><?= $nbrvj; ?></div>
           </div>
          <div class="card-footer">
            <?php $a=date('y-m-d');?>
            <a href="vente.php?nomprenom=&libelle=&size=20&datef=<?= $a; ?>&datef1=<?= $a; ?>">More info</a>
            
          </div>
        </div>
        </div>
        <div class="col-md-3" style="height:60px">
          <div class="card text-center text-white" style="width: 18rem;background-color:#00d4ff;">
           <div class="card-body ">
             LIVRAISONS JOURNALIERES
             <div class="card-text "><?= $nbrlj; ?></div>
           </div>
          <div class="card-footer">
          <a href="livraison.php?nomprenom=&libelle=&size=20&datef=<?= $a; ?>&datef1=<?= $a; ?>">More info</a>
          </div>
        </div>
        </div>

      </div>
        </div>
        </div>
      </div>
    </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
  </body>
</html>
