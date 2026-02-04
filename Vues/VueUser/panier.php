<h2 class="mb-4">Votre panier</h2>

<?php if (empty($produits)): ?>
    <p>Votre panier est vide.</p>
<?php else: ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($produits as $p): ?>
            <tr>
                <td><?= $p['info']['nomProduit'] ?></td>
                <td><?= $p['info']['prix'] ?> €</td>
                <td><?= $p['quantite'] ?></td>
                <td><?= $p['info']['prix'] * $p['quantite'] ?> €</td>
                <td>
                    <a href="index.php?page=supprimerPanier&id=<?= $p['info']['idProduit'] ?>"
                       class="btn btn-danger btn-sm">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php?page=commande" class="btn btn-primary">Passer commande</a>

<?php endif; ?>
