<?php
namespace App\Model;

abstract class LivreDecorator implements LivreInterface
{
    protected LivreInterface $livre;

    public function __construct(LivreInterface $livre)
    {
        $this->livre = $livre;
    }
}