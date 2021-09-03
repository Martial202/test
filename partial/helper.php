<?php
session_start();
include '../db/Connexion.php';
include '../models/Produit.php';
$msg = "";
if (isset($_POST['action'])) {
    extract($_POST);
    $produit = new Produit();
    if ($_POST['action'] == "btnAddQte") {
        //$tabId = array_column($_SESSION['cart'], 'id');
        foreach ($_SESSION['cart'] as $key => $row) {
            if ($_SESSION['cart'][$key]['id'] == $id) {
                $_SESSION['cart'][$key]['qte'] =  $qte;
                break;
            }
        }
    } elseif ($_POST['action'] == "btnAddToCart") {
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            $key = array_column($_SESSION['cart'], 'id');
            if (in_array($id, $key)) {
                $msg = 'Désolé, cet élement existe déjà !';
            } else {
                $tab = array('id' => $id, 'sf' => $sf, 'qte' => $qte, 'pu' => $pu);
                $_SESSION['cart'][] = $tab;

                $msg = 'Element ajouté !';
            }
        } else {
            $tab = array('id' => $id, 'sf' => $sf, 'qte' => $qte, 'pu' => $pu);
            $_SESSION['cart'][] = $tab;
            $msg = 'Element ajouter';
        }
    } elseif ($_POST['action'] == "btnDimQte") {
        foreach ($_SESSION['cart'] as $key => $row) {
            if ($_SESSION['cart'][$key]['id'] == $id) {
                $_SESSION['cart'][$key]['qte'] =  $qte;
                break;
            }
        }
    } elseif ($_POST['action'] == "btnRemoveToCart") {
        foreach ($_SESSION['cart'] as $key => $row) {
            if ($_SESSION['cart'][$key]['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}

if (isset($_SESSION['cart'])) {
    $tt = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $tt = ($_SESSION['cart'][$key]['qte'] * $_SESSION['cart'][$key]['pu']) + $tt;
    }

    $_SESSION['total'] = $tt;
}

echo json_encode([
    'msg' => $msg,
    'nb' => isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0,
    'total' => isset($_SESSION['cart']) ? $_SESSION['total'] : 0,
]);
