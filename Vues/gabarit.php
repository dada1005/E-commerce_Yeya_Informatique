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
                    <a class="nav-link"  staria-current="page" href="index.php?page=home">Accueil</a>
                    <a class="nav-link" href="index.php?page=catalogue">Catalogue</a>
                    <a class="nav-link" href="contact.html">Contact</a>
                    <a class="nav-link" href="index.php?page=login"><i class="bi bi-person-fill"></i></a>
                    <a class="nav-link" href="index.php?page=panier"><i class="bi bi-cart3"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <main>
        <?= $content ?>
    </main>
    
















    <footer style="text-align: center; padding: 50px;background: #111;color: white;">
        <p style="text-align: center;">Copyrights <a href="#" style="color: #f63e4e;font-weight: bold;text-decoration: none;">Yeya Informatique</a></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>