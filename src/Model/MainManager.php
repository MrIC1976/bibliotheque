<?php

namespace App\Model;

require_once('Model.php');

class MainManager extends Model
{
    public function getData(): bool|array
    {
        $req = $this->getBdd()->prepare('SELECT * FROM matable');
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}