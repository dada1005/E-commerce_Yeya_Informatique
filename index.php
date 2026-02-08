<?php
session_start();

$page = $_GET['page'] ?? 'home';

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
    case 'commande':
        require_once "Controller/controllerCommande.php";
        afficherCommande();
        break;

    case 'confirmerCommande':
        require_once "Controller/controllerCommande.php";
        confirmerCommande();
        break;
    case 'login':
        require_once "Controller/controllerClient.php";
        afficherLogin();
        break;

    case 'connecter':
        require_once "Controller/controllerClient.php";
        connecterClient();
        break;

    case 'logout':
        require_once "Controller/controllerClient.php";
        deconnexion();
        break;
    case 'inscription':
        require_once "Controller/controllerClient.php";
        afficherInscription();
        break;

    case 'inscrire':
        require_once "Controller/controllerClient.php";
        inscrireClient();
        break;
    case 'confirmation':
        require "Vues/VueUser/confirmation.php";
        break;

    case 'mesCommandes':
        require_once "Controller/controllerCommande.php";
        mesCommandes();
        break;


    default:
        echo "Page introuvable";
}
