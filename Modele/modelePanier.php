<?php
        function getConnexion()
    {
        $bdd = new PDO(
            "mysql:host=localhost:3306;dbname=yeya_informatique;charset=utf8",
            "root",
            "",
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        return $bdd;
    }

        //-----AFFICHERLE PANIER-----

    function initPanier() {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
    }

    function ajouterAuPanier($idProduit, $quantite = 1) {
        initPanier();

        if (isset($_SESSION['panier'][$idProduit])) {
            $_SESSION['panier'][$idProduit] += $quantite;
        } else {
            $_SESSION['panier'][$idProduit] = $quantite;
        }
    }

    function supprimerDuPanier($idProduit) {
        if (isset($_SESSION['panier'][$idProduit])) {
            unset($_SESSION['panier'][$idProduit]);
        }
    }

    function viderPanier() {
        $_SESSION['panier'] = [];
    }

    function getPanier() {
        initPanier();
        return $_SESSION['panier'];
    }

    //-----AFFICHER UNE COMMANDE ----


    function enregistrerCommande($nom, $email, $adresse, $telephone, $panier, $total)
    {
        // Exemple simple : stocker dans un fichier ou une base plus tard
        $commande = [
            "nom" => $nom,
            "email" => $email,
            "adresse" => $adresse,
            "telephone" => $telephone,
            "panier" => $panier,
            "total" => $total,
            "date" => date("Y-m-d H:i:s")
        ];

        // Pour l'instant on stocke dans la session
        $_SESSION['derniere_commande'] = $commande;

        return true;
    }
?>