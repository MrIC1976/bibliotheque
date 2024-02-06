<?php

namespace App\Controller;

use App\Model\MembreManager;
use App\Service\Render;
use App\Service\SecurityService;
use App\Service\Toolbox;

class SecurityController extends Render
{

    private MembreManager $membreManager;
    private Toolbox $toolbox;

    public function __construct()
    {
        parent::__construct();
        $this->membreManager = new MembreManager();
        $this->toolbox = new Toolbox();
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

    public function validationConnexion(){
        if ($this->membreManager->connecte($_POST['username'], $_POST['password'])){
            $this->toolbox->addAlert(Toolbox::GREEN, 'Vous êtes connecté');
            header('Location:' . URL . "accueil");
        } else{
            $this->toolbox->addAlert(Toolbox::RED, 'Mot de passe ou nom d\'utilisateur incorrecte');
            header('Location:' . URL . "connexion");
        }
    }

    public function deconnexion(){
        if (!SecurityService::isConnected()){
            $this->toolbox->addAlert(Toolbox::BLUE, 'Vous n\'êtes pas connecté');
        } else{
            $this->toolbox->addAlert(Toolbox::GREEN, 'Vous avez été deconnecté');
            unset($_SESSION['user']);
        }
        header('Location: ' . URL . "accueil");
    }
}