<?php

include_once 'autoload.php';

class TypeEvenementManager{

    private $pdo;


    public function __construct($pdo){
        $this->setPdo($pdo);
    }


    public function createTypeEvenementManager(TypeEvenement $typeEvenement){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("INSERT INTO typeevenement(code,libelle) VALUES (:code, :libelle)");

            $req->bindValue(':code', $typeEvenement->getCode(), PDO::PARAM_STR);
            $req->bindValue(':libelle', $typeEvenement->getLibelle(), PDO::PARAM_STR);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }


    public function updateTypeEvenementManager(TypeEvenement $typeEvenement){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("UPDATE typeevenement set libelle= :libelle, code= :code WHERE id= :id");

            $req->bindValue(':code', $typeEvenement->getCode(), PDO::PARAM_STR);
            $req->bindValue(':libelle', $typeEvenement->getLibelle(), PDO::PARAM_STR);
            $req->bindValue(':id', $typeEvenement->getId(), PDO::PARAM_INT);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }


    public function deleteTypeEvenementManager($id){

        try {
            global $pdo;

            $pdo->beginTransaction();
            $req = $pdo->prepare("DELETE FROM typeevenement WHERE id= :id");

            $req->bindValue(':id', $id, PDO::PARAM_INT);

            $req->execute();
            $pdo->commit();

        } catch (Exception $ex) {
            $pdo->rollback();
            echo 'Erreur : ' . $ex->getMessage() . '<br />';
            echo 'N° : ' . $ex->getCode();
            echo "Error: " . $req . "<br>" . $pdo->error;

            exit();
        }

    }


    public function getPdo()
    {
        return $this->pdo;
    }


    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }


}