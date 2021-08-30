<?php 
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
   $Init = substr($_SESSION['user']['nom'], 0,1);
 ?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Gestion Stock</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="40x40" href="assets/images/ficon.png">
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
<!--                             <img src="assets/images/logo-icon1.png" alt="homepage" class="dark-logo" />
 -->                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-icon1.png" width="60" height="60" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
<!--                             <img src="assets/images/logoGSt.png" alt="homepage" class="dark-logo" />
 -->                            <!-- Light Logo text -->
                            <img src="assets/images/logoGSt.png" width="130" height="60" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                                href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                                    class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link text-muted waves-effect waves-dark pro-pic" href="rooter.php?page=panier">
                                    <strong class="text-center" ><i class="mdi mdi-cart text-center"></i><span class="text-danger" id="nbP"> 0</span></strong>
                                </a>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span style="background-color: white; display: block; width: 40px; height: 40px;border: 2px solid white;margin-top: 10px; border-radius: 40px;"><h1 style="color: black; text-transform: uppercase; margin-top: -3px; margin-left:6px"><?=$Init?></h1></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    Mon Profil</a>
                                <a class="dropdown-item" href="pages/deco.php"><i class="mdi mdi-logout"></i>
                                    Déconnexion</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include 'partial/menu.php';?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-5">
                        <h4 class="page-title">Tableau de bord</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="rooter.php">Accueil</a></li>
                                    <?php
                                     include 'partial/affiche.php';
                                    ?>
                                    <li class="breadcrumb-item active" aria-current="page"><?=$msg?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
               
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <?php include 'partial/contenu.php'; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
              
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
             
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                Designed and Developed by <a
                    href="#" style="font-family: cursive;">Mr_Martial</a>.<a href="#" style="text-decoration: none; color: gray"> !!!</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/jquery.dataTables.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="dist/js/pages/dashboards/dashboard1.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
                $('.btnsupp').click(function (e) {
                    e.preventDefault();
                    if (confirm("Voulez-vous supprimer cet élément?")) {
                        window.location.href = $(this).attr('href');
                        //alert($(this).attr('href'));
                    }
                });
                // UNE FONCTION .CLICK
                addToCart(); //appel de la fonction
                function addToCart(){
                    $('.add').click(function(e){
                        e.preventDefault(); //bloqué l'action par defaut
                       //alert($(this).attr('href')); //afficher ce qui se trouve dans le href
                       $.ajax({
                            url:'partial/helper.php', //url de la page.php qu'on veux utiliser
                            method:'POST', // la methode de recuperation
                            dataType:'JSON', // le type de données a recuperer
                            data:{id: $(this).attr('href')},// le donnée a recuperer
                            success: function(data){ //condition
                                alert(data.msg); //affichage
                                $('#nbP').text(data.nb); //affichage
                            }
                       });
                    });
                }
                addQte(); //appel de la fonction
                function addQte(){
                  $('.addQte').click(function(e){
                     e.preventDefault();
                     var qte = $('.qte-' + $(this).attr('href')).val();
                     var pu = $('.pu-' + $(this).attr('href')).val();
                    // var mtn = $('.montant-' + $(this).attr('href')).val();
                     qte = parseInt(qte) + parseInt(1);
                     montant = parseInt(qte) * parseInt(pu);
                     //total = parseInt(mtn) + parseInt(montant)/parseInt(qte);
                     $('.qte-' + $(this).attr('href')).val(qte);
                     $('.montant-' + $(this).attr('href')).val(montant);
                     //alert(total);
                  });
                        
                   
                }
               dimQte(); //appel de la fonction
                function dimQte(){
                  $('.dimQte').click(function(e){
                     e.preventDefault();
                     var qte = $('.qte-' + $(this).attr('href')).val();
                     var pu = $('.pu-' + $(this).attr('href')).val();
                        if (parseInt(qte)==1) {$('.qte-' + $(this).attr('href')).val(qte);} else {
                     qte = parseInt(qte) - parseInt(1);
                     montant = parseInt(qte) * parseInt(pu);
                     $('.qte-' + $(this).attr('href')).val(qte);
                     $('.montant-' + $(this).attr('href')).val(montant);
                     }
                  });
                        
                   
                }
                nombreToCart(); //appel de la fonction
                function nombreToCart(){
                    $.ajax({
                        url:'partial/helper.php',
                        dataType:'JSON',
                        success: function(data){
                             $('#nbP').text(data.nb); //affichage
                        }

                    });
                        
                   
                }
                deleteToCart(); //appel de la fonction
                function deleteToCart(){
                    $('.delete').click(function(e){
                        e.preventDefault(); //bloqué l'action par defaut
                        alert($(this).attr('href')); //afficher ce qui se trouve dans le href
                    });
                }

              
              
          
        } );
    </script>
</body>

</html>