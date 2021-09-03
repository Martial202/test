<?php
include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Stock.php';
$produit = new Produit();
$stock = new Stock();
$prod = [];
$prod = $produit->getProd($cnx);

include 'partial/menu_vente.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-subtitle text-danger">Menu des Ventes</h2>
                <p class="retour"></p>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Désignation</th>
                            <th scope="col">Categorie</th>
                            <th scope="col">Prix Unitaire</th>
                            <th scope="col">Stock Final</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $sf = 0;
                        $ss = 0;
                        $se = 0;
                        foreach ($prod as $key => $value) {
                            $i++;
                            $sf = ($stock->getElement('approvisionner', 'qte_app', $value["idprod"],$cnx) - $stock->getElement('ligne', 'qte_ligne', $value["idprod"],$cnx));
                            $se = $stock->getElement('approvisionner', 'qte_app', $value["idprod"],$cnx);
                            $ss = $stock->getElement('ligne', 'qte_ligne', $value["idprod"],$cnx);
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value['libelle_prod'] ?></td>
                                <td><?= $value['categorie'] ?></td>
                                <td><?= number_format($value['pu_prod']) . ' Fcfa' ?></td>
                                <td><?= $sf ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm add" href="<?= $value['idprod'] . 'masko' . $sf . 'masko' . $value['pu_prod'] ?>" title="AJouter au panier "> <i class="mdi mdi-cart-plus"></i> </a>
                                </td>
                            </tr>
                        <?php

                        }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>