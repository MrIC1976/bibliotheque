<?php
namespace App\Model;

use App\Service\Toolbox;
use PDO;

class EmpruntManager extends MainManager{

    private $toolbox;
    public function __construct()
    {
        $this->toolbox = new Toolbox();
    }

    public function createEmprunt($idLivre, $idClient, $idBibliothecaire){
        $req = Model::getBdd()->connection->prepare('INSERT INTO emprunt (dateEmprunt, dateRetour, idLivre, idClient, idBibliothecaire) VALUES (NOW(), DATE_ADD(NOW(), INTERVAL 1 MONTH), :idLivre, :idClient, :idBibliothecaire)');
        $req->bindValue('idLivre', $idLivre, PDO::PARAM_INT);
        $req->bindValue('idClient', $idClient, PDO::PARAM_INT);
        $req->bindValue('idBibliothecaire', $idBibliothecaire, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();

    }
    public function updateEmprunt($idEmprunt){
        $req = Model::getBdd()->connection->prepare('UPDATE emprunt SET dateRetour = NOW() WHERE id = :idEmprunt');
        $req->bindValue('idEmprunt', $idEmprunt, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

    public function deleteEmprunt($idEmprunt){
        $req = Model::getBdd()->connection->prepare('DELETE FROM emprunt WHERE id = :idEmprunt');
        $req->bindValue('idEmprunt', $idEmprunt, PDO::PARAM_INT);
        $req->execute();
        $req->closeCursor();
    }

    public function getEmpruntById($idEmprunt){
        $req = Model::getBdd()->connection->prepare('SELECT * FROM emprunt WHERE id = :idEmprunt');
        $req->bindValue('idEmprunt', $idEmprunt, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getEmpruntsByClient($idClient){
        $req = Model::getBdd()->connection->prepare('SELECT * FROM emprunt WHERE idClient = :idClient');
        $req->bindValue('idClient', $idClient, PDO::PARAM_INT);
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}