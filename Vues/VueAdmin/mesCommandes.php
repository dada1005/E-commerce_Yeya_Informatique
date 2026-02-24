<div class="container my-5">
    <h2 class="mb-4">Mes commandes</h2>

    <?php if (empty($commandes)): ?>
        <p>Aucune commande pour le moment.</p>
    <?php else: ?>
        <table id="tableProduits" class="display">
            <thead>
                <tr>
                    <th>Numéro de la commande</th>
                    <th>Nom du client</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Détails</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $c): ?>
                    <tr>
                        <td><?= $c['idCommande'] ?></td>
                        <td><?= $c['nomClient'] ?></td>
                        <td><?= $c['dateCommande'] ?></td>
                        <td><?= $c['totalCommande'] ?> €</td>
                        <td> <a href="index.php?page=commande_detail&id=<?= $c['idCommande'] ?>">Voir</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<a href="#" class="back-to-top" style="position: fixed;bottom: 20px;right: 20px;font-size: 3rem;color: red;
    cursor: pointer;z-index: 999;transition: 0.3s;">
    <i class="bi bi-arrow-up-circle-fill"></i>
</a>