<?php 
include 'db/Connexion.php';
include 'models/Categorie.php';
//include 'partial/menu_categorie.php';
$categorie = new Categorie();
  $fabrice = $categorie->getCat($cnx);
    $id = null;
    $masko = [];
    $masko = $categorie->getProdToCat($id,$cnx);
    //var_dump($masko);
    if (isset($_POST['btn_afficher'])) {
        $id = $_POST['idcat'];
        $masko = $categorie->getProdToCat($id,$cnx);
        
    }
     
    //  $masko = $categorie->getProdToCat('produit','',$cnx);
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="" method="POST">
            <div class="row">
               <div class="col-md-7">
                  <label class="text-dark"  style="font-weight: bold;">Categorie</label>
                  <select class="form-control form-control-line" required name="idcat">
                        <option value="0" selected> -- choisir la categorie -- </option>
                            <?php
                               var_dump($fabrice);
                                    foreach ($fabrice as $key => $data) {
                                       //echo'<option value=' . $data['idcat'] . '>' . $data['libelle_cat'] .'</option>';
                                      ?>
                                       <option <?= (@$data['idcat'] == @$prod['idcat']) ? 'selected' : '' ?> value="<?= @$data['idcat'] ?>"> <?= @$data['libelle_cat'] ?> </option>
                                    <?php
                                          }
                                ?>      
                     </select>
                  </div>
               </div>
               <div class="form-group">
               <div class="col-md-3">
                  <button style="margin-top:28px;" class="btn btn-success text-white" name="btn_afficher">
                  Recherche les Produits de cette Catégorie
                  </button>
               </div>
               </div>
               </form>
            </div>
            <br><hr>
            <div class="table-responsive">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Produit</th>
                            <th scope="col">Total Depense</th>
                            <th scope="col">Total Vente</th>
                            <th scope="col">Qte Vendues</th>
                            <th scope="col">Mtnt Vendues</th>
                            <th scope="col">Qte Stock</th>
                            <th scope="col">Mtnt Stock</th>
                            <th scope="col">Gain Produit</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php
                             $i = 0;
                             $MtntStock = 0;
                             $GainProd = 0;
                             $stockRest = 0;
                             foreach ($masko as $key => $value) {
                            
                            $totDepProd = $categorie->getTotDep('approvisionner', 'qte_app','pu_app',$value['idprod'],$cnx);     
                            $QteVendu = $categorie->getQteVte($value['idprod'],$cnx);
                            $MtnVendu = $categorie->getMtnVdu($value['idprod'],$cnx);
                            $totMtnProd = $categorie->getTotVteByProd($value['idprod'],$cnx);
                            $MtntStock = $totMtnProd - $MtnVendu; 
                            $GainProd = $totMtnProd - $totDepProd; 
                            $stockRest = $categorie->getotQteProd($value['idprod'],$cnx) - $QteVendu;
                         ?>
                             <tr>
                                 <td>1</td>
                                 <td><?=$value['libelle_prod']?></td>
                                 <td style="color:blue"><?=number_format($totDepProd). ' FCFA'?></td>
                                 <td style="color:blueviolet"><?=number_format($totMtnProd). ' FCFA'?></td>
                                 <td style="color:green"><?=$QteVendu?> Vendus</td>
                                 <td style="color:green"><?=number_format($MtnVendu). ' FCFA'?></td>
                                 <td style="color:crimson"><?=$stockRest?> Reste</td>
                                 <td style="color:crimson"><?=number_format($MtntStock). ' FCFA'?></td>
                                 <td style="color:darkgoldenrod"><?=number_format($GainProd). ' FCFA'?></td>
                                 
                             </tr>
                    </tbody>
                    <?php
                        }
                    ?>
                </table>
                
            </div>

        </div>
    </div>
</div>