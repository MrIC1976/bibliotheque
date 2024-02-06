<?php

namespace App\model;
use PDO;

class Model {
    private static $pdo = null;
    public $connection;

    // Constructeur privé pour empêcher l'instanciation depuis l'extérieur de la classe
    private function __construct() {
        // Initialisez votre connexion à la base de données ici
        $this->connection = new PDO('mysql:host=localhost;dbname=biblioteque', 'root', '');
    }

    // Méthode statique pour récupérer l'instance unique de la classe Model
    public static function getBdd(): self {
        if (self::$pdo === null) {
            self::$pdo = new self();
        }
        return self::$pdo;
    }

    // evite l'utilisation de la fonction magique __clone
    protected function __clone() { }

    // empeche la desserialisation
    public function __wakeup()
    {
        throw new \Exception("impossible de désserialiser");
    }

}

