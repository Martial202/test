<?php


class Categorie {

    private $idcat;
    private $libelle_cat;

    /*public function __construct() {
        $this->db = Connnexion::getConnexion();
    }

    public function getIdcat() {
        return $this->idcat;
    }

    public function getLibelle_cat() {
        return $this->libelle_cat;
    }

    public function setIdcat($idcat) {
        $this->idcat = $idcat;
    }

    public function setLibelle_cat($libelle_cat) {
        $this->libelle_cat = $libelle_cat;
    }
*/
    public function ajouterCat($libelle, $cnx) {
        $sql = "INSERT INTO categorie SET libelle_cat=?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            if ($query->execute(array($libelle))) {
                $result = true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }

    public function modifierCat($libelle, $id, $cnx) {
        $sql = "UPDATE categorie SET libelle_cat=? WHERE idcat=?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            if ($query->execute(array($libelle,$id))) {
                $result = true;
            }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        return $result;
    }
    
    public function getMtnVdu($id,$cnx)
    {
        $sql = "SELECT SUM(qte_ligne * pu_ligne) as qte FROM vente v,ligne l WHERE v.idvente=l.idvente AND l.idprod=? ";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function getTotVteByProd($id,$cnx)//Total Montant apres vente
    {
        $sql = "SELECT SUM(p.pu_prod * a.qte_app) as vte FROM produit p, approvisionner a WHERE p.idprod=a.idprod AND p.idprod=?";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['vte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function getotQteProd($id,$cnx)//Total Quantité Produit 
    {
        $sql = "SELECT SUM(qte_app) as qte FROM approvisionner WHERE idprod=?";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function getQteVte($id,$cnx)//Total Quantité Produit vendu
    {
        $sql = "SELECT SUM(qte_ligne) as qte FROM vente v, ligne l WHERE v.idvente=l.idvente AND l.idprod=?";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function verif($libelle, $cnx) {
        $sql = "SELECT idcat FROM categorie WHERE libelle_cat = ? ";
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
      public function getCat($cnx) {
        $sql = "SELECT * FROM categorie";
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
      
    public function getProdToCat($id=null,$cnx) {
        $sql = " SELECT * FROM produit ";
          if (!is_null($id)) {
             $sql .= " WHERE idcat=?";
          }
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            !is_null($id)? $query->bindParam(1,$id) : "";
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $data;
    }
    
    public function getTotDep($table, $champ1,$champ2,$id,$cnx)
    {
        $sql = "SELECT SUM($champ1 * $champ2) as champ FROM $table WHERE idprod=?";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1,$id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['champ'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    
    public function singleCat($id,$cnx) {
        $sql = "SELECT * FROM categorie WHERE idcat=? ";
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
