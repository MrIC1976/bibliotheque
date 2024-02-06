<?php

namespace App\Model;

interface Observateur{
    public function actualiser(Sujet $sujet): void;
}

?>