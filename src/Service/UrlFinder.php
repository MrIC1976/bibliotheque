<?php

namespace App\Service;

class UrlFinder
{
    public static function getUrl(): string
    {
        if (empty($_GET['page'])){
            $page = 'accueil';
        } else{
            $url = explode('/', filter_var($_GET['page'], FILTER_SANITIZE_URL));
            $page = $url[0];
        }
        return $page;
    }
}