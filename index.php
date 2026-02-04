<?php
    session_start();

    $page = $_GET['page'] ?? 'home';

    switch ($page) {

    case 'home':
        require "Controller/controllerProduit.php";
        afficherAccueil();
        break;

    case 'catalogue':
        require "Controller/controllerProduit.php";
        afficherCatalogue();
        break;

    case 'panier':
        require "Controller/controllerPanier.php";
        afficherPanier();
        break;

    case 'ajouterPanier':
        require "Controller/Controller.php";
        ajouterProduitPanier();
        break;

    case 'supprimerPanier':
        require "Controller/Controller.php";
        supprimerProduitPanier();
        break;

    default:
        echo "Page introuvable";
    }

?>