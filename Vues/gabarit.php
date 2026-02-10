<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Assets/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">YEYA INFORMATIQUE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-right" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto" style="color: white;font-size: 1.5rem;
                text-decoration: none;">
                    <a class="nav-link" staria-current="page" href="index.php?page=home">Accueil</a>
                    <a class="nav-link" href="index.php?page=catalogue">Catalogue</a>
                    <a class="nav-link" href="index.php?page=panier"><i class="bi bi-cart3"></i></a>
                    <a class="nav-link" href="index.php?page=mesCommandes">Mes commandes</a>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false" style="color: white;font-size: 1.5rem; text-decoration: none;">
                        Mon compte
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="color: white;font-size: 1.3rem;">
                        <li><a class="dropdown-item" href="index.php?page=modifierCompte"><i class="bi bi-person-fill"></i></a>
                        <li>
                        <li><a class="dropdown-item" href="index.php?page=logout">Déconnexion</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <?= $content ?>
    </main>



    <footer class="text-white mt-auto" style="background-color: #222; padding: 30px 0;">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3">
                    <h4 class="fw-bold" style="color: red;">YEYA Informatique</h4>
                    <p>Dépannage, vente de matériel informatique et services numériques.</p>
                </div>

                <div class="col-md-4 mb-3">
                    <h5 class="fw-bold" style="color: red;">Contact</h5>
                    <p>📍 Caudebec-lès-Elbeuf, Normandie</p>
                    <p>📞 06 00 00 00 00</p>
                    <p>✉️ contact@yeyainformatique.com</p>
                </div>

            </div>

            <hr class="border-light">

            <p class="text-center mb-0">© <?= date('Y') ?> YEYA Informatique — Tous droits réservés</p>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>