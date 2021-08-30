<?php 
include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Categorie.php';
include 'partial/menu_produit.php';
 $produit = new Produit();
    $color = "";
    $msg = "";
    $idP = "";
    $fabrice = [];
  $categorie = new Categorie();
  $fabrice = $categorie->getCat($cnx);

    if (isset($_GET['idPrd'])) {
      $idP = $_GET['idPrd'];
      $prod = $produit->singleProd($_GET['idPrd'], $cnx);
    }

    if (isset($_POST['btn_addprod'])) {
        extract($_POST);
        //var_dump($libelle_prod);
         if (empty($libelle_prod) || empty($pu_prod) || empty($critique)) {
            $msg = "Renseignez tous les champs !";
            $color = "text-danger";
         }elseif (!ctype_digit($pu_prod)) {
           $msg = "Désolé, Le champ Prix est invalide !";
            $color = "text-danger";
         }elseif (!ctype_digit($critique)) {
           $msg = "Désolé, Le champ Critique est invalide !";
            $color = "text-danger";
         }else{
             if (isset($_GET['idPrd'])) {
                 if ($produit->modifierProd($libelle_prod,$pu_prod,$critique,$idcat, $idP, $cnx)) {
                    ?> 
                <script>
                    alert('Produit modifier avec succes !');
                    window.location.href = "rooter.php?page=produit";
                </script>
                <?php
                 } else {
                    $msg = "Désolé, ".$libelle_prod." existe déjà !";
                    $color = "text-danger";
                 }
                 
             } elseif ($produit->verif($libelle_prod, $cnx)) {
            $msg = "Cette Designation existe déjà !";
            $color = "text-danger";
         }elseif ($produit->ajouterProd($libelle_prod, $pu_prod, $critique, $idcat, $cnx)) {
             $msg = "Produit inserée avec succes !";
            $color = "text-success";
         }else {
            $msg = "Désolé, Insertion échouée !";
            $color = "text-danger";
         }
             }
         
    }
?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
                <h3 class="text-dark"><?=@$prod['libelle_prod']?'Modifier Un Produit':'Ajouter Nouveau Produit'?></h3>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="POST">
                    <div class="row">
                        <div class="col-md-4 form-group text-dark">
                            <label class=""><b>Catégorie</b></label>
                            <select class="form-control form-control-line" required style="" name="idcat">
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
                        <div class="col-md-4 form-group text-dark">
                            <label class=""><b>Désignation du Produit</b></label>
                            <input type="text" class="form-control form-control-line" name="libelle_prod" value="<?=@$prod['libelle_prod']?>">
                        </div>
                        <div class="col-md-2 form-group text-dark">
                            <label class=""><b>Prix de vente</b></label>
                            <input type="text" class="form-control form-control-line" name="pu_prod" value="<?=@$prod['pu_prod']?>">
                        </div>
                        <div class="col-md-2 form-group text-dark">
                            <label class=""><b>Seuil Critique</b></label>
                            <input type="text" class="form-control form-control-line" name="critique" value="<?=@$prod['critique']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                          <button name="btn_addprod" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i><?= @$prod['libelle_prod'] ? "Modifier" : "Ajouter" ?></button>
                           <a href="rooter.php?page=produit" class="btn btn-danger text-white"><i class="mdi mdi-window-close"></i> Annuler</a> 
                        </div>
                        <br>
                        <div class="col-sm-8">
                        </div>
                        <h4 class="<?=$color?>"><?=$msg?></h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
