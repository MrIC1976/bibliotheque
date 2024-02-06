<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
        </div>

        <?php require_once 'menu.php'?>

        <div class="col-md-3 text-end">
            <a type="button" href="<?= URL ?>connexion" class="btn btn-outline-primary me-2">Connexion</a>
            <?php if (isset($_SESSION['user'])): ?><a type="button" href="<?= URL ?>deconnexion" class="btn btn-primary">Deconnexion</a><?php endif;?>
        </div>
    </header>
</div>