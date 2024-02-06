<?php
namespace App\Model;

use ArrayAccess;

class Membre implements ArrayAccess {

    public function __construct(array $datas)
    {
        $this->container = $datas;
    }

    private $container = [
        "id"=> "",
        "nom"=> "",
        "prenom"=> "",
        "role"=> "",
        "username"=> "",
        "password"=> "",
        "email"=> "",
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
}