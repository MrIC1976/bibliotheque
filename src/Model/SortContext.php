<?php

namespace App\Model;

require_once('SortStrategy.php');
require_once('AuthorStrategy.php');



class SortContext {
    private $sortStrategy;

    public function __construct(SortStrategy $sortStrategy) {
        $this->sortStrategy = $sortStrategy;
    }

    public function sort($input) : array {
        return $this->sortStrategy->sort($input);
    }
}