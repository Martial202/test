<?php


class Stock {

   /* private $idprod;
    private $libelle_prod;*/

    
    public function ajouterApp($qte, $pu, $idprod, $cnx) {
        $sql = "INSERT INTO approvisionner (qte_app, pu_app, idprod) VALUES (?, ?, ?)";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->BindParam(1,$qte);
            $query->BindParam(2,$pu);
            $query->BindParam(3,$idprod);
            if ($query->execute()) {
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
      public function getApp($cnx) {
        $sql = "SELECT *,libelle_prod FROM produit p, approvisionner a WHERE p.idprod=a.idprod";
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

    public function getElement($table,$champ,$value,$cnx) {
        $sql = "SELECT SUM($champ) as qte FROM $table WHERE idprod=?";
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

    public function singleProd($id, $cnx)
    {
        $sql = "SELECT * FROM produit p, approvisionner a WHERE p.idprod = a.idprod AND idapp = ?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);

            $query->bindParam(1, $id);
            $query->execute();
            $data = $query->fetch();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

     public function modifierApp($qte, $pu, $id, $cnx)
    {
        $sql = "UPDATE approvisionner SET qte_app=?, pu_app=? WHERE idapp =?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $qte);
            $query->bindParam(2, $pu);
            $query->bindParam(3, $id);
            if ($query->execute()) {
                $result = true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }

    public function singleApp($id,$cnx) {
        $sql = "SELECT * FROM approvisionner WHERE idapp=? ";
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
    

     public function deleteItem($table, $id, $value, $cnx)
    {
        $sql = "DELETE FROM $table WHERE $id =?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $value);
            if ($query->execute()) {
                $result = true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }


}
