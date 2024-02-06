<?php
namespace App\Controller;

use App\Model\LivreManager;
use App\Model\MainManager;
use App\Model\SortContext;
use App\Model\TitleStrategy;
use App\Service\Render;
use App\Service\Toolbox;
use App\Model\FactoryLivre;
use Exception;

class LivreController extends Render {

    private LivreManager $livreManager;
    private Toolbox $toolbox;

    public function __construct()
    {
        parent::__construct();
        $this->toolbox = new Toolbox();
        $this->livreManager = new LivreManager();
    }

    public function index() {
        $data = $this->livreManager->readAll();
        $data_page = [
            'page_description' => "Page Gestion des Livres",
            'page_title' => 'Livres',
            'datas' => $data,
            'view' => 'Views/livres.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function create() {
        $data_page = [
            'page_description' => "Page ajout d'un livre",
            'page_title' => 'Ajout livre',
            'view' => 'Views/livre.create.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }

    public function validationCreationLivre() {
        $livre = array(
            "titre"=> $_POST['titre'],
            "auteur"=> $_POST['auteur'],
            "type"=> $_POST['type'],
            "description"=> $_POST['description'],
            "poids"=> $_POST['poids'],
            "date"=> $_POST['date'],
        );
        try{
            $this->livreManager->create(FactoryLivre::create($livre));
            $this->toolbox->addAlert(Toolbox::GREEN, 'Livre ajouté avec succès');
            $data_page = [
                'page_description' => 'Accueil',
                'page_title' => 'accueil',
                'view' => 'Views/accueil.view.php',
                'template' => 'Views/Layouts/base.php'
            ];
            $this->render($data_page);
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $data_page = [
                'page_description' => "C'est la page d'acceuil d'erreur",
                'page_title' => 'Page erreur',
                'view' => 'Views/error.view.php',
                'template' => 'Views/Layouts/base.php',
                'msg' => $msg,
            ];
            $this->render($data_page);
        }
    }

    public function trierLivresParTitre() {
        $data = $this->livreManager->readAll();
        var_dump($data);
        $sortStrategy = new SortContext(new TitleStrategy);
        $data_sort = $sortStrategy->sort($data);
        $data_page = [
            'page_description' => "Page Gestion des Livres",
            'page_title' => 'Livres',
            'datas' => $data_sort,
            'view' => 'Views/livres.view.php',
            'template' => 'Views/Layouts/base.php'
        ];
        $this->render($data_page);
    }
}