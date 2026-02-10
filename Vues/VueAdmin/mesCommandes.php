<div class="container my-5">
    <h2 class="mb-4">Mes commandes</h2>

    <?php if (empty($commandes)): ?>
        <p>Aucune commande pour le moment.</p>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Commande</th>
                    <th>Date</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commandes as $c): ?>
                    <tr>
                        <td><?= $c['idCommande'] ?></td>
                        <td><?= $c['dateCommande'] ?></td>
                        <td><?= $c['totalCommande'] ?> €</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
