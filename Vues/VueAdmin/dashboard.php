<div class="container my-5">

    <h1 class="text-center mb-4">Tableau de bord administrateur</h1>

    <div class="row g-4">
        
        <!-- Gestion des produits -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <i class="bi bi-box-seam" style="font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color:red;">Produits</h4>
                    <p>Ajouter, modifier ou supprimer des produits.</p>
                    <a href="index.php?page=adminProduits" class="btn btn-primary w-100">Gérer les produits</a>
                </div>
            </div>
        </div>

        <!-- Gestion des commandes -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <i class="bi bi-receipt" style="font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color:red;">Commandes</h4>
                    <p>Voir et gérer toutes les commandes clients.</p>
                    <a href="index.php?page=adminCommandes" class="btn btn-primary w-100">Gérer les commandes</a>
                </div>
            </div>
        </div>

        <!-- Gestion des clients -->
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <i class="bi bi-people" style="font-size: 3rem;"></i>
                    <h4 class="mt-3" style="color:red;">Clients</h4>
                    <p>Voir la liste des clients et leurs informations.</p>
                    <a href="index.php?page=adminClients" class="btn btn-primary w-100">Gérer les clients</a>
                </div>
            </div>
        </div>
    </div>
</div>