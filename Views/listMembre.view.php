<h1 class="text-primary text-center">Affichage des Membre</h1>
<div class="container">
    <div class="row">
        <div class="col">
            <a href="<?=URL?>ajoutMembre" type="button" class="btn btn-primary">Ajouter</a>
        </div>
    </div>
</div>
<table class='table'>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>username</th>
        <th>roles</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($membres as $ligne) : ?>
        <tr>
            <td><?= $ligne['nom'] ?></td>
            <td><?= $ligne['prenom'] ?></td>
            <td><?= $ligne['username'] ?></td>
            <td><?= $ligne['role'] ?></td>
            <td><?= $ligne['email'] ?></td>
            <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?=$ligne['username']?>">
                    Modifier
                </button>
                <button type="button" class="btn btn-primary">Supprimer</button>
            </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="editModal<?=$ligne['username']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modifier le membre <?= $ligne['username'] ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-2" method="post" action="validation_modifier_membre">
                            <input type="hidden" value="<?= $ligne['id'] ?>" name="id" id="id">
                            <div class="form-floating my-3">
                                <input type="text" value="<?= $ligne['nom'] ?>" class="form-control" name="nom" id="nom" placeholder="Robert">
                                <label for="nom">Nom</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" value="<?= $ligne['prenom'] ?>" name="prenom" id="prenom" placeholder="Dupont">
                                <label for="prenom">Prénom</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="text" class="form-control" value="<?= $ligne['username'] ?>" name="username" id="username" placeholder="RobertDupont62">
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating my-3">
                                <input type="email" class="form-control" name="email" value="<?= $ligne['email'] ?>" id="email" placeholder="RobertDupont@gmail.com">
                                <label for="email">email</label>
                            </div>
                            <div class="my-3">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="admin" <?php if ($ligne['role'] === 'admin'):?> selected <?php endif;?>>Administrateur</option>
                                    <option value="bibliothecaire" <?php if ($ligne['role'] === 'bibliothecaire'):?> selected <?php endif;?>>Bibliothecaire</option>
                                    <option value="client" <?php if ($ligne['role'] === 'client'):?> selected <?php endif;?>>Client</option>
                                </select>
                            </div>
                            <button class="btn btn-primary w-100 py-2" type="submit">Modifier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </tbody>
</table>