<div class="container my-5">
    <h2>Ajouter un produit</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nom du produit</label>
            <input type="text" name="nomProduit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Prix</label>
            <input type="number" step="0.01" name="prix" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Catégorie</label>
            <select name="idCategorie" class="form-control" required>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= $c['idCategorie'] ?>"><?= $c['nomCategorie'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn btn-success">Ajouter</button>
    </form>
</div>
