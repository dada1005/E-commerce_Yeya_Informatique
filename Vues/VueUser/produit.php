<section class="container my-5">

    <div class="row">

        <!-- Image du produit -->
        <div class="col-12 col-md-6 text-center">
            <img src="Images/<?= $produit['image'] ?>"
                alt="<?= $produit['nomProduit'] ?>"
                class="img-fluid rounded shadow"
                style="max-height: 350px; object-fit: contain;">
        </div>

        <!-- Infos du produit -->
        <div class="col-12 col-md-6">

            <h2 class="mb-3"><?= $produit['nomProduit'] ?></h2>

            <p class="text-muted"><?= $produit['description'] ?></p>

            <h4 class="text-danger fw-bold mb-4"><?= $produit['prix'] ?> €</h4>

            <div class="d-flex gap-3">

                <!-- Ajouter au panier -->
                <a href="index.php?page=ajouterPanier&id=<?= $produit['idProduit'] ?>"
                    class="btn btn-primary btn-sm">
                    Ajouter au panier
                </a>

                <!-- Retour catalogue -->
                <a href="index.php?page=catalogue"
                    class="btn btn-primary btn-sm">
                    Retour
                </a>
            </div>
        </div>
    </div>
</section>