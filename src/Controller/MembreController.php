<?php

namespace App\Controller;

use App\Model\FactoryMembre;
use App\Model\Membre;
use App\Model\MembreManager;
use App\Service\Render;
use App\Service\SecurityService;
use App\Service\Toolbox;

class MembreController extends Render
{
    private $toolbox;
    private $membreManager;

    public function __construct()
    {
        parent::__construct();
        $this->toolbox = new Toolbox();
        $this->membreManager = new MembreManager();
    }

    public function ajoutMembre(): void
    {
        if (!SecurityService::isAdmin()){
            $this->toolbox->addAlert(Toolbox::RED, 'Vous n\'avez pas la permission');
            header('Location:' . URL . "accueil");
        }
        $data_page = [
            'page_description' => 'Ajout de membre',
            'page_title' => 'Ajout de membre',
            'view' => 'Views/ajoutMembre.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function modifierMembre(): void
    {
        if (!SecurityService::isAdmin()){
            $this->toolbox->addAlert(Toolbox::RED, 'Vous n\'avez pas la permission');
            header('Location:' . URL . "accueil");
        }
        $membre = $this->membreManager->getMembreOrNull($_GET['username']);
        if (!$membre instanceof Membre){
            $this->toolbox->addAlert(Toolbox::RED, 'Le membre n\'a pas été trouvé');
            header('Location:' . URL . "membre_list");
        }
        $data_page = [
            'page_description' => 'Ajout de membre',
            'page_title' => 'Ajout de membre',
            'membre' => $membre,
            'view' => 'Views/modifierMembre.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function membreList(): void
    {
        if (!SecurityService::isAdmin()){
            $this->toolbox->addAlert(Toolbox::RED, 'Vous n\'avez pas la permission');
            header('Location:' . URL . "accueil");
        }
        $membres = $this->membreManager->getAllMembre();
        $data_page = [
            'page_description' => 'Liste des membres',
            'page_title' => 'Liste des membres',
            'membres' => $membres,
            'view' => 'Views/listMembre.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function validationAjoutMembre(): void
    {
        if (!SecurityService::isAdmin()){
            $this->toolbox->addAlert(Toolbox::RED, 'Vous n\'avez pas la permission');
            header('Location:' . URL . "accueil");
        }
        $membreData = [
            "nom"=> $_POST['nom'],
            "prenom"=> $_POST['prenom'],
            "role"=> $_POST['role'],
            "username"=> $_POST['username'],
            "password"=> $_POST['password'],
            "email"=> $_POST['email'],
        ];

        try {
            if ($this->membreManager->create(FactoryMembre::create($membreData))){
                $this->toolbox->addAlert(Toolbox::GREEN, 'Utilisateur créé avec succès');
            } else{
                $this->toolbox->addAlert(Toolbox::RED, 'La création a échoué');
            }
        } catch (\Exception $exception){
            $this->toolbox->addAlert(Toolbox::RED, 'Un problème est survenue'. $exception->getMessage());
        }
        header('Location:' . URL . "membre_list");
    }

    public function validationModifierMembre(): void
    {
        if (!SecurityService::isAdmin()){
            $this->toolbox->addAlert(Toolbox::RED, 'Vous n\'avez pas la permission');
            header('Location:' . URL . "accueil");
        }
        $membreData = [
            'id' => $_POST['id'],
            "nom"=> $_POST['nom'],
            "prenom"=> $_POST['prenom'],
            "role"=> $_POST['role'],
            "username"=> $_POST['username'],
            "email"=> $_POST['email'],
        ];

        try {
            if ($this->membreManager->edit(FactoryMembre::create($membreData))){
                $this->toolbox->addAlert(Toolbox::GREEN, 'Utilisateur modifié avec succès');
            } else{
                $this->toolbox->addAlert(Toolbox::RED, 'La modification a échoué');
            }
        } catch (\Exception $exception){
            $this->toolbox->addAlert(Toolbox::RED, 'Un problème est survenue'. $exception->getMessage());
        }
        header('Location:' . URL . "membre_list");
    }
}