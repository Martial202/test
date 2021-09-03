<aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h4 class="m-b-0 user-name font-medium" style="text-transform: uppercase;"><?=$_SESSION['user']['nom']?></h4>
                                    </a>
                                    <span class="op-5 user-email"><?=$_SESSION['user']['login']?></span>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                       
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Tableau de bord</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php?page=profil" aria-expanded="false"><i
                                    class="mdi mdi-account"></i><span class="hide-menu">Profil</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php?page=categorie" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Categories</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php?page=produit" aria-expanded="false"><i class="mdi mdi-cart-plus"></i><span
                                    class="hide-menu">Produits</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php?page=vente" aria-expanded="false"><i class="mdi mdi-chart-areaspline"></i><span
                                    class="hide-menu">Ventes</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="rooter.php?page=comptabiliter" aria-expanded="false"><i class="mdi mdi-cash-multiple"></i><span
                                    class="hide-menu">Comptabilité</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages/deco.php" aria-expanded="false"><i class="mdi mdi-logout"></i><span
                                    class="hide-menu">Deconnexion</span></a></li>
                     
                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>