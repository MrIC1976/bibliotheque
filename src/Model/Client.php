<?php
namespace App\Model;
class Client extends Membre implements Observateur{

    public function actualiser(Sujet $sujet): void{
        echo "Le client a été notifié de l'emprunt du Livre ".$sujet['titre']."\n;";
    }
}