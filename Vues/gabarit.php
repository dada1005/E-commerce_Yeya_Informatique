<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="Assets/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

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
                <div class="navbar-nav ms-auto" style="color: white;font-size: 1.5rem; text-decoration: none;">

                    <a class="nav-link" href="index.php?page=home">Home</a>
                    <a class="nav-link" href="index.php?page=catalogue">Catalogue</a>
                    <a class="nav-link" href="index.php?page=panier"><i class="bi bi-cart3"></i></a>

                    <!-- Si un client n'est connecté -->
                    <?php if (!isset($_SESSION['client'])): ?>

                        <a class="nav-link" href="index.php?page=loginClient">Connexion client</a>

                    <?php endif; ?>

                    <!-- Si un client est connecté -->
                    <?php if (isset($_SESSION['client'])): ?>

                        <a class="nav-link" href="index.php?page=mesCommandes">Mes commandes</a>

                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" style="color:white;font-size:1.5rem;">
                                Mon compte
                            </button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=modifierCompte">Profil</a></li>
                                <li><a class="dropdown-item" href="index.php?page=logoutClient">Déconnexion</a></li>
                            </ul>
                        </div>

                    <?php endif; ?>


                    <!-- Si un admin est connecté -->
                    <?php if (!isset($_SESSION['admin'])): ?>

                        <a class="nav-link" href="index.php?page=loginAdmin">Connexion Admin</a>

                    <?php endif; ?>

                    <?php if (isset($_SESSION['admin'])): ?>

                        <a class="nav-link" href="index.php?page=dashboard">Administration</a>

                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" style="color:white;font-size:1.5rem;">
                                Admin
                            </button>

                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?page=dashboard">Tableau de bord</a></li>
                                <li><a class="dropdown-item" href="index.php?page=logoutAdmin">Déconnexion</a></li>
                            </ul>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>
    <main>

        <?= $content ?>
    </main>





    <footer class="footer">
        <div class="footer-container">

            <div class="footer-section">
                <h3>Yeya Informatique</h3>
                <p>Dépannage & Vente Informatique</p>
            </div>

            <div class="footer-section">
                <h4>Contact</h4>

                <p><span class="icon">📞</span>0620534677 / 0232138553 / 0752386771</p>
                <p><span class="icon">📧</span>contact@yeyainformatique.com</p>
                <p><span class="icon">📍</span>183 Rue de la République, 76320, Caudebec lès Elbeuf, Normandie</p>
            </div>

            <div class="footer-section">
                <h4>Liens utiles</h4>
                <a href="index.php?page=home">Home</a><br>
                <a href="index.php?page=catalogue">Catalogue</a>
            </div>

        </div>

        <p class="footer-bottom">© 2026 Yeya Informatique — Tous droits réservés</p>
    </footer>


    <script>
        document.getElementById("toggleBtn").addEventListener("click", function() {
            const texte = document.getElementById("texteYeya");

            if (texte.classList.contains("texte-reduit")) {
                texte.classList.remove("texte-reduit");
                texte.classList.add("texte-complet");
                this.textContent = "Lire moins";
            } else {
                texte.classList.remove("texte-complet");
                texte.classList.add("texte-reduit");
                this.textContent = "Lire la suite";
            }
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableProduits').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
                }
            });
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
    </script>
</body>

</html>