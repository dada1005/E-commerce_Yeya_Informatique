<div class="container my-5">
    <h2 class="mb-4">Validation de votre commande</h2>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody >
            <?php foreach ($produits as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['nomProduit']) ?></td>
                    <td><?= number_format($p['quantite']) ?></td>
                    <td><?= number_format($p['total_ligne']) ?> €</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3 class="text-danger">Total : <?= number_format($total) ?> €</h3>

    <a href="index.php?page=confirmerCommande" class="btn btn-success">Confirmer la commande</a>

</div>