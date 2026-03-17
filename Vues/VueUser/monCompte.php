<div class="container my-5">
    <h2>Mon compte</h2>

    <p><strong>Nom :</strong> <?= $_SESSION['user']['nom'] ?></p>
    <p><strong>Email :</strong> <?= $_SESSION['user']['email'] ?></p>

    <a href="index.php?page=modifierCompte" class="btn btn-primary mt-3">Modifier mes informations</a>
</div>

<?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-success text-center">
        <?= $_SESSION['message'];
        unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>
