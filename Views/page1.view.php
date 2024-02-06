<h1 class="text-primary text-center">La page 1</h1>

<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Colonnes avec icônes</font></font></h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <?php foreach ($datas as $ligne): ?>
        <div class="feature col">
            <h3 class="fs-2 text-body-emphasis"><?= $ligne['name'] ?></h3>
            <p><?= $ligne['description'] ?></p>
            <a class="btn btn-primary">
                        click my friend
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
