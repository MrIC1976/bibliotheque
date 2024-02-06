<?php 

namespace App\Model;

interface MembreInterface {
    public function getNom(): string;
    public function getPrenom(): string;
    public function getRole(): string;
    public function getUsername(): string;
    public function getPassword(): string;
    public function getEmail(): string;
}