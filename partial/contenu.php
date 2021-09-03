<?php
switch (@$_GET['page']) {
    case 'profil':include 'pages/profil.php';break;
    case 'categorie':include 'pages/categorie.php';break;
    case 'ajouter_categorie':include 'pages/ajouter_categorie.php';break;
    case 'produit':include 'pages/produit.php';break;
    case 'vente':include 'pages/vente.php';break;
    case 'comptabiliter':include 'pages/comptabiliter.php';break;
    case 'ajouter_produit':include 'pages/ajouter_produit.php';break;
    case 'stock':include 'pages/stock.php';break;
    case 'listeapprovisionner':include 'pages/listeapprovisionner.php';break;
    case 'approvisionner':include 'pages/approvisionner.php';break;
    case 'supp':include 'pages/supprimer.php';break;
    case 'ajouter_vente':include 'pages/ajouter_vente.php';break;
    case 'liste_vente':include 'pages/liste_vente.php';break;
    case 'panier':include 'pages/panier.php';break;
    case 'voirProduit':include 'pages/voirProduit.php';break;

    default:include 'pages/accueil.php';
        break;
}
