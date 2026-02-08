<div class="container my-5">
    <h2 class="text-success">Commande confirmée !</h2>

    <p>Merci pour votre achat.</p>

    <?php if (isset($_GET['idCommande'])): ?>
        <p>Numéro de commande : <strong><?= htmlspecialchars($_GET['idCommande']) ?></strong></p>
    <?php endif; ?>

    <a href="index.php?page=catalogue" class="btn btn-primary mt-3">Retour au catalogue</a>
</div>
