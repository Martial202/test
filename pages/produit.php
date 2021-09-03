<?php 
include 'db/Connexion.php';
include 'models/Produit.php';
include 'partial/menu_produit.php';
    
     $produit = new Produit();
     $masko = $produit->getProd($cnx);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-dark">La liste des Produits</h2>
                <h6 class="card-subtitle"></h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-dark">Désignation</th>
                            <th scope="col" class="text-dark">Categorie</th>
                            <th scope="col" class="text-dark">Prix de Vente</th>
                            <th scope="col" class="text-dark">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $i = 0;
                          foreach ($masko as $data ) {
                            $i++;
                             ?>
                             <tr>
                                 <td><?=$i?></td>
                                 <td><?=$data['libelle_prod']?></td>
                                 <td><?=@$data['categorie']?></td>
                                 <td><?=number_format($data['pu_prod'])?> <b>FCFA</b></td>
                                 <td>
                                     <a href="rooter.php?page=ajouter_produit&idPrd=<?=$data['idprod']?>" title="Modifier" name="btn" class="btn btn-warning text-white">
                                                <i class="mdi mdi-pencil"></i></a>
                                     <a href="rooter.php?page=supp&idprod=<?= $data["idprod"] ?>" title="supprimer" name="btn" class="btn btn-danger text-white btnsupp">
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