<?php

namespace App\Model;

use ArrayAccess;

class Livre implements ArrayAccess, Sujet {

    private $observateurs = [];
    private $statut;
    private $container = [
        "id"=> "",
        "titre"=> "",
        "auteur"=> "",
        "isDigital"=> "",
        "description"=> "",
        "poids"=> "",
        "date"=> "",
    ];
    
    public function offsetSet($offset, $value): void {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset): void {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset): mixed {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    public function attacher(Observateur $observateur): void
    {
        $this->observateurs[] = $observateur;
    }
    public function detacher(Observateur $observateur): void
    {
        $key = array_search($observateur, $this->observateurs);
        if($key !== false){
            unset($this->observateurs[$key]);
        }
    }

    public function notifier(): void
    {
        foreach($this->observateurs as $observateur){
            $observateur->actualiser($this);
        }
    }
}