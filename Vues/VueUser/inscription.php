<div class="container my-5" style="max-width: 500px;">
    
    <form action="index.php?page=inscrire" method="POST" style="margin: 0 auto; max-width: 450px; width: 80%; padding: 20px;
      box-shadow: 2px 2px 25px black; background-color: rgba(245, 245, 245, 0.86);
      border-radius: 5px;">

      <h2 class="mb-4 text-center">Créer un compte</h2>

        <div class="mb-3">
            <label style="font-size: 1.2em; font-weight: bold; color: black;">Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label style="font-size: 1.2em; font-weight: bold; color: black;">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
       
        <div class="mb-3">
            <label  style="font-size: 1.2em; font-weight: bold; color: black;">Mot de passe</label>
            <input type="password" name="motdepasse" class="form-control" required>
        </div>

        <button class="btn btn-primary w-100">Créer mon compte</button>
        
    </form>
</div>
