<div class="container my-5">
    <h3 class="display-5 mb-3" style="color: black; font-weight: bold;">Votre panier</h3>
    <?php if (empty($produits)): ?>
        <p style="color: red;">Votre panier est vide.
            <a href="index.php?page=catalogue">
                Retour au catalogue
            </a>
        </p>
        <?php else: ?>
            <?php if (!empty($_SESSION['message'])): ?>
            <div class="alert alert-success text-center">
                <?= $_SESSION['message'];
                unset($_SESSION['message']); ?>
            </div>
        <?php endif; ?>
        <table class="table table-bordered">
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
                        <td data-label="Image">
                            <img src="Images/<?= htmlspecialchars($p['image']) ?>" style="max-width: 50px;" class="img-fluid">
                        </td>

                        <td data-label="Produit"><?= htmlspecialchars($p['nomProduit']) ?></td>

                        <td data-label="Prix"><?= number_format($p['prix'] , 2, ',', ' ') ?> €</td>

                        <!-- Quantité -->
                        <td data-label="Quantité">
                            <a href="index.php?page=diminuer&id=<?= $p['idProduit'] ?>"
                                onclick="return confirm('Diminuer la quantité de ce produit ?');"
                                class="btn btn-outline-secondary btn-sm">-</a>

                            <span><?= number_format($p['quantite']) ?></span>

                            <a href="index.php?page=augmenter&id=<?= htmlspecialchars($p['idProduit']) ?>"
                                class="btn btn-outline-secondary btn-sm">+</a>
                        </td>

                        <!-- Total ligne -->
                        <td data-label="Tota_ligne" style="color: red; font-weight: bold;">
                            <?= number_format($p['total_ligne']) ?> €
                        </td>

                        <!-- Supprimer -->
                        <td data-label="Supprimer">
                            <a href="index.php?page=supprimer&id=<?= htmlspecialchars($p['idProduit']) ?>"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce produit du panier ?');"class="btn btn-danger btn-sm">
                              <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text d-flex justify-content-between align-items-center mt-3">
            <h3 style="color: red">Total : <?= number_format($total) ?> €</h3>
            <a href="index.php?page=viderPanier"  onclick="return confirm('Voulez-vous vraiment vider votre panier ?');"class="btn btn-danger">
                Vider le panier
            </a>
            <a href="index.php?page=commande" class="btn btn-success">
                Valider la commande
            </a>

        </div>

    <?php endif; ?>
</div>