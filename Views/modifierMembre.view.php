<form class="mt-2" method="post" action="validation_modifier_membre">
    <h1 class="h3 mb-3 fw-normal">Ajoutez un membre</h1>

    <input type="hidden" value="<?= $membre['id'] ?>" name="id" id="id">
    <div class="form-floating my-3">
        <input type="text" value="<?= $membre['nom'] ?>" class="form-control" name="nom" id="nom" placeholder="Robert">
        <label for="nom">Nom</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" value="<?= $membre['prenom'] ?>" name="prenom" id="prenom" placeholder="Dupont">
        <label for="prenom">Prénom</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" value="<?= $membre['username'] ?>" name="username" id="username" placeholder="RobertDupont62">
        <label for="username">Username</label>
    </div>
    <div class="form-floating my-3">
        <input type="email" class="form-control" name="email" <?= $membre['email'] ?> id="email" placeholder="RobertDupont@gmail.com">
        <label for="email">Username</label>
    </div>
    <div class="my-3">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="role">
            <option value="admin" <?php if ($membre['role'] === 'admin'):?> selected <?php endif;?>>Administrateur</option>
            <option value="bibliothecaire" <?php if ($membre['role'] === 'bibliothecaire'):?> selected <?php endif;?>>Bibliothecaire</option>
            <option value="client" <?php if ($membre['role'] === 'client'):?> selected <?php endif;?>>Client</option>
        </select>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Modifier</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
</form>