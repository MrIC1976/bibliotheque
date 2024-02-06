<?php

namespace App\Model;

use FactoryMembre;
use Membre;
use PDO;

class MembreManager extends MainManager
{

    public function getMembreOrNull(string $username): ?Membre
    {
        $req = Model::getBdd()->connection->prepare('SELECT * FROM membre WHERE username = :username');
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
        return password_verify($password, $membre['password'], PASSWORD_DEFAULT);
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
}