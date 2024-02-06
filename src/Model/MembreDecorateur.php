<?php
namespace App\Model;

abstract class MembreDecorator implements MembreInterface
{
    protected MembreInterface $reservation;

    public function __construct(MembreInterface $reservation)
    {
        $this->reservation = $reservation;
    }
}
