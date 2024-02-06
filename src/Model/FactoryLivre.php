<?php
class LivreFactory{
    public static function create(array $data): Livre{
        switch($data['isDigital']){
            case 0:
                return new LivrePhysique($data);
            case 1:
                return new LivreDigital($data);
        }
    }
}