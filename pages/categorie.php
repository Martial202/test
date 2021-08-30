<?php 
include 'db/Connexion.php';
include 'models/Categorie.php';
include 'partial/menu_categorie.php';
    
     $categorie = new Categorie();
     $masko = $categorie->getCat($cnx);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h2 class="text-dark">La liste des catégories</h2>
                <h6 class="card-subtitle"></h6>
            </div>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"></th>
                            <th scope="col">Désignation</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col">Actions</th>
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
                                 <td></td>
                                 <td><?=$data['libelle_cat']?></td>
                                 <td></td>
                                 <td></td>
                                 <td></td>
                                 <td>
                                    <a href="rooter.php?page=ajouter_categorie&idCt=<?= $data['idcat'] ?>" title="Modifier" name="btn" class="btn btn-warning text-white btn-sm"><i class="mdi mdi-pencil"></i></a>
                                    <a href="rooter.php?page=supp&idcat=<?= $data["idcat"] ?>" title="supprimer" name="btn" class="btn btn-danger text-white btn-sm btnsupp"><i class="mdi mdi-delete"></i></a>
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