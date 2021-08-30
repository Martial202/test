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
                          foreach ($Leonnie as $data ) {
                            $i++;
                             ?>
                             <tr>
                                 <td><?=$i?></td>
                                 <td><?=@$data['date_vente']?></td>
                                 <td><?=number_format(@$data['montant'])?> <b>FCFA</b></td>
                                 <td><?=@$data['date_vente']?></td>
                                 <td><?=@$data['date_vente']?></td>
                                 <td>
                                     <a href="rooter.php?page=ajouter_produit&idPrd=<?=$data['idvente']?>" title="Modifier" name="btn" class="btn btn-warning text-white">
                                                <i class="mdi mdi-pencil"></i></a>
                                     <a href="rooter.php?page=supp&idprod=<?= $data["idvente"] ?>" title="supprimer" name="btn" class="btn btn-danger text-white btnsupp">
                                                <i class="mdi mdi-delete "></i></a>
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