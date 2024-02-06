<form class="mt-2" method="post" action="validation_ajout_membre">
    <h1 class="h3 mb-3 fw-normal">Ajoutez un membre</h1>

    <div class="form-floating my-3">
        <input type="text" class="form-control" name="nom" id="nom" placeholder="Robert">
        <label for="nom">Nom</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Dupont">
        <label for="prenom">Prénom</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" name="username" id="username" placeholder="RobertDupont62">
        <label for="username">Username</label>
    </div>
    <div class="form-floating my-3">
        <input type="email" class="form-control" name="email" id="email" placeholder="RobertDupont@gmail.com">
        <label for="email">Username</label>
    </div>
    <div class="my-3">
        <label for="role">Role</label>
        <select class="form-control" name="role" id="role">
            <option value="admin">Administrateur</option>
            <option value="bibliothecaire">Bibliothecaire</option>
            <option value="client">Client</option>
        </select>
    </div>
    <div class="form-floating my-3">
        <input  type="text" class="form-control" id="password" name="password" placeholder="Password">
        <label for="password">Mot de passe</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Valider</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
</form>