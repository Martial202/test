<?php include 'db/Connexion.php';
include 'models/Produit.php';
    
?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <h2 class="card-subtitle text-danger">Le Panier</h2>
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="POST">
                    <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Prix Unitaire</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                         if(isset($_SESSION['cart'])){
                        $i =0;
                        $tot = 0;
                          $produit = new Produit();
                          foreach ($_SESSION['cart'] as $key => $row) {
                              $i++;
                             $product = $produit->singleProd($row,$cnx);
                               
                              
                             ?>

                        <tr>
                        <td><?=$i?></td>
                        <td><?=$product['libelle_prod']?></td>
                        <td>
                            <?=$product['pu_prod']?>
                            <input type="hidden" class="pu-<?= $product['idprod'] ?>" value="<?=$product['pu_prod']?>">
                        </td>
                        <td>
                            <a class="btn btn-danger text-white btn-sm dimQte" href="<?= $product['idprod'] ?>" style="width: 8%; height: 24px; line-height: 15px;margin: 2px" title="Diminuer"><b style="font-size: 20px !important; margin-left: -2px ">-</b></a>
                            <input type="number" style="width: 25%" class="qte-<?= $product['idprod'] ?>" value="1">
                            <a class="btn btn-success text-white btn-sm addQte" style="width: 8%; height: 24px; line-height: 15px;margin: 2px" href="<?= $product['idprod'] ?>" title="Augmenter"> <i style="font-size: 20px !important; margin-left: -8px; margin-right: 0px; " class="mdi mdi-plus"></i> </a>
                        </td>
                        <td><input style="width: 35%" class="montant-<?= $product['idprod'] ?>" value="<?= number_format($product['pu_prod'])?>" disabled=""></td>
                        <td>
                             <a class="btn btn-warning btn-sm removeToCart" href="<?= $product['idprod'] ?>" title="Retirer du panier"> <i class="mdi mdi-delete-empty"></i> </a>
                        </td>
                        </tr>
                         <?php
                            $tot = $tot + $product['pu_prod'];
                        
                        }}?>
                    </tbody>
                </table><br>
                   
                              <!-- <div class="col-md-2">
                                 <label>TOTAL: </label>
                              </div> -->
                        <div class="text-end upgrade-btn">
                            <label> <b>TOTAL:</b> </label>
                        <!-- <input style="width: 35%" class="montant-<?= $product['idprod'] ?>" value="<?= number_format($tot)?>" disabled=""> -->
                            <a href=""  class="btn btn-danger text-white tot"><b style="font-size: 22px"><?= number_format($tot). ' FCFA' ?></b></a>
                        </div>
            </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                            <button name="btn_addcat" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i> <?= @$cat['libelle_cat'] ? "Modifier" : "Ajouter" ?> </button>
                            <a href="rooter.php?page=categorie" class="btn btn-danger text-white"><i class="mdi mdi-window-close"></i> Annuler</a>
                        </div>
                        <br>
                        <div class="col-sm-8">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>