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
        afficherDetailsProduit();
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
    case 'loginClient':
        require_once "Controller/controllerClient.php";
        afficherLogin();
        break;

    case 'connecterClient':
        require_once "Controller/controllerClient.php";
        connecterClient();
        break;
    case 'confirmation':
        require_once "Vues/VueUser/confirmation.php";
        break;

    case 'logoutClient':
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
    case 'monCompte':
        require_once "Controller/controllerClient.php";
        monCompte();
        break;
    case 'modifierCompte':
        require_once "Controller/controllerClient.php";
        modifierCompte();
        break;

    case 'updateCompte':
        require_once "Controller/controllerClient.php";
        updateCompte();
        break;

    case 'mesCommandes':
        require_once "Controller/controllerCommande.php";
        mesCommandes();
        break;
    case 'loginAdmin':
        require_once "Controller/controllerAdmin.php";
        afficherLoginAdmin();
        break;
     case 'connecterAdmin':
        require_once "Controller/controllerAdmin.php";
        connecterAdmin();
        break;
    
    case "dashboard":
        require_once "Controller/controllerAdmin.php";
        adminDashboard();
        break;
    case "inscriptionAdmin":
        require_once "Controller/controllerAdmin.php";
        inscriptionAdmin();
        break;

    case "adminProduits":
        require_once "Controller/controllerAdmin.php";
        adminProduits();
        break;
    case "adminAjouterProduit":
        require_once "Controller/controllerAdmin.php";
        adminAjouterProduit();
        break;
    case "adminModifierProduit":
        require_once "Controller/controllerAdmin.php";
        adminModifierProduit();
        break;
    case "adminSupprimerProduit":
        require_once "Controller/controllerAdmin.php";
        adminSupprimerProduit();
        break;

    case "adminCommandes":
        require_once "Controller/controllerAdmin.php";
        adminCommandes();
        break;
    case 'commande_detail':
        require_once "Controller/controllerAdmin.php";
        detailCommande();
        break;

    case 'adminClients':
        require_once "Controller/controllerAdmin.php";
        afficherClients();
        break;
    case 'logoutAdmin':
        require_once "Controller/controllerAdmin.php";
        deconnexion();
        break;


    default:
        echo "Page introuvable";


}
