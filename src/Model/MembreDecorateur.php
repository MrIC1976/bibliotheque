<?php
namespace App\Model;

abstract class MembreDecorator implements MembreInterface
{
    protected MembreInterface $Membre;

    public function __construct(MembreInterface $Membre)
    {
        $this->Membre = $Membre;
    }
}