<?php

class MembreFactory{
    const ROLE_CLIENT = 'client';
    const ROLE_ADMIN = 'admin';
    const ROLE_BIBLIOTHECAIRE = 'bibliothecaire';
    public static function create(array $data): Membre{
        switch($data['role']){
            case self::ROLE_CLIENT:
                return new Client($data);
            case self::ROLE_ADMIN:
                return new Admin($data);
            case self::ROLE_BIBLIOTHECAIRE:
                return new Bibliothecaire($data);
        }
    }
}