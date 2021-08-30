<?php 
include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Stock.php';
include 'partial/menu_produit.php';
    $color = "";
    $msg = "";
    $idpro = "";
    $idpr = "";
         $produit = new Produit();
         $stock = new Stock();
       if (isset($_GET['id'])) {
           $idpro = $_GET['id'];
           $add = $produit->singleProd($_GET['id'],$cnx);
           $titre = "Ajouter un Approvisionnement ";
           $url = "rooter.php?page=stock";
       }elseif (isset($_GET['idap'])) {
           $idpr = $_GET['idap'];
           $mod = $stock->singleProd($_GET['idap'],$cnx);
           $titre = "Modifier l'Approvisionnement ";
           $url = "rooter.php?page=listeapprovisionner";

       }
   //$martial = $produit->getProdsId($idpro,$cnx);


    if (isset($_POST['btn_addapp'])) {
      extract($_POST);
        if (empty($idprod) || empty($qte_app) || empty($pu_app)) {
        $msg = "<h3 class='text-danger'>Renseigner tous les champs.</h3>";
    } elseif (!ctype_digit(trim($qte_app))) {
        $msg = "<h3 class='text-danger'> Desolé le champ quantité est invalide.</h3>";
    } elseif (!ctype_digit(trim($pu_app))) {
        $msg = "<h3 class='text-danger'> Desolé, le champ Prix est invalide.</h3>";
    } else {
        if (isset($_GET['idap'])) {

            if ($stock->modifierApp($qte_app, $pu_app, $idprod, $cnx)) {
                //$msg = "<h3 class='text-success'> Produit modifier avec succes !</h3>";
                 ?>
                <script>
                    alert('Modification éffectuée avec succes !');
                    window.location.href = "rooter.php?page=listappro";
                </script>
            <?php
            } else {
                $msg = "<h3 class='text-danger'>Désolé, impossible de modifier !</h3>";
            }
        } else {
            if ($stock->ajouterApp($qte_app, $pu_app, $idprod, $cnx)) {
             $msg = "Approvisionnement éffectué avec succes !";
            $color = "text-success";
         }else {
            $msg = "Désolé, Insertion échouée !";
            $color = "text-danger";
         }
        } 
        } 
    }
?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
                <h3 class="text-dark"><?=$titre?></h3>
        <div class="card">
            <div class="card-body">
                <form class="form-horizontal form-material mx-2" method="POST">
                    <div class="row">
                        <div class="col-md-6 form-group text-dark">
                            <label class=""><b>Produit</b></label>
                           <?php
                            if (isset($_GET['id'])) {
                                echo '<strong class="form-control form-control-line">' . $add['libelle_prod'] . '</strong>'
                                    . '<input type="hidden" class="form-control form-control-line" name="idprod" value="' . $_GET['id'] . '">';
                            } elseif (isset($_GET['idap'])) {
                                echo '<strong class="form-control form-control-line">' . $mod['libelle_prod'] . '</strong>'
                                    . '<input type="hidden" class="form-control form-control-line" name="idprod" value="' . $_GET['idap'] . '">';
                            } 
                            ?>
                        </div>
                        <div class="col-md-3 form-group text-dark">
                            <label class=""><b>Quantité à Approvisionner</b></label>
                            <input type="text" class="form-control form-control-line" name="qte_app" value="">
                        </div>
                        <div class="col-md-3 form-group text-dark">
                            <label class=""><b>Prix d'achat</b></label>
                            <input type="text" class="form-control form-control-line" name="pu_app" value="">
                        </div>
                    </div>
                    <div class="col-md-6 form-group text-dark">
                        </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                          <button name="btn_addapp" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i><?=@isset($_GET['idap']) ? 'Modifier':'Ajouter'?></button>
                           <a href="<?=$url?>" class="btn btn-danger text-white"><i class="mdi mdi-window-close"></i> Annuler</a> 
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
