<?php

use App\Service\Toolbox;
use App\Service\UrlFinder;

?>
<!doctype html>
<html data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $page_description ?>">
    <title><?= $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= URL ?>public/Css/mains.css">
    <?php if (!empty($page_css)) : foreach ($page_css as $fichier_css):?>
        <link rel="stylesheet" href="<?= URL ?>public/Css/ <?=$fichier_css ?>">
    <?php endforeach; endif;?>
</head>
<body>
<?php
$page = UrlFinder::getUrl();
if($page !== 'connexion'){ require_once 'Views/Layouts/header.php';}?>

<main class="container">
    <?php
    try {
        Toolbox::displayAlert();
    } catch (Exception $exception){
        throw new RuntimeException($exception->getMessage());
    }
    ?>
    <?= $page_content ?>
</main>

<?php if($page !== 'connexion'){ require_once 'Views/Layouts/footer.php';}?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php if (!empty($page_js)) : foreach ($page_js as $fichier_js):?>
    <script src="<?= URL ?>public/Css/ <?=$fichier_js ?>"></script>
<?php endforeach; endif;?>
</body>
</html>