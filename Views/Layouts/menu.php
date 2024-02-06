<?php
use App\Service\SecurityService;
?>

<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="<?= URL ?>accueil" class="nav-link px-2 link-secondary">Accueil</a></li>
    <?php if (SecurityService::isAdmin()):?> <li><a href="<?= URL ?>membre_list" class="nav-link px-2">Membres</a></li> <?php endif;?>
    <li><a href="#" class="nav-link px-2">Pricing</a></li>
    <li><a href="<?= URL ?>livre" class="nav-link px-2">Livres</a></li>
    <li><a href="#" class="nav-link px-2">About</a></li>
</ul>