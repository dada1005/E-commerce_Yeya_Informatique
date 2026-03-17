<div class="container my-5">
    <h2 class="mb-4">Liste des utilisateurs</h2>

    <?php if (empty($clients)): ?>
        <p>Aucun client enregistré pour le moment.</p>
    <?php else: ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= htmlspecialchars($client['idUsers']) ?></td>
                    <td><?= htmlspecialchars($client['nomUsers']) ?></td>
                    <td><?= htmlspecialchars($client['mailUsers']) ?></td>
                    <td><?= htmlspecialchars($client['role']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
</div>
