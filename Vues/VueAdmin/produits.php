<div class="container my-5">

    <h2 class="mb-4">Gestion des produits</h2>

    <a href="index.php?page=adminAjouterProduit" class="btn btn-success mb-3">+ Ajouter un produit</a>

    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-info"><?= $_SESSION['message'];
                                        unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <table id="tableProduits" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Prix</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody>
            <?php foreach ($produits as $p): ?>
                <tr>
                    <td><?= $p['idProduit'] ?></td>
                    <td><img src="Images/<?= $p['image'] ?>" width="60"></td>
                    <td><?= $p['nomProduit'] ?></td>
                    <td><?= $p['description'] ?></td>
                    <td><?= $p['nomCategorie'] ?></td>
                    <td><?= $p['prix'] ?> €</td>
                    <td>
                        <a href="index.php?page=adminModifierProduit&id=<?= $p['idProduit'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                        <a href="index.php?page=adminSupprimerProduit&id=<?= $p['idProduit'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce produit ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="#" class="back-to-top" style="position: fixed;bottom: 20px;right: 20px;font-size: 3rem;color: red;
    cursor: pointer;z-index: 999;transition: 0.3s;">
    <i class="bi bi-arrow-up-circle-fill"></i>
</a>