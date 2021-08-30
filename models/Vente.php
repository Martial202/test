<?php

class Vente
{
   
    /*public $db;

    public function __construct()
    {
        $cnx = Connnexion::getConnexion();
    }

*/

    public function ajouterVente($motant)
    {
        $sql = "INSERT INTO vente(idvente,montant) VALUES (null,?)";
        $result = 0;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $montant);
            if ($query->execute()) {
                $result = $query->lastInsertId();
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }

    // public function modifierVente($qte, $pu, $id)
    // {
    //     $sql = "UPDATE approvisionner SET qte_app=?, pu_app=? WHERE idapp =?";
    //     $result = false;
    //     try {
    //         $query = $cnx->prepare($sql);
    //         $query->bindParam(1, $qte);
    //         $query->bindParam(2, $pu);
    //         $query->bindParam(3, $id);
    //         if ($query->execute()) {
    //             $result = true;
    //         }
    //     } catch (PDOException $exc) {
    //         echo $exc->getMessage();
    //     }
    //     return $result;
    // }

    public function getQte($table,$champ,$idprod)
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
    
    public function getNombreProd($id)
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

        public function listeVenteActuel($date,$cnx)
    {
        $sql = "SELECT * FROM vente WHERE date_vente=? ORDER BY date_vente DESC ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute(array($date));
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : ' . $ex->getMessage();
        }
        return $data;
    }

    public function singleVente($id)
    {
        $sql = "SELECT v.*, l.*, p.libelle_prod, p.idprod FROM vente v, ligne l, produit p WHERE p.idprod = l.idprod AND v.idvente = l.idvente AND v.idvente = 1";
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
    
    public function getMontant($id)
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
    
        public function ll()
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
