<div class="container my-5">
    <h2>Modifier mes informations</h2>
    <form method="POST" action="index.php?page=updateCompte">
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nomClient" class="form-control"
                   value="<?= $_SESSION['user']['nom'] ?>" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="mailClient" class="form-control"
                   value="<?= $_SESSION['user']['email'] ?>" required>
        </div>

        <button class="btn btn-success">Enregistrer</button>
    </form>
    
</div>
