<section class="container my-5">
    <h3 class="display-5 mb-4" style="color: red; font-weight: bold;">Nos Produits</h3>
    <div class="row g-4">
        <?php foreach ($produits as $produit): ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card" style="background-color: white; cursor: pointer;  border-radius: 12px;
                transition: transform .2s ease, box-shadow .2s ease; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);">
                    <img src="Images/<?= htmlspecialchars($produit['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($produit['nomProduit']) ?>">
                    <div class="card-body d-flex justify-content-between align-items-center mt-3">
                        <h5 class="card-title" style="color:red"><?= htmlspecialchars($produit['nomProduit']) ?></h5>
                        <a href="index.php?page=produit&id=<?= $produit['idProduit'] ?>"
                            class="btn btn-primary btn-sm">Voir le produit
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="text-center mt-4">
        <a class="btn btn-secondary" href="index.php?page=catalogue">Afficher tout</a>
    </div>
</section>