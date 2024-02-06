<?php
namespace App\Model;


class TitleStrategy implements SortStrategy {

    public function sort($input) : array{
        var_dump($input);
        array_multisort(array_column($input, 'titre'), SORT_ASC, $input);
        return $input;
    }
}