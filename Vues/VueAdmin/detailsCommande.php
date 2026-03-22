<h2>Détail de la commande #<?= $commande['idCommande'] ?></h2>

<p><strong>Client :</strong> <?= $commande['nomUsers'] ?> (<?= $commande['mailUsers'] ?>)</p>
<p><strong>Date :</strong> <?= $commande['dateCommande'] ?></p>
<p><strong>Total :</strong> <?= $commande['totalCommande'] ?> €</p>

<h3>Produits</h3>

<table class="table table-bordered">
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th>Prix</th>
    </tr>

    <?php if (!empty($commande['lignes'])): ?>
        <?php foreach ($commande['lignes'] as $l): ?>
            <tr>
                <td><?= htmlspecialchars($l['nomProduit']) ?></td>
                <td><?= htmlspecialchars($l['quantite']) ?></td>
                <td><?= number_format($l['prix_unitaire']) ?> €</td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="3">Aucun produit dans cette commande.</td>
        </tr>
    <?php endif; ?>

</table>