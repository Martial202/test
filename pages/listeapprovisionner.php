<?php 
include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Stock.php';
include 'partial/menu_produit.php';
    
     $stock = new Stock();
     $masko = $stock->getApp($cnx);


?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-dark">Liste Des Approvisionnements</h2>
                <h6 class="card-subtitle"></h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-dark">Désignation</th>
                            <th scope="col" class="text-dark">Quantité</th>
                            <th scope="col" class="text-dark">Prix d'achat</th>
                            <th scope="col" class="text-dark">Montant</th>
                            <th scope="col" class="text-dark">Date</th>
                            <th scope="col" class="text-dark">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $i = 0;
                          $fd = 0;
                          foreach ($masko as $data ) {
                          	  
                            $i++;
                             ?>
                             <tr>
                                <td><?=$i?></td>
                                <td><?=$data['libelle_prod']?></td>
                                <td><?=$data['qte_app']?></td>
                                <td><?=$data['pu_app']?></td>
                                <td><?=number_format($data['qte_app'] * $data['pu_app']).' <b>FCFA</b>'?></td>
                                <td><?=$data['date_app']?></td>
                                 <td>
                                     <a href="rooter.php?page=approvisionner&idap=<?=$data['idapp']?>" title="Modifier" name="btn" class="btn btn-warning text-white">
                                                <i class="mdi mdi-pencil"></i></a>
                                     <a href="rooter.php?page=supp&idapp=<?= $data["idapp"] ?>" title="Supprimer" name="btn" class="btn btn-danger text-white btnsupp">
                                                <i class="mdi mdi-delete"></i></a>
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