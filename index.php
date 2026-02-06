<?php
session_start();

$page = $_GET['page'] ?? 'gabarit';

switch ($page) {

    case 'home':
        require_once "Controller/controllerProduit.php";
        afficherAccueil();
        break;

    case 'catalogue':
        require_once "Controller/controllerProduit.php";
        afficherCatalogue();
        break;

    case 'produit':
        require_once "Controller/controllerProduit.php";
        afficherProduit();
        break;

    case 'panier':
        require_once "Controller/controllerPanier.php";
        afficherPanier();
        break;

    case 'ajouterPanier':
        require_once "Controller/controllerPanier.php";
        ajouterAuPanier();
        break;

    case 'supprimer':
        require_once "Controller/controllerPanier.php";
        supprimerProduit();
        break;

    case 'diminuer':
        require_once "Controller/controllerPanier.php";
        diminuerQuantite();
        break;

    case 'augmenter':
        require_once "Controller/controllerPanier.php";
        augmenterQuantite();
        break;

    case 'viderPanier':
        require_once "Controller/controllerPanier.php";
        viderPanier();
        break;

    default:
        echo "Page introuvable";
}

?>
