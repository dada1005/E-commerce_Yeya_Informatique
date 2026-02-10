<div class="container my-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Créer un compte</h2>

    <form action="index.php?page=inscrire" method="POST">

        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
       
        <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Créer mon compte</button>
        
    </form>
</div>
