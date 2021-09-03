<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
    
}
$Init = substr($_SESSION['user']['nom'], 0,1);
//include 'partial/helper.php';
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Xtreme lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Xtreme admin lite design, Xtreme admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description" content="Xtreme Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Gestion Stock</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtreme-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/ficon.png">
    <!-- Custom CSS -->
    <link href="assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/test.css" rel="stylesheet">
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
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="rooter.php">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/ficon.png" alt="homepage" class="dark-logo" width="50" height="30" />
                            <!-- Light Logo icon -->
                            <img src="assets/images/ficon.png" alt="homepage" class="light-logo" width="50" height="50" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <img src="assets/images/logoGSt.png" alt="homepage" class="dark-logo" width="91" height="18" />
                            <!-- Light Logo text -->
                            <img src="assets/images/logoGSt.png" class="light-logo" alt="homepage" width="91" height="50" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
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
                            <img src="assets/images/cart-white.png"  width="35" height="35"  /><b><span class="text-danger badge rounded-pill badge-notification" style="font-size:17px;margin-left:-9px;margin-top:10px" id="nbProd"></span></b>
                            </a>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span style="background-color: white; display: block; width: 40px; height: 40px;border: 2px solid white;margin-top: 10px; border-radius: 40px;"><h1 style="color: black; text-transform: uppercase; margin-top: -7px; margin-left:5px;font-family: cursive;"><?=$Init?></h1></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="rooter.php?page=profil"><i class="ti-user m-r-5 m-l-5"></i>
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
        <?php include 'partial/menu.php'; ?>
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
                Designed and Developed by <B class="text-danger" style="font-family:monospace;">Mr Martial +225 0777515789</B>.
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
    <script src="dist/js/jquery.dataTables.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
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
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('.btnsupp').click(function(e) {
                e.preventDefault();
                if (confirm("Voulez-vous supprimer cet élément?")) {
                    window.location.href = $(this).attr('href');
                    //alert($(this).attr('href'));
                }
            });

            function addTocart(id, sf, qte, pu, action) {
                $.ajax({
                    url: 'partial/helper.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        action: action,
                        id: id,
                        sf: sf,
                        qte: qte,
                        pu: pu
                    },
                    success: function(data) {
                        if (data.msg != "") {
                            alert(data.msg);
                        }
                        $('#nbProd').text(data.nb);
                    }
                });
            }
            // total montant du panier
            function montantTotalToCart() {
                $.ajax({
                    url: 'partial/helper.php',
                    method: 'POST',
                    dataType: 'JSON',
                    success: function(data) {
                        console.log(data.total);
                        $('.total').text(data.total + ' FCFA');
                    }
                });
            }
            btnAddToCart();

            function btnAddToCart() {
                $('.add').click(function(e) {
                    e.preventDefault();
                    var masko = $(this).attr('href');
                    masko = masko.split('masko');
                    if (parseInt(masko[1]) > 0) {
                        addTocart(masko[0], masko[1], 1, masko[2], 'btnAddToCart');
                        montantTotalToCart();
                    } else {
                        alert("Désolé, Ce produit est en rupture de stock !");
                    }


                });
            }
            deleteToCart();

            function deleteToCart() {
                $('.delete').click(function(e) {
                    e.preventDefault();
                    alert($(this).attr('href'));
                });
            }
            nombreProdToCart();

            function nombreProdToCart() {
                $.ajax({
                    url: 'partial/helper.php',
                    dataType: 'JSON',
                    success: function(data) {
                        $('#nbProd').text(data.nb);
                    }
                });
            }
            btnRemoveToCart();

            function btnRemoveToCart() {
                $('.removeToCart').click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr('href');
                    if (confirm('Voulez-vous retier ce produit ?')) {
                        addTocart(id, 0, 0, 0, 'btnRemoveToCart');
                        montantTotalToCart();
                        window.location.href = 'rooter.php?page=cart';
                    }


                });
            }
            addQte();

            function addQte() {
                $('.addQte').click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr('href');
                    var qte = $('.qte-' + id).val();
                    var pu = $('.pu-' + id).val();
                    var sf = $('.sf-' + id).val();
                    if (parseInt(qte) == parseInt(sf)) {
                        alert("Desolé, quantité supérieure au stock !");
                        $('.qte-' + id).val(sf);
                        montantTotalToCart();
                    } else if (parseInt(qte) < 1) {
                        alert("Desolé, quantité inférieure");
                        $('.qte-' + id).val("1");
                        montantTotalToCart();
                    } else {
                        qte = parseInt(qte) + parseInt(1);
                        var montant = parseInt(qte) * parseInt(pu);
                        $('.qte-' + id).val(qte);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, qte, 0, 'btnAddQte');
                        montantTotalToCart();
                    }

                });
            }
            dimQte();

            function dimQte() {
                $('.dimQte').click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr('href');
                    var qte = $('.qte-' + id).val();
                    var pu = $('.pu-' + id).val();
                    if (parseInt(qte) <= 1) {
                        alert("Desolé, impossible d'avoir une quantité inférieure à 1");
                        $('.qte-' + id).val("1");
                        addTocart(id, 0, qte, 0, 'btnDimQte');
                        montantTotalToCart();

                    } else {
                        qte = parseInt(qte) - parseInt(1);
                        var montant = parseInt(qte) * parseInt(pu);
                        $('.qte-' + id).val(qte);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, qte, 0, 'btnDimQte');
                        montantTotalToCart();
                    }
                });
            }
            changeInputQte();

            function changeInputQte() {
                $('.testMasko').keyup(function(e) {
                    var id = $(this).attr('masko');
                    var qte = $('.qte-' + id).val();
                    var pu = $('.pu-' + id).val();
                    var sf = $('.sf-' + id).val();
                    var montant = "";
                    if (parseInt(qte) <= 1) {
                        alert("Desolé, impossible d'avoir une quantité inférieure à 1");
                        $('.qte-' + id).val("1");
                        montant = parseInt(1) * parseInt(pu);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, 1, 0, 'btnDimQte');
                        montantTotalToCart();

                    } else if (parseInt(qte) > sf) {
                        alert("Desolé, quantité supérieure au stock !");
                        $('.qte-' + id).val(sf);
                        montant = parseInt(sf) * parseInt(pu);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, sf, 0, 'btnDimQte');
                        montantTotalToCart();
                    } else if (qte == "" || isNaN(qte)) {
                        qte = 1;
                        $('.qte-' + id).val(qte);
                        montant = parseInt(qte) * parseInt(pu);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, qte, 0, 'btnDimQte');
                        montantTotalToCart();
                    } else {
                        montant = parseInt(qte) * parseInt(pu);
                        $('.qte-' + id).val(qte);
                        $('.montant-' + id).val(montant);
                        addTocart(id, 0, qte, 0, 'btnDimQte');
                        montantTotalToCart();
                    }
                });
            }


            //inputVerif();

            function inputVerif() {
                $('#inputVerif').change(function(e) {
                    e.preventDefault();
                    var qte = $(this).data('prod').val();
                    alert(qte);

                    if (qte == 1 || qte < 2) {
                        $(this).val(1);
                        alert(qte);
                        return;
                    } else {

                    }

                });
                //
                // $('.qte-').click(function (e) {
                //     e.preventDefault();
                //     var qte = $('.qte-' + $(this).attr('href')).val();
                //     var pu = $('.pu-' + $(this).attr('href')).val();
                //     if (parseInt(qte)==1) {
                //       $('.qte-' + $(this).attr('href')).val(qte);
                //     }else{
                //      qte = parseInt(qte) - parseInt(1);
                //     var montant = parseInt(qte) * parseInt(pu);
                //     $('.qte-' + $(this).attr('href')).val(qte);
                //     $('.montant-' + $(this).attr('href')).val(montant);
                //     }  
                // });
            }
        });
    </script>
</body>

</html>