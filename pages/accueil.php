<?php 
include 'db/Connexion.php';
include 'models/Produit.php';
include 'models/Vente.php';

$vente = new Vente();
$produit = new Produit();
$ttVdu = 0;
$qteTotApp = 0;
$mtnrest = 0;
$depenses = 0;
$venteTot = 0;
$stockrest = 0;
$benefice = 0;
$qteVendu = 0;
$depenses = $vente->getTotDep('approvisionner','qte_app','pu_app',$cnx);//Depense Total SELECT SUM(qte_app * pu_app) FROM approvisionner
$ttVdu = $vente->getTotQte('vente','montant',$cnx);//Total Vendu SELECT SUM(montant) FROM vente
$qteTotApp = $vente->getTotQte('approvisionner','qte_app',$cnx);//Total qte Approvisionner SELECT SUM(qte_app) FROM approvisionner
$venteTot = $produit->getTotVte($cnx);//Montant Total Apres Vente
$qteVendu = $produit->getQteVte($cnx);//Total Quantité Vendu
$mtnrest += $venteTot - $ttVdu;//Montant Restant a vendre
$stockrest += $qteTotApp - $qteVendu;//stock Restant
$benefice += $venteTot - $depenses;//stock Restant


?>

<div class="row">
<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding"><center><img src="assets/images/coin-blue.png" style="width: 25%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($depenses)? number_format($depenses) : 0?>F</div>
                <div class="text-muted">TOTAL DEPENSE</div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-orange panel-widget border-right">
            <div class="row no-padding"><center><img src="assets/images/coin-green.png" style="width: 25%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($ttVdu)? number_format($ttVdu) : 0?>F</div>
                <div class="text-muted">TOTAL VENDU</div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-red panel-widget ">
            <div class="row no-padding"><center><img src="assets/images/coin-red.png" style="width: 25%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($mtnrest)? number_format($mtnrest) : 0?>F</div>
                <div class="text-muted">MONTANT STOCK </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding">
               <center><img src="assets/images/coin-warning.png" style="width: 25%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($venteTot)? number_format($venteTot) : 0?>F</div>
                <div class="text-muted ">TOTAL APRES VENTES</div>
            </div>
        </div>
    </div>
</div><!--/.row-->

<div class="row">
<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding"><center><img src="assets/images/prod-blue.png" style="width: 15%;" /></center>
                <div style="font-weight: bold; font-size: 28px;" ><?=!empty($qteTotApp)? number_format($qteTotApp) : 0?></div>
                <div class="text-muted" style="text-transform: uppercase;">quantite total</div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-orange panel-widget border-right">
            <div class="row no-padding"><center><img src="assets/images/prod-green.png" style="width: 15%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($qteVendu)? number_format($qteVendu) : 0?></div>
                <div class="text-muted">QUANTITE VENDUES</div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-red panel-widget ">
            <div class="row no-padding"><center><img src="assets/images/prod-red.png" style="width: 15%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($stockrest)? number_format($stockrest) : 0?></div>
                <div class="text-muted">QUANTITE STOCK</div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
        <div class="panel panel-blue panel-widget border-right">
            <div class="row no-padding">
               <center><img src="assets/images/benef.png" style="width: 25%;" /></center>
                <div style="font-weight: bold; font-size: 28px;"><?=!empty($benefice)? number_format($benefice) : 0?>F</div>
                <div class="text-muted ">TOTAL GAIN</div>
            </div>
        </div>
    </div>
</div>


