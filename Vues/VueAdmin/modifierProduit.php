<div class="container my-5">
    <h2>Modifier le produit</h2>

    <form method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label>Nom du produit</label>
            <input type="text" name="nomProduit" class="form-control" value="<?= htmlspecialchars($produit['nomProduit']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" required><?= htmlspecialchars($produit['description']) ?></textarea>
        </div>

        <div class="mb-3">
            <label>Prix</label>
            <input type="number" step="0.01" name="prix" class="form-control" value="<?= number_format($produit['prix']) ?>" required>
        </div>

        <div class="mb-3">
            <label>Image actuelle</label><br>
            <img src="Images/<?= htmlspecialchars($produit['image']) ?>" width="100">
        </div>

        <div class="mb-3">
            <label>Nouvelle image (optionnel)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Catégorie</label>
            <select name="idCategorie" class="form-control" required>
                <?php foreach ($categories as $c): ?>
                    <option value="<?= htmlspecialchars($c['idCategorie']) ?>" 
                        <?= htmlspecialchars($c['idCategorie'] == $produit['idCategorie'] ? 'selected' : '') ?>>
                        <?= htmlspecialchars($c['nomCategorie']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button class="btn btn-warning">Modifier</button>
    </form>
</div>
