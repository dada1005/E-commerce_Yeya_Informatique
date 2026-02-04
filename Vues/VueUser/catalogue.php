
<section class="container my-5">
    <h3 class="display-5 mb-4" style="color: red;">Nos Produits</h3>
    <div class="row g-4">
        <?php foreach ($produits as $p): ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card" style="background-color: white; cursor: pointer;  border-radius: 12px;
                transition: transform .2s ease, box-shadow .2s ease; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);">
                    <img src="Images/<?= $p['image'] ?>" class="card-img-top" alt="<?= $p['nomProduit'] ?>" style="width: 80%;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $p['nomProduit'] ?></h5>
                        <p class="text-muted"><?= $p['description'] ?></p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="prix fw-bold" style="color: red;"><?= $p['prix'] ?> €</span>
                            <a href="index.php?page=panier"<?= $p['idProduit'] ?>
                                class="btn btn-primary btn-sm">Ajouter Panier</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>