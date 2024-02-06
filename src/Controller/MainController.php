<?php

namespace App\Controller;
use App\Model\MainManager;
use App\Service\Render;
use App\Service\Toolbox;


class MainController extends Render
{

    private MainManager $mainManager;
    private Toolbox $toolbox;

    public function __construct()
    {
        parent::__construct();
        $this->toolbox = new Toolbox();
        $this->mainManager = new MainManager();
    }

    public function accueil()
    {
        $data_page = [
            'page_description' => 'accueil la page',
            'page_title' => 'accueil',
            'view' => 'Views/accueil.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function page1()
    {
        $this->toolbox->addAlert(Toolbox::GREEN, 'alerte affiché avec succès');
        $data = $this->mainManager->getData();
        $data_page = [
            'page_description' => "C'est la page 1",
            'page_title' => 'Page 1',
            'datas' => $data,
            'view' => 'Views/page1.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function pageErreur($msg)
    {
        $data_page = [
            'page_description' => "C'est la page d'acceuil d'erreur",
            'page_title' => 'Page erreur',
            'view' => 'Views/Accueil/404.error.view.php',
            'template' => 'Views/Layouts/base.php',
            'msg' => $msg,
        ];
        $this->render($data_page);
    }
}