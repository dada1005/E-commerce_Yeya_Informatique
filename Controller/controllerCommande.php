<?php
require_once(__DIR__ . "/../Modele/modeleCommande.php");



function confirmerCommande()
{
    // Vérifier si l'utilisateur est connecté
    if (!isset($_SESSION['user'])) {
        // On mémorise la page où il voulait aller
        $_SESSION['redirect_after_login'] = "index.php?page=confirmerCommande";
        header("Location: index.php?page=login");
        exit;
    }

    $idClient = $_SESSION['user']['idClient'];
    $panier = $_SESSION['panier'] ?? [];

    if (empty($panier)) {
        $_SESSION['message'] = "Votre panier est vide.";
        header("Location: index.php?page=panier");
        exit;
    }

    // Calcul du total
    $total = 0;
    foreach ($panier as $item) {
        $total += $item['prix'] * $item['quantite'];
    }

    // 1. Créer la commande
    $idCommande = creerCommande($total, $idClient);

    // 2. Ajouter les lignes de commande
    foreach ($panier as $idProduit => $item) {
        ajouterLigneCommande($idCommande, $idProduit, $item['quantite'], $item['prix']);
    }

    // 3. Vider le panier
    unset($_SESSION['panier']);

    // 4. Redirection vers la page confirmation
    header("Location: index.php?page=confirmation&idCommande=" . $idCommande);
    exit;
}





// afficher la commande
function afficherCommande()
{
    if (!isset($_SESSION['panier']) || empty($_SESSION['panier'])) {
        $_SESSION['message'] = "Votre panier est vide.";
        header("Location: index.php?page=panier");
        exit;
    }

    $produits = [];
    $total = 0;

    foreach ($_SESSION['panier'] as $idProduit => $item) {

        if (!is_array($item)) {
            continue;
        }

        $p = getProduitById($idProduit);

        if (!$p) {
            unset($_SESSION['panier'][$idProduit]);
            continue;
        }

        $quantite = $item['quantite'];
        $prix = floatval($item['prix']);

        $p['quantite'] = $quantite;
        $p['total_ligne'] = $quantite * $prix;

        $total += $p['total_ligne'];
        $produits[] = $p;
    }

    $title = "Validation de la commande";

    ob_start();
    require "Vues/VueUser/commande.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}



function mesCommandes()
{
    if (!isset($_SESSION['user'])) {
        $_SESSION['redirect_after_login'] = "index.php?page=mesCommandes";
        header("Location: index.php?page=login");
        exit;
    }

    $idClient = $_SESSION['user']['idClient'];
    $commandes = getCommandesByClient($idClient);

    $title = "Mes commandes";

    ob_start();
    require "Vues/VueAdmin/mesCommandes.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}

?>