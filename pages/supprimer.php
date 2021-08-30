<?php
include 'db/Connexion.php';
include 'models/Stock.php';
$stock = new Stock();
if (isset($_GET['idcat'])) {
    if ($stock->deleteItem("categorie", "idcat", $_GET['idcat'], $cnx)) {
        echo '<script>
                    alert("Categorie supprimée avec succes !");
                    window.location.href = "rooter.php?page=categorie";
                </script>';
    }
} elseif (isset($_GET['idprod'])) {
    if ($stock->deleteItem("produit", "idprod", $_GET['idprod'], $cnx)) {
        echo '<script>
                    alert("Produit supprimé avec succes !");
                    window.location.href = "rooter.php?page=produit";
                </script>';
    }
}elseif (isset($_GET['idapp'])) {
    if ($stock->deleteItem("approvisionner", "idapp", $_GET['idapp'] ,$cnx)) {
        echo '<script>
                    alert("Approvisionnement supprimé avec succes !");
                    window.location.href = "rooter.php?page=listappro";
                </script>';
    }
}
?>