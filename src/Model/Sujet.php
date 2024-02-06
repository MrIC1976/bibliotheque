<?php

namespace App\Model;
interface Sujet{
    public function attacher(Observateur $observateur): void;
    public function detacher(Observateur $observateur): void;
    public function notifier(): void;
}

?>