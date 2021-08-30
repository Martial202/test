<?php

class User {

    private $idu;
    private $nom;
    private $login;
    private $password;

    /*public function __construct($nom, $login, $password) {
       $this->nom = $nom;
       $this->login = $login;
       $this->password = $password; 
    }*/

    function getIdu() {
        return $this->idu;
    }

    function getNom() {
        return $this->nom;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function setIdu($idu) {
        $this->idu = $idu;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    public function auth($login, $password, $cnx) {
        $sql = "SELECT * FROM user WHERE login = ? AND password = ?";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute(array($login, $password));
            $data = $query->fetch();
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $data;
    }

     public function singleUser($id, $cnx)
    {
        $sql = "SELECT * FROM user WHERE idu = ?";
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

        public function modifierUser($nom, $login, $new_password, $id, $cnx)
    {
        $sql = "UPDATE user SET nom = ?,login =?,password =? WHERE idu =?";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $nom);
            $query->bindParam(2, $login);
            $query->bindParam(3, $new_password);
            $query->bindParam(4, $id);
            if ($query->execute()) {
                $result = true;
            }
        } catch (PDOException $exc) {
            //echo $exc->getMessage();
        }
        return $result;
    }

    public function ajouterUser($nom, $login, $password, $cnx)
    {
        $sql = "INSERT INTO user (idu, nom, login, password) VALUES (NULL, ?, ?, ?)";
        $result = false;
        try {
            $query = $cnx->prepare($sql);
            $query->bindParam(1, $nom);
            $query->bindParam(2, $login);
            $query->bindParam(3, $password);
            if ($query->execute()) {
                $result = true;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
        return $result;
    }
    /*
     public function test() {
        $sql = "SELECT * FROM categorie ";
        $data = array();
        try {
            $query = $cnx->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();
        } catch (PDOException $ex) {
            echo 'Erreur : '.$ex->getMessage();
        }
        return $data;
    }*/

}
