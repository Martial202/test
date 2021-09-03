<?php include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Vente.php';
$vente = new Vente();
if (isset($_GET['idvte'])) {
   $ref = "";
    $ligneProd = $vente->singleVente($_GET['idvte'],$cnx);
   // var_dump($ligneProd);
    foreach ($ligneProd as $key => $value){
        $ref = $value['refvente'];
        $tot = $value['montant'];
        break;
    }

}

?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <h3 class="card-subtitle text-danger">VENTE : <?=$ref?> </h3>
            <div class="text-end upgrade-btn">
                <button class="btn btn-danger text-white">TOTAL : <?= number_format($tot) ?> FCFA</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Désignation</th>
                                <th scope="col">PU</th>
                                <th scope="col">Qté</th>
                                <th scope="col">Montant</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                foreach ($ligneProd as $key => $row) {
                                    $i++;
                                    //$row = $produit->singleProd($row['id'],$cnx); ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['libelle_prod'] ?></td>
                                        <td>
                                            <?= number_format($row['pu_ligne']).' <b>FCFA</b>' ?>
                                        </td>
                                        <td>
                                        <?= $row['qte_ligne'] ?>
                                        </td>
                                        <td>
                                        <?= number_format($row['pu_ligne'] * $row['qte_ligne']).' <b>FCFA</b>' ?>
                                        </td>
                                    </tr>
                            <?php 
                            } ?>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                                <a href="rooter.php?page=vente" class="btn btn-danger text-white"><i class="mdi mdi-cart"></i>Retour</a>
                   </div>
                    <br>
                    <div class="col-sm-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
