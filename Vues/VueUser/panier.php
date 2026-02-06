<div class="container my-5">
    <h3 class="display-5 mb-3" style="color: black; font-weight: bold;">Votre panier</h3>

    <?php if (empty($produits)): ?>
        <p>Votre panier est vide.</p>
    <?php else: ?>

        <table class="table table-bordered mt-4">
            <thead>
                <tr style="color: black; font-weight: bold;">
                    <th>Image</th>
                    <th>Produit</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Total</th>
                    <th>Supprimer</th>

                </tr>
            </thead>

            <tbody>
                <?php foreach ($produits as $p): ?>
                    <tr style="font-style: 1.3rem; color: black">
                        <td>
                            <img src="Images/<?= $p['image'] ?>" style="max-width: 50px;" class="img-fluid">
                        </td>

                        <td><?= $p['nomProduit'] ?></td>

                        <td><?= $p['prix'] ?> €</td>

                        <!-- Quantité -->
                        <td>
                            <a href="index.php?page=diminuer&id=<?= $p['idProduit'] ?>"
                                class="btn btn-outline-secondary btn-sm">-</a>

                            <span><?= $p['quantite'] ?></span>

                            <a href="index.php?page=augmenter&id=<?= $p['idProduit'] ?>"
                                class="btn btn-outline-secondary btn-sm">+</a>
                        </td>

                        <!-- Total ligne -->
                        <td style="color: red; font-weight: bold;">
                            <?= $p['total_ligne'] ?> €
                        </td>

                        <!-- Supprimer -->
                        <td>
                            <a href="index.php?page=supprimer&id=<?= $p['idProduit'] ?>"
                                class="btn btn-danger btn-sm">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text d-flex justify-content-between align-items-center mt-3">
           <h3 style="color: red">Total : <?= $total ?> €</h3>
            <a href="index.php?page=viderPanier" class="btn btn-danger">
                Vider le panier
            </a>
        </div>

    <?php endif; ?>
</div>
