<?php

namespace App\Controller;

use App\Model\MainManager;
use App\Service\Render;
use App\Service\Toolbox;

class SecurityController extends Render
{

    public function __construct()
    {
        parent::__construct();
    }

    public function connexion()
    {
        $data_page = [
            'page_description' => "Connexion",
            'page_title' => 'Page de connexion',
            'view' => 'Views/connexion.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }
    public function valideConnexion()
    {
    }
}