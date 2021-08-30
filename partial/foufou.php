<?php 

   if ($produit->getElement("approvisionner","qte_app","idprod",$data['idprod'],$cnx)!=0) {
      $qte_app = $produit->getElement("approvisionner","qte_app","idprod",$data['idprod'],$cnx);
    } else {
        $qte_app = 0;
   }

   if ($produit->getElement("ligne","qte_ligne","idprod",$data['idprod'],$cnx)!=0) {
      $qte_ligne = $produit->getElement("ligne","qte_ligne","idprod",$data['idprod'],$cnx);
    } else {
        $qte_ligne = 0;
   }
  
      // Stock Final
      $StockF = $qte_app-$qte_ligne;

      //Algorithme Status
      $StockC = $data['critique'];
        if ($StockC<$StockF) {
        	$msg = '<strong class="text-success">Stock satisfaisant !</strong>';
        } elseif($StockC>$StockF) {
        	$msg = '<strong class="text-danger">Approvisionnement Urgent !</strong>';
        }else{
           $msg = '<strong class="text-warning">Approvisionnement Necessaire !</strong>';
        }
        
 ?>