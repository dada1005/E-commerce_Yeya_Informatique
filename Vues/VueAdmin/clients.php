<div class="container my-5">
    <h2 class="mb-4">Liste des utilisateurs</h2>

    <?php if (empty($clients)): ?>
        <p>Aucune client enregistré pour le moment.</p>
    <?php else: ?>
    <table class="table table-striped" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['idClient']) ?></td>
                    <td><?= htmlspecialchars($client['nomClient']) ?></td>
                    <td><?= htmlspecialchars($client['mailClient']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
