<?php 
include 'db/Connexion.php';
include 'models/Categorie.php';
include 'partial/menu_categorie.php';
    $color = "";
    $msg = "";
    $titre = "Ajouter une Catégorie";
    $categorie = new Categorie();
     if (isset($_GET['idCt'])) {
         $id = $_GET['idCt'];
         $fabio = $categorie->singleCat($_GET['idCt'],$cnx);
         $titre = "Modifier la Catégorie";
     }
     
    if (isset($_POST['btn_addcat'])) {
        extract($_POST);

           if (empty($libelle)) {
               $msg = 'Renseignez le champs Désignation !';
               $color = "text-danger";
           } else {
               if (isset($_GET['idCt'])) {
                   if ($categorie->modifierCat($libelle,$id, $cnx)) {
                      ?>
                <script>
                    alert('Categorie modifier avec succes !');
                    window.location.href = "rooter.php?page=categorie";
                </script>
                <?php
                   } else {
                       $msg = 'Désolé,'.$libelle.'existe déjà !';
                       $color = "text-danger";
                   }
                   
            } elseif ($categorie->verif($libelle, $cnx)) {
            $msg = "Cette Designation existe déjà !";
            $color = "text-danger";
         }elseif ($categorie->ajouterCat($libelle, $cnx)) {
             $msg = "Categorie". $libelle ." inserée avec succes !";
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
        <div class="card">
            <div class="card-body">
                <h2 class="text-dark"><?=$titre?></h2>
                <form class="form-horizontal form-material mx-2" method="POST">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label class="">Désignation de la categorie</label>
                            <input type="text" class="form-control form-control-line" name="libelle" value="<?=@$fabio['libelle_cat']?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">
                          <button name="btn_addcat" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i><?=@$fabio['libelle_cat']? "Modifier" : "Ajouter" ?></button>
                           <a href="rooter.php?page=categorie" class="btn btn-danger text-white"><i class="mdi mdi-window-close"></i> Annuler</a> 
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
