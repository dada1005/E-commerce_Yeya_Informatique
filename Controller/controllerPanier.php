<?php

    require_once(__DIR__ . "/../Modele/modelePanier.php");


    function afficherPanier() {
        $title = "Panier";

        $panier = getPanier();
        $produits = [];

        foreach ($panier as $id => $qte) {
            $produits[] = [
                "info" => getProduitById($id),
                "quantite" => $qte
            ];
        }

        ob_start();
        require "Vues/VueUser/panier.php";
        $content = ob_get_clean();

        require "Vues/gabarit.php";
    }

    function ajouterProduitPanier() {
        if (isset($_GET['id'])) {
            ajouterAuPanier($_GET['id']);
        }
        header("Location: index.php?page=panier");
    }

    function supprimerProduitPanier() {
        if (isset($_GET['id'])) {
            supprimerDuPanier($_GET['id']);
        }
        header("Location: index.php?page=panier");
    }
    function viderProduitPanier(){
        if (isset($_GET['id'])) {
            viderPanier();
        }
         header("Location: index.php?page=panier");
    }

    //-----afficher la commande-----
    function afficherCommande()
    {
        $title = "Commande";

        ob_start();
        require "Vues/VueUser/commande.php";
        $content = ob_get_clean();

        require "Vues/gabarit.php";
    }
