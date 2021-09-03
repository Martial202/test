<?php
include 'db/Connexion.php';
include 'models/Vente.php';
$vente = new Vente();
$date = date('Y-m-d');
$ventes = [];
$ventes = $vente->listeVenteActuelle($date,$cnx);

include 'partial/menu_vente.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-subtitle text-danger">Menu des Ventes</h2>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">References</th>
                            <th scope="col">Montant</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        $nb = 0;
                        foreach ($ventes as $key => $value) {
                            $i++;
                            $nb = $vente->getNombreProd($value['idvente'],$cnx);
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $value['refvente'] ?></td>
                                <td><?= number_format($value['montant']) . ' FCFA' ?></td>
                                <td><?= ($nb > 0) ? $nb : 0 ?></td>
                                <td><?= $value['date_vente'] ?></td>

                                <td>
                                    <a class="btn btn-info btn-sm" href="rooter.php?page=voirProduit&idvte=<?= $value['idvente'] ?>" title="Voir"> <i class="mdi mdi-eye"></i> </a>
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