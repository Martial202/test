<?php

class Vente
{

    // public $db;

    // public function __construct()
    // {
    //     $cnx = Connnexion::getConnexion();
    // }



    public function ajouterVente($ref, $montant,$cnx)
    {
        $sql = "INSERT INTO vente(idvente,refvente,montant) VALUES (null,?,?)";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $ref);
            $query->bindParam(2, $montant);
            if ($query->execute()) {
                $result = $cnx->lastInsertId();
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }

    public function ajouterLigne($idp, $idv, $qte, $pu,$cnx)
    {
        $sql = "INSERT INTO ligne(idprod,idvente,qte_ligne,pu_ligne) VALUES (?,?,?,?)";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $idp);
            $query->bindParam(2, $idv);
            $query->bindParam(3, $qte);
            $query->bindParam(4, $pu);
            if ($query->execute()) {
                $result = true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }

    public function modifierVente($qte, $pu, $id,$cnx)
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

    public function getQte($table, $champ, $idprod,$cnx)
    {
        $sql = "SELECT SUM($champ) as qte FROM $table WHERE idprod = ? ";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $idprod);
            $query->execute();
            $data = $query->fetch();
            $result = $data['qte'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }
    public function getTotQte($table, $champ,$cnx)
    {
        $sql = "SELECT SUM($champ) as qte FROM $table ";
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
    
    public function getTotDep($table, $champ1,$champ2,$cnx)
    {
        $sql = "SELECT SUM($champ1 * $champ2) as qte FROM $table ";
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
    

    public function getNombreProd($id,$cnx)
    {
        $sql = "SELECT COUNT(*) as nombre FROM ligne WHERE idvente = ? ";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            $data = $query->fetch();
            $result = $data['nombre'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $result;
    }

    public function listeVente($cnx)
    {
        $sql = "SELECT * FROM vente ORDER BY date_vente DESC ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function getQtePu($cnx)
    {
        $sql = "SELECT qte_app, pu_app FROM approvisionner";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function montTotByItem($qte,$pu,$table,$id,$cnx)
     
    {
       $sql = "SELECT SUM($qte * $pu) as montant FROM $table WHERE idprod=?";
       $data  = array();
       try {
        $query = $cnx->prepare($sql);
        $query->execute(array($id));
        $dat = $query->fetch();
        $data = $dat['montant'];
       } catch (PDOException $ex) {
         echo 'Erreur :' .$ex->getMessage();
       }
       return $data;
       
    }
    
    public function listeVenteActuelle($dat,$cnx)
    {
        $sql = "SELECT * FROM vente WHERE date_vente LIKE '%$dat%' ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function singleVente($id,$cnx)
    {
        $sql = "SELECT v.*, l.*, p.libelle_prod, p.idprod FROM vente v, ligne l, produit p WHERE p.idprod = l.idprod AND v.idvente = l.idvente AND v.idvente =?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);

            $query->bindParam(1, $id);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function getMontant($id,$cnx)
    {
        $sql = "SELECT SUM(qteligne) FROM vente v, ligne l, produit p WHERE p.idprod = l.idprod AND v.idvente = l.idvente AND v.idvente = 1";
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

    public function totalVente($cnx)
    {
        $sql = "SELECT SUM(montant) as montant FROM vente ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $dat = $query->fetch();
            $data = $dat['montant'];
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function ll($cnx)
    {
        $sql = "SELECT * FROM produit p, approvisionner a WHERE p.idprod = a.idprod ORDER BY a.date_app DESC ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }
}
