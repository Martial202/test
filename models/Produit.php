<?php


class Produit {

   /* private $idprod;
    private $libelle_prod;*/

    
    public function ajouterProd($libelle, $pu, $critique, $idcat, $cnx) {
        $sql = "INSERT INTO produit (libelle_prod, pu_prod, critique, idcat) VALUES (?, ?, ?, ?)";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            if ($query->execute(array($libelle, $pu, $critique, $idcat))) {
                $result = true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }
    
    public function verif($libelle, $cnx) {
        $sql = "SELECT idprod FROM produit WHERE libelle_prod = ? ";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->execute(array($libelle));
            if ($query->rowCount()>0) {
                $result = true;
            }
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $result;
    }
      public function getProd($cnx) {
        $sql = "SELECT  p.*, c.libelle_cat categorie FROM produit p, categorie c WHERE p.idcat=c.idcat";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $data;
    }

       public function getProds($id,$cnx) {
        $sql = "SELECT libelle_prod FROM produit WHERE idprod=?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->BindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $mas = $data['libelle_prod'];
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $mas;
    }

    public function getProdsId($id,$cnx) {
        $sql = "SELECT idprod FROM produit WHERE idprod=?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->BindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $mas = $data['idprod'];
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $mas;
    }

    public function getElement($table,$champ,$id,$value,$cnx) {
        $sql = "SELECT SUM($champ) as qte FROM $table WHERE $id=?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->BindParam(1,$value);
            $query->execute();
            $data = $query->fetch();
            $dat = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $dat;
    }
    public function getTotVte($cnx)
    {
        $sql = "SELECT SUM(p.pu_prod * a.qte_app) as vte FROM produit p, approvisionner a WHERE p.idprod=a.idprod";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetch();
            $result = $data['vte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function getQteVte($cnx)
    {
        $sql = "SELECT SUM(qte_ligne) as qte FROM vente v, ligne l WHERE v.idvente=l.idvente";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetch();
            $result = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
     public function modifierProd($libelle,$pu,$crit,$cat, $id, $cnx) {
        $sql = "UPDATE produit SET libelle_prod=?, pu_prod=?, critique=?, idcat=? WHERE idprod=?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $libelle);
            $query->bindParam(2, $pu);
            $query->bindParam(3, $crit);
            $query->bindParam(4, $cat);
            $query->bindParam(5, $id);
            if ($query->execute()) {
                $result = true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    public function singleProd($id,$cnx) {
        $sql = "SELECT * FROM produit WHERE idprod=? ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute(array($id));
            $data = $query->fetch();
            //$data = $dat['libelle_cat'];
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $data;
    }

}
