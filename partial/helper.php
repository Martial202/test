<?php
session_start();
include '../db/Connexion.php';
include '../models/Produit.php';
$msg = "";

  if (isset($_POST['id'])) {
  	  extract($_POST);
  	  $produit = new Produit(); // Creation d'un objet produit

  	  if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
  	  	   if (in_array($id, $_SESSION['cart'])) { // ici IN_ARRAY va nous permettre de voir si l'élement qu'on veux ajouter existe déjà
  	  	   $msg = 'Produit déjà ajouté dans le panier !';
  	  	   } else {
  	  	   	$_SESSION['cart'][] = $id;
  	  	   	$msg = 'Panier incrementé !';
  	  	   }
  	  	   
  	  } else {
  	  	$_SESSION['cart'][] = $id;
  	  	$msg = 'Produit ajouté !';
  	  }
  	  
  }
  echo json_encode([
           'msg' => $msg,
           'nb' => isset($_SESSION['cart'])? count($_SESSION['cart']) : 0

    ]);
   








?>