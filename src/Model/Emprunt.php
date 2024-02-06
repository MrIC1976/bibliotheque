<?php
namespace App\Model;
class Emprunt {
    private $id;
    private $dateEmprunt;
    private $dateRetour;
    private $livre;
    private $client;
    private $bibliothecaire;

    public function __construct($id, $dateEmprunt, $dateRetour, $livre, $client, $bibliothecaire) {
        $this->id = $id;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
        $this->livre = $livre;
        $this->client = $client;
        $this->bibliothecaire = $bibliothecaire;
    }

    public function getId() {
        return $this->id;
    }

    public function getDateEmprunt() {
        return $this->dateEmprunt;
    }

    public function getDateRetour() {
        return $this->dateRetour;
    }

    public function getLivre() {
        return $this->livre;
    }

    public function getClient() {
        return $this->client;
    }

    public function getBibliothecaire() {
        return $this->bibliothecaire;
    }
}