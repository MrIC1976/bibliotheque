<?php
namespace App\Model;


class AuthorStrategy implements SortStrategy {

    public function sort($input) : array{
        array_multisort(array_column($input, 'date'), SORT_ASC, $input);
        return $input;
    }
}