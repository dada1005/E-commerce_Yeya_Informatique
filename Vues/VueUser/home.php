<!-- SECTION : CARROUSEL -->
<section class="hero-section" style="position: relative;height: 100%;background-size: cover;overflow: hidden;">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">

            <div class="carousel-item active" data-bs-interval="2000">
                <div class="bg-img d-block w-100"
                    style="background-image: url('Images/appareils-electroniques.webp'); height: 100vh; background-size: cover; background-position: center;">
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="2000">
                <div class="bg-img d-block w-100"
                    style="background-image: url('Images/limpiar-auriculares.jpg.webp'); height: 100vh; background-size: cover; background-position: center;">
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="2000">
                <div class="bg-img d-block w-100"
                    style="background-image: url('Images/epson-ecotank-et-2826-imprimante-multifonctions-couleur.jpg'); height: 100vh; background-size: cover; background-position: center;">
                </div>
            </div>

        </div>
    </div>
    <div class="hero-content text-center mt-4" style="position: absolute; top: 50%;left: 50%;transform: translate(-50%, -50%);
    color: white;text-align: center;z-index: 10;">
        <h1 class="display-5" style="text-align: center;color: rgb(245, 5, 5, 100%);margin: 10px;">Bienvenue chez Yeya Informatique</h1>
        <p style="font-size: 1.5rem; margin-top: 10px;color: black;-align: center;">Votre magasin informatique à Caudebec-lès-Elbeuf</p>
        <a class="btn btn-primary" href="index.php?page=catalogue" style=" margin-top: 10px;padding: 15px;background-color: #f63e4e;
    color: white;border-radius: 5px;font-weight: bold;text-decoration: none;">Voir le catalogue</a>
    </div>
</section>


<!-- SECTION : QUI SOMMES-NOUS -->
<section class="container my-5">
    <h2 class="display-5 mb-4" style="color: red; text-align:center; font-weight: bold;">Qui sommes-nous ?</h2>
    <p style="font-size: 1.5em; text-align: justify;">
        Yeya Informatique est une entreprise de dépannage et vente du matériel informatique située au 183 rue
        République à Caudebec
        lès
        Elbeuf. Fondée il y a plusieurs années, elle est spécialisée dans les services de réparation, de vente
        et
        d’assistance informatique pour tous types d’appareils,
        que ce soit pour les ordinateurs portables, les ordinateurs de bureau, les imprimantes, les tablettes,
        les
        accessoires et les smartphones. Elle offre également des services de création des sites internet,
        montage
        vidéo, récupération et protection des données, mise en place de réseau social, photocopie et impression,
        nettoyage viral,
        paramètre box/imprimante et de formation .<br> <br>
        Yeya Informatique est dirigé par une équipe de techniciens hautement qualifiés et compétents, qui
        possèdent
        une solide expérience dans le domaine de la technologie informatique.
        Les techniciens de Yeya Informatique sont en mesure de résoudre tous types de problèmes informatiques,
        qu’il
        s’agisse d’une panne de matériel, d’un virus ou d’un problème de connexion internet. L’équipe de Yeya
        Informatique est également disponible pour fournir des conseils et des recommandations sur les
        meilleures
        pratiques pour la sécurité informatique et la sauvegarde des données. Ils sont passionnés par leur
        métier et
        sont toujours à l’écoute de leurs clients pour comprendre leurs besoins et leur fournir des solutions
        adaptées.<br><br>
        Yeya Informatique est fier d’avoir acquis une solide réputation pour la qualité et la fiabilité de ses
        services informatiques. Ils offrent des tarifs compétitifs et des délais rapides pour répondre aux
        besoins
        des clients. Si vous cherchez une entreprise de dépannage informatique fiable et professionnelle.
        Yeya Informatique votre partenaire idéal.
    </p>
    <a href="#" class="back-to-top" style="position: fixed;bottom: 20px;right: 20px;font-size: 3rem;color: red;
    cursor: pointer;z-index: 999;transition: 0.3s;">
        <i class="bi bi-arrow-up-circle-fill"></i>
    </a>
</section>
<!-- SECTION : CATÉGORIES -->
<section class="container my-5">
    <h3 class="display-5 mb-3" style="color: red; font-weight: bold;">Catégories</h3>
    <div class="row g-3">
        <?php foreach ($categories as $cat): ?>
            <div class="col-6 col-md-3">
                <a href="index.php?page=catalogue&idCategorie=<?= $cat['idCategorie'] ?>"
                    class="btn btn-outline-primary w-100" style="color: red; background-color: white; 
                    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); font-size: 1.3em; font-weight: bold; 
                    color:black; border: 4x solid white; text-decoration:none;">
                    <?= $cat['nomCategorie'] ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>


<!-- SECTION : PRODUITS RÉCENTS -->
<section class="container my-5">
    <h3 class="display-5 mb-3" style="color: red; font-weight: bold;">Produits récents</h3>
    <div class="row g-4">
        <?php foreach ($produitsAccueil as $p): ?>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="card" style="background-color: white; cursor: pointer;  border-radius: 12px;
                transition: transform .2s ease, box-shadow .2s ease; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);">
                    <img src="Images/<?= $p['image'] ?>" class="card-img-top" alt="<?= $p['nomProduit'] ?>">
                    <div class="card-body d-flex justify-content-between align-items-center mt-3">
                        <h5 class="card-title" style="color:red"><?= $p['nomProduit'] ?></h5>
                        <a href="index.php?page=produit&id=<?= $p['idProduit'] ?>"
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