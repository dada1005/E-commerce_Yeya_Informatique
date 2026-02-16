<div class="container my-5" style="max-width: 500px;
    min-height: 100vh; align-items: center">
    <?php if (!empty($_SESSION['message'])): ?>
        <div class="alert alert-danger text-center">
            <?= $_SESSION['message'];
            unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>
    <form action="index.php?page=connecterAdmin" method="POST"
        style="margin: 0 auto; max-width: 450px; width: 80%; padding: 20px;
      box-shadow: 2px 2px 25px black; background-color: rgba(245, 245, 245, 0.86);
      border-radius: 5px;">

        <h2 class="mb-4 text-center" style="color: red;">Login</h2>

        <div class="mb-3">
            <label style="font-size: 1.2em; font-weight: bold; color: black;">Email</label>
            <input type="email" name="mailAdmin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label style="font-size: 1.2em; font-weight: bold; color: black;">Mot de passe</label>
            <input type="password" name="mdpAdmin" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">connexion</button>

        <p style="text-align: center;">ou</p>

        <!--  Bouton pour aller vers l'inscription -->
        <div class="text-center mt-3">
            <a href="index.php?page=inscription"
                class="btn btn-primary w-100">
                Créer un compte
            </a>
        </div>

    </form>
</div>