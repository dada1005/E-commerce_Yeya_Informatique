<?php
require_once(__DIR__ . "/../Modele/modelePanier.php");


function ajouterAuPanier()
{
    // initialiser le panier
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $id = $_GET['id'] ?? 0;

    if ($id > 0) {

        // Récupérer le produit depuis la base
        $produit = getProduitById($id);

        if (!$produit) {
            $_SESSION['message'] = "Produit introuvable.";
            header("Location: index.php?page=catalogue");
            exit;
        }

        // Si le produit n'est pas encore dans le panier
        if (!isset($_SESSION['panier'][$id])) {
            $_SESSION['panier'][$id] = [
                'quantite' => 1,
                'prix' => $produit['prix']
            ];
        } else {
            // Sinon on augmente la quantité
            $_SESSION['panier'][$id]['quantite']++;
        }
    }

    header("Location: index.php?page=panier");
    exit;
}




function afficherPanier()
{
    // initialiser/ créer le panier
    if (!isset($_SESSION['panier']) || !is_array($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
    }

    $produits = [];
    $total = 0;

    foreach ($_SESSION['panier'] as $idProduit => $item) {

        // vérifier si les valeurs associées à l'id est bien dans un tableau
        if (!is_array($item)) {
            continue;
        }

        $p = getProduitById($idProduit);

        if (!$p) {
            unset($_SESSION['panier'][$idProduit]);
            continue;
        }

        // On récupère les infos du panier
        $quantite = $item['quantite'];
        $prix = floatval($item['prix']);

        $p['quantite'] = $quantite;
        $p['prix'] = $prix;
        $p['total_ligne'] = $quantite * $prix;

        $total += $p['total_ligne'];
        $produits[] = $p;
    }

    $title = "Panier";
    ob_start();
    require "Vues/VueUser/panier.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}


function supprimerProduit()
{
    $id = $_GET['id'];

    if (isset($_SESSION['panier'][$id])) {
        unset($_SESSION['panier'][$id]);
    }

    header("Location: index.php?page=panier");
    exit;


    $title = "panier";

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
     $title = "panier";

    ob_start();
    require "Vues/VueUser/panier.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}


// diminuer la quantité
function diminuerQuantite()
{
    $id = $_GET['id'];

    if (isset($_SESSION['panier'][$id])) {

        $_SESSION['panier'][$id]['quantite']--;

        if ($_SESSION['panier'][$id]['quantite'] <= 0) {
            unset($_SESSION['panier'][$id]);
        }
    }

    header("Location: index.php?page=panier");
    exit;
     $title = "panier";

    ob_start();
    require "Vues/VueUser/panier.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}


//augmenter la quantité
function augmenterQuantite()
{
    $id = $_GET['id'];

    if (isset($_SESSION['panier'][$id])) {
        $_SESSION['panier'][$id]['quantite']++;
    }

    header("Location: index.php?page=panier");
    exit;
     $title = "panier";

    ob_start();
    require "Vues/VueUser/panier.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}
