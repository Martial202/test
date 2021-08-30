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
                <h2 class="text-dark">Situation du Stock</h2>
                <h6 class="card-subtitle"></h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" class="text-dark">Désignation</th>
                            <th scope="col" class="text-dark">Entrées</th>
                            <th scope="col" class="text-dark">Sorties</th>
                            <th scope="col" class="text-dark">Stock Final</th>
                            <th scope="col" class="text-dark">Status</th>
                            <th scope="col" class="text-dark">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                          $i = 0;
                          $fd = 0;
                          foreach ($masko as $data ) {
                          	  include 'partial/foufou.php';
                          	  
                            $i++;
                             ?>
                             <tr>
                                <td><?=$i?></td>
                                <td><?=$data['libelle_prod']?></td>
                                <td><?=$qte_app?></td>
                                <td><?=$qte_ligne?></td>
                                <td><?=$qte_app-$qte_ligne?></td>
                                <td><?=$msg?></td>
                                 <td>
                                     <a href="rooter.php?page=approvisionner&id=<?=$data['idprod']?>"><button title="Approvisionner" name="btn" class="btn btn-info text-white">
                                                <i class="mdi mdi-database-plus"></i></button></a>
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