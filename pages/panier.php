<?php include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Vente.php';
$vente = new Vente();
//total montant du panier
/* if (isset($_SESSION['cart'])) {
    $tt = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $tt = ($_SESSION['cart'][$key]['qte'] * $_SESSION['cart'][$key]['pu']) + $tt;
    }

    $_SESSION['total'] = $tt;
} */
//var_dump($_SESSION['cart']);
//unset($_SESSION['cart']);


if (isset($_POST["btnvalider"])) {

    $ref = "REF-" . date('Hdmyis');
    $idv = $vente->ajouterVente($ref, $_SESSION['total'],$cnx);
    $res = false;
    foreach ($_SESSION['cart'] as $key => $value) {
        $qte = $_SESSION['cart'][$key]['qte'];
        $pu = $_SESSION['cart'][$key]['pu'];
        $idp = $_SESSION['cart'][$key]['id'];
        $res = $vente->ajouterLigne($idp, $idv, $qte, $pu,$cnx);
    }
    if ($res) {
        unset($_SESSION['total']);
        unset($_SESSION['cart']);

?>
        <script>
            alert('Vente effectuée avec succes !');
            window.location.href = "rooter.php?page=vente";
        </script>
<?php
    }
}

?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <h2 class="card-subtitle text-danger">Le Panier <img src="assets/images/cart-red.png" width="50" height="50" /></h2>
            <div class="text-end upgrade-btn">
                <button class="btn btn-danger text-white">TOTAL : <span class="total"><?= isset($_SESSION['cart']) ? $_SESSION['total'] : 0 ?> FCFA</span></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Désignation</th>
                                <th scope="col">Stock</th>
                                <th scope="col">PU</th>
                                <th scope="col">Qté</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $i = 0;
                                $produit = new Produit();
                                foreach ($_SESSION['cart'] as $key => $row) {
                                    $i++;
                                    $product = $produit->singleProd($row['id'],$cnx); ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $product['libelle_prod'] ?></td>
                                        <td><?= $row['sf'] ?></td>
                                        <td>
                                            <?= $product['pu_prod'] ?>
                                            <input type="hidden" class="pu-<?= $product['idprod'] ?>" value="<?= $product['pu_prod'] ?>">
                                            <input type="hidden" class="sf-<?= $row['id'] ?>" value="<?= $row['sf'] ?>">
                                        </td>
                                        <td>
                                        <a class="btn btn-danger text-white btn-sm dimQte" href="<?= $product['idprod'] ?>" style="width: 12%; height: 24px; line-height: 15px;margin: 2px" title="Diminuer"><b style="font-size: 20px !important; margin-left: -2px ">-</b></a>
                                            <input type="text" class="qte-<?= $product['idprod'] ?> testMasko" masko="<?= $product['idprod'] ?>" value="<?= $row['qte'] ?>" style="width: 55px;">
                                            <a class="btn btn-success text-white btn-sm addQte" style="width: 12%; height: 24px; line-height: 15px;margin: 2px" href="<?= $product['idprod'] ?>" title="Augmenter"> <i style="font-size: 20px !important; margin-left: -8px; margin-right: 0px; " class="mdi mdi-plus"></i> </a>
                                        </td>
                                        <td><input class="montant-<?= $product['idprod'] ?>" value="<?= number_format($product['pu_prod'] * $row['qte']) ?>" disabled="" style="width: 120px;"></td>
                                        <td>
                                            <a class="btn btn-danger btn-sm removeToCart" href="<?= $product['idprod'] ?>" title="Retirer du panier"> <i class="mdi mdi-delete-empty"></i> </a>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <?php if (isset($_SESSION['cart'])) { ?>
                            <form action="" method="post">
                                <button type="submit" name="btnvalider" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i> Valider</button>
                                <a href="rooter.php?page=ajouter_vente" class="btn btn-danger text-white"><i class="mdi mdi-cart"></i><?= @$_SESSION['cart'] ? ' Ajouter autre produit' : ' Faire une vente' ?></a>
                            </form>
                        <?php } ?>
                        
                    </div>
                    <br>
                    <div class="col-sm-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
