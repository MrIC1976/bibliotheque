<?php
namespace App\Model;

use Exception;

class FactoryLivre{
    public static function create(array $data): Livre{
        switch($data['type']){
            case 'digital':
                return new LivrePhysique($data);
            case 'physical':
                return new LivreDigital($data);
            default:
                throw new Exception("Type de livre inconnu");   }
    }
}