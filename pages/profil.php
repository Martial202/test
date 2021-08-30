<?php
include 'db/Connexion.php';
include 'models/User.php';
$msg = "";
$user = new User();
$ol_mdp = $_SESSION['user']['password'];

if (isset($_POST['btn_moduser'])) {
    extract($_POST);
    if (empty($_POST['nom']) || empty($_POST['login']) || empty($_POST['old_password']) || empty($_POST['new_password'])) {
        $msg = "<h4 class='text-danger'>Renseigner tous les champs. !</h4>";
    } elseif ($old_password != $ol_mdp) {
        $msg = "<h4 class='text-danger'> Désolé Ancien mot de passe incorrect. !</h4>";
    } else {

        if ($user->modifierUser($nom, $login, $new_password, $_SESSION['user']['idu'], $cnx)) {
?>
            <script>
                alert('Modification effectuée avec succes !');
                window.location.href = "rooter.php?page=profil";
            </script>
<?php
        } else {
            $msg = "<h3 class='text-danger'>Désolé, " . $libelle_prod . " existe déjà !</h3>";
        }
    }
}
$Init = substr($_SESSION['user']['nom'], 0,1);
?>
<div class="row">
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <h2 class="card-subtitle text-mute">Modifier les parametres de connexion</h2>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <p>
                           <label><b> NOM :</b></label>  <span> <?= @$_SESSION['user']['nom'] ?></span> 
                        </p>
                        <p>
                           <label><b> LOGIN :</b></label> <span><?= @$_SESSION['user']['login'] ?></span> 
                        </p>
                        <span style="display: block; width: 50%; height: 155px; border: 2px solid #eef5f9;margin-left: 60px; border-radius: 100px;background-color: gray; line-height: 145px">
                            <b style="font-family: cursive;font-size: 1000%;margin-left: 29px;color: white"><?= @$Init ?></b>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <form class="form-horizontal form-material mx-2" method="POST">
                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <label class="">Nom</label>
                                    <input type="text" class="form-control form-control-line" required="required" name="nom" value="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="">Nom utilisateur</label>
                                    <input required="required" type="text" class="form-control form-control-line" required name="login" value="">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="">Ancien mot de passe</label>
                                    <input type="password" class="form-control form-control-line" required="required" name="old_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label class="">Nouveau mot de passe</label>
                                    <input required="required" type="password" class="form-control form-control-line" required name="new_password">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button type="submit" name="btn_moduser" class="btn btn-success text-white"><i class="mdi mdi-check-circle"></i> Modifier </button>
                                </div>
                                <br>
                                <div class="col-sm-8">
                                    <?= $msg ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>