<?php

namespace App\Model;

use PDO;

require_once('Model.php');

class MainManager
{
    public function getData(): bool|array
    {
        $req = Model::getBdd()->connection->prepare('SELECT * FROM matable');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}