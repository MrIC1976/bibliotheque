<?php

namespace App\Service;

class SecurityService
{
    public static function isConnected(): bool{
        if (isset($_SESSION['user']) && $_SESSION['user'] instanceof \Membre){
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin(): bool{
        if (self::isConnected() && $_SESSION['user'] instanceof \Admin){
            return true;
        } else{
            return false;
        }
    }
}