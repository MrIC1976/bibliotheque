<?php

namespace App\Model;

use App\Service\Toolbox;
use Composer\Autoload\ClassLoader;
use PDO;

class MembreManager extends MainManager
{

    private $toolbox;

    public function __construct()
    {
        $this->toolbox = new Toolbox();
    }

    public function getAllMembre(): bool|array
    {
        $req = $this->getDb()->prepare('SELECT * FROM membre');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (!$datas){
            $datas = [];
        }
        return $datas;
    }
    public function getMembreOrNull(string $username): ?Membre
    {
        $req = $this->getDb()->prepare('SELECT * FROM membre WHERE username = :username');
        $req->bindValue('username', $username, PDO::PARAM_STR);
        $req->execute();
        $datas = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        if (!$datas){
            return null;
        }else{
            return FactoryMembre::create($datas);
        }
    }

    public function passwordVerify(Membre $membre, string $password): bool
    {
        return password_verify($password, $membre['password']);
    }

    public function connecte($username, $password): bool
    {
        $membre = $this->getMembreOrNull($username);
        if (!$membre instanceof Membre){
            return false;
        }
        if ($this->passwordVerify($membre, $password)){
            $_SESSION['user'] = $membre;
            return true;
        } else{
            return false;
        }
    }

    public function create(Membre $membre){
        $req = "INSERT INTO membre (nom, prenom, email, password, role, username) VALUES (:nom, :prenom, :email, :password, :role, :username)";
        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":nom", $membre['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $membre['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $membre['email'], PDO::PARAM_STR);
        $stmt->bindValue(':password', $membre['password'], PDO::PARAM_STR);
        $stmt->bindValue(':role', $membre['role'], PDO::PARAM_STR);
        $stmt->bindValue(':username', $membre['username'], PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0 );
        $stmt->closeCursor();
        return $estModifier;
    }

    public function edit(Membre $membre){
        $req = "UPDATE membre 
        SET nom = :nom, 
            prenom = :prenom, 
            email = :email, 
            role = :role, 
            username = :username 
        WHERE id = :id";

        $stmt = $this->getDb()->prepare($req);
        $stmt->bindValue(":id", $membre['id'], PDO::PARAM_INT);
        $stmt->bindValue(":nom", $membre['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $membre['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $membre['email'], PDO::PARAM_STR);
        $stmt->bindValue(':role', $membre['role'], PDO::PARAM_STR);
        $stmt->bindValue(':username', $membre['username'], PDO::PARAM_STR);
        $stmt->execute();
        $estModifie = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifie;

    }
}