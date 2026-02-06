<?php
require_once(__DIR__ . "/../Modele/modelePanier.php");

if (!isset($_SESSION['panier']) || !is_array($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}

function ajouterAuPanier()
{
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $id = $_GET['id'] ?? 0;

    if ($id > 0) {
        if (!isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id] = 1;
        } else {
            $_SESSION['panier'][$id]++;
        }
    }

    //  OBLIGATOIRE : redirection

    header("Location: index.php?page=panier");
    exit;
}



function afficherPanier()
{
    // sécurité
    if (!isset($_SESSION['panier']) || !is_array($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $produits = [];
    $total = 0;

    // si panier vide → on affiche quand même la vue
    if (empty($_SESSION['panier'])) {
        $title = "Panier";
        ob_start();
        require "Vues/VueUser/panier.php";
        $content = ob_get_clean();
        require "Vues/gabarit.php";
        return;
    }

    // on construit $produits À PARTIR de la session, 1 par 1
    foreach ($_SESSION['panier'] as $id => $qte) {

        // id invalide → on saute
        if (!is_numeric($id) || $id <= 0) {
            continue;
        }

        $p = getProduitById($id);
        if (!$p) {
            // produit supprimé en base → on enlève du panier
            unset($_SESSION['panier'][$id]);
            continue;
        }

        $p['quantite'] = $qte;
        $p['total_ligne'] = $qte * $p['prix'];

        $total += $p['total_ligne'];
        $produits[] = $p;
    }

    // si après nettoyage il n’y a plus rien
    if (empty($produits)) {
        $total = 0;
    }

    $title = "Panier";
    ob_start();
    require "Vues/VueUser/panier.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}



// vider le panier

function viderPanier()
{
    unset($_SESSION['panier']); // supprime tout le panier
    header("Location: index.php?page=panier");
    exit;
}


// diminuer la quantité
function diminuerQuantite()
{
    $id = $_GET['id'];

    if (isset($_SESSION['panier'][$id])) {

        $_SESSION['panier'][$id]--;

        // Si la quantité tombe à 0 → supprimer la ligne
        if ($_SESSION['panier'][$id] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    }

    header("Location: index.php?page=panier");
    exit;
}

//augmenter la quantité
function augmenterQuantite()
{
    $id = $_GET['id'];

    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]++;
    }

    header("Location: index.php?page=panier");
    exit;
}
