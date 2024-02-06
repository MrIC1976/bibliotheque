<?php
require_once 'vendor/autoload.php';
use App\Controller\MainController;
use App\Controller\SecurityController;
use App\Service\UrlFinder;

session_start();
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
    "://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

$_SESSION['alerts'] = [];
$mainController = new MainController();
$securityController = new SecurityController();




try {
    $page = UrlFinder::getUrl();
    switch ($page){
        case 'accueil':
            $mainController->accueil();
            break;
        case 'connexion':
            $securityController->connexion();
            break;
        case 'valideConnexion':
            $securityController->valideConnexion();
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