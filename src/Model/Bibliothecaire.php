<?php
namespace App\Model;
Class Bibliothecaire extends Membre implements Observateur{
public function actualiser(Sujet $sujet): void{

    echo "Le bibliothécaire a été notifié de l'emprunt du Livre ".$sujet['titre']." par le client ".$sujet['client']."\n";
}

}