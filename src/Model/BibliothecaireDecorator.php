<?php

namespace App\Model;

class BibliothecaireDecorator extends MembreDecorator
{
    public function getNombreLivre(): int
    {
        return $this->reservation->getNombreLivre() ;
    }
}


