<?php
namespace App\Model;


class DateStrategy implements SortStrategy {

    public function sort($input) : array{
        array_multisort(array_column($input, 'date'), SORT_ASC, $input);
        return $input;
    }
}