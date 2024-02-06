<?php
require_once 'vendor/autoload.php';
use App\Controller\MainController;
use App\Controller\MembreController;
use App\Controller\SecurityController;
use App\Model\MembreManager;
use App\Service\SecurityService;
use App\Service\Toolbox;
use App\Service\UrlFinder;

session_start();
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
    "://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

if (!is_array($_SESSION['alerts'])){
    $_SESSION['alerts'] = [];
}
$mainController = new MainController();
$securityController = new SecurityController();
$membreController = new MembreController();
$membreManager = new MembreManager();
$toolbox = new Toolbox();

try {
    $page = UrlFinder::getUrl();
    switch ($page){
        case 'accueil':
            $mainController->accueil();
            break;
        case 'connexion':
            if (SecurityService::isConnected()){
                $toolbox->addAlert(Toolbox::BLUE, 'Vous êtes dèjà connecté');
                header('Location: ' . URL . "accueil");
            }
            $securityController->connexion();
            break;
        case 'validate_connexion':
            if (empty($_POST['password']) || empty($_POST['username'])){
                $toolbox->addAlert(Toolbox::RED, "vous n'avez pas renseigné tout les paramêtre");
                header('Location: ' . URL . "connexion");
            } else{
                $securityController->validationConnexion();
            }
            break;
        case 'deconnexion':
            $securityController->deconnexion();
            break;

        case 'ajoutMembre':
            $membreController->ajoutMembre();
            break;
        case 'validation_ajout_membre':
            $membreController->validationAjoutMembre();
            break;
        case 'membre_list':
            $membreController->membreList();
            break;
        case 'modifier_membre':
            if (empty($_GET['username'])){
                $toolbox->addAlert(Toolbox::RED, 'Petit filou va');
                header('Location: ' . URL . "membre_list");
            }
            $membreController->modifierMembre();
            break;
        case 'validation_modifier_membre':
            $membreController->validationModifierMembre();
            break;
        default:
            throw new Exception("Cette page n'exsite pas");
    }
} catch (Exception $exception){
    $mainController->pageErreur($exception->getMessage());
}