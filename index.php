<?php
require_once 'vendor/autoload.php';
use App\Controller\MainController;
use App\Controller\SecurityController;
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
$membreManager = new \App\Model\MembreManager();
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
        case 'page1':
            $mainController->page1();
            break;
        default:
            throw new Exception("Cette page n'exsite pas");
    }
} catch (Exception $exception){
    $mainController->pageErreur($exception->getMessage());
}