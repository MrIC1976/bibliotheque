<?php

namespace App\Model;

use PDO;

class MainManager
{
    public function getDb(): PDO
    {
        return Model::getBdd()->connection;
    }
}