<?php
switch (@$_GET['page']) {
    case 'profil':
        $msg = "Profil";
        break;
    case 'categorie':
        $msg = "Categorie";
        break;
    case 'ajouter_categorie':
        $msg = '<a href="rooter.php?page=categorie">Categorie</a> / Nouvelle Categorie ';
        break;
    case 'produit':
        $msg = "Produit";
        break;
    case 'vente':
        $msg = "Vente";
        break;
    case 'ajouter_produit':
        $msg = '<a href="rooter.php?page=produit">Produit</a> / Nouveau Produit ';
        break;
    case 'listeapprovisionner':
        $msg = '<a href="rooter.php?page=produit">Produit</a> / Liste Approvisionnement ';
        break;
    case 'stock':
        $msg = '<a href="rooter.php?page=produit">Produit</a> / Situation du Stock ';
        break;

    default:$msg = "Accueil";
        break;
}
