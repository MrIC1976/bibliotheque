<h1 class="text-primary text-center">Affichage des livres</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?= URL ?>livre_create"><button type="button" class="btn btn-primary">Ajouter</button></a>
        </div>
    </div>
</div>
<table class='table'>
    <thead>
        <tr>
            <th>N°</th>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Description</th>
            <th>Poids</th>
            <th>Date</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($datas as $ligne) : ?>
            <tr>
                <td><?= $ligne['id'] ?></td>
                <td><?= $ligne['titre'] ?></td>
                <td><?= $ligne['auteur'] ?></td>
                <td><?= $ligne['description'] ?></td>
                <td><?= $ligne['poids'] ?></td>
                <td><?= $ligne['date'] ?></td>
                <td><button type="button" class="btn btn-primary">Modifier</button></td>
                <td><button type="button" class="btn btn-primary">Supprimer</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>