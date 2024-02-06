<?php

namespace App\Model;

use App\Service\Toolbox;
use Composer\Autoload\ClassLoader;
use PDO;

class LivreManager extends MainManager
{

    private $toolbox;

    public function __construct()
    {
        $this->toolbox = new Toolbox();
    }

    public function readAll(): array
    {
        $retour = [];
        $req = Model::getBdd()->connection->prepare('SELECT * FROM livre');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (!$datas){
            return null;
        }else{
            foreach ($datas as $data){
                array_push($retour,FactoryLivre::create($data));
            }
            return $retour;
        }
    }

    public function create(Livre $livre){
        $req = "INSERT INTO livre (titre, auteur, description, poids, date, type) VALUES (:titre, :auteur, :description, :poids, :date, :type)";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":titre", $livre['titre'], PDO::PARAM_STR);
        $stmt->bindValue(':auteur', $livre['auteur'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $livre['description'], PDO::PARAM_STR);
        $stmt->bindValue(':poids', $livre['poids'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $livre['date'], PDO::PARAM_STR);
        $stmt->bindValue(':type', $livre['type'], PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $estModifier;
    }

    public function delete($livre_id){
        $req = "DELETE FROM livre WHERE id=:idLivre";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":idLivre", $livre_id, PDO::PARAM_INT);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $estModifier;
    }

    public function update(Livre $livre){
        $req = "UPDATE livre SET titre = :titre, auteur = :auteur, description = :description, poids = :poids, date = :date, type = :type) WHERE id = :id";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":titre", $livre['titre'], PDO::PARAM_STR);
        $stmt->bindValue(':auteur', $livre['auteur'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $livre['description'], PDO::PARAM_STR);
        $stmt->bindValue(':poids', $livre['poids'], PDO::PARAM_STR);
        $stmt->bindValue(':date', $livre['date'], PDO::PARAM_STR);
        $stmt->bindValue(':type', $livre['type'], PDO::PARAM_STR);
        $stmt->bindValue(":id", $livre['id'], PDO::PARAM_INT);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $estModifier;
    }
    
}