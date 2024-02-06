<?php 

namespace App\Model;

interface LivreInterface {
    public function getTitre(): string;
    public function getAuteur(): string;
    public function getisDigital(): bool;
    public function getPoids(): float;
    public function getDate(): string;
}