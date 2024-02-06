<form class="mt-2" method="post" action="validation_ajout_livre">
    <h1 class="h3 mb-3 fw-normal">Ajoutez un livre</h1>

    <div class="form-floating my-3">
        <input type="text" class="form-control" name="titre" id="titre">
        <label for="titre">Titre</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" name="auteur" id="auteur">
        <label for="auteur">Auteur</label>
    </div>
    <div class="form-floating my-3">
        <input type="text" class="form-control" name="description" id="description">
        <label for="description">Description</label>
    </div>
    <div class="form-floating my-3">
        <input type="number" class="form-control" name="poids" id="poids">
        <label for="poids">Poids</label>
    </div>
    <div class="my-3">
        <label for="role">Type</label>
        <select class="form-control" name="type" id="type">
            <option value="digital">Numérique</option>
            <option value="physical">Physique</option>
        </select>
    </div>
    <div class="form-floating my-3">
        <input  type="date" class="form-control" id="date" name="date">
        <label for="date">Date</label>
    </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Valider</button>
    <p class="mt-5 mb-3 text-body-secondary">© 2017–2023</p>
</form>