<?php

namespace App\Service;

use App\Model\Admin;
use App\Model\Membre;

class SecurityService
{
    public static function isConnected(): bool{
        if (isset($_SESSION['user']) && $_SESSION['user'] instanceof Membre){
            return true;
        } else {
            return false;
        }
    }

    public static function isAdmin(): bool{
        if (self::isConnected() && $_SESSION['user'] instanceof Admin){
            return true;
        } else{
            return false;
        }
    }
}