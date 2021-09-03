<?php
include 'db/Connexion.php';
include 'models/Vente.php';

$vente = new Vente();
$Leonnie = $vente->listevente($cnx);

include 'partial/menu_vente.php'; ?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-dark">La liste des Ventes</h2>
                <h6 class="card-subtitle"></h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-dark">Réference</th>
                            <th scope="col" class="text-dark">Montant</th>
                            <th scope="col" class="text-dark">Nombre Article</th>
                            <th scope="col" class="text-dark">Date</th>
                            <th scope="col" class="text-dark">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $i = 0;
                          $nb = 0;
                          foreach ($Leonnie as $data ) {
                            $i++;
                            $nb = $vente->getNombreProd($data['idvente'],$cnx);
                             ?>
                             <tr>
                                 <td><?=$i?></td>
                                 <td><?=@$data['refvente']?></td>
                                 <td><?=number_format(@$data['montant'])?> <b>FCFA</b></td>
                                 <td><?= ($nb > 0) ? $nb : 0 ?></td>
                                 <td><?=@$data['date_vente']?></td>
                                 <td>
                                 <a class="btn btn-info btn-sm" href="rooter.php?page=voirProduit&idvte=<?= $data['idvente'] ?>" title="Voir"> <i class="mdi mdi-eye"></i> </a>
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