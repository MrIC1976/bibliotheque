<?php
namespace App\Model;
interface SortStrategy {
    public function sort(string $param) : array;
}