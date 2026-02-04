<?php
//require_once("Modele/Modele.php");
require_once(__DIR__ . "/../Modele/modeleProduit.php");

//----- Page Catalogue -----
    function afficherCatalogue()
    {
        $produits = getAllProduits();

        $title = "Catalogue";

        ob_start();
        require "Vues/VueUser/catalogue.php";
        $content = ob_get_clean();

        require "Vues/gabarit.php";
    }


    // function afficherCatalogue()
    // {

    //     // Filtre catégorie
    //     if (isset($_GET['cat'])) {
    //         $produits = getProduitsByCategorie($_GET['cat']);
    //     } else {
    //         $produits = getAllProduits();
    //     }

    //     $categories = getAllCategories();
    //     ob_start();
    //     require "Vues/VueUser/catalogue.php";
    //     $content = ob_get_clean();

    //     require "Vues/gabarit.php";
    // }



//----- Page Produit -----
function afficherProduit()
{
    $id = $_GET['id'] ?? 0;
    $produit = getProduitById($id);

    if (!$produit) {
        die("Produit introuvable");
    }

    $title = $produit['nomProduit'];

    ob_start();
    require 'Vues/VueUser/produit.php';
    $content = ob_get_clean();

    require 'Vues/gabarit.php';
}

// //----- Page Accueil / Catégories -----
function afficherAccueil()
{
    $categories = getAllCategories();
    $produitsAccueil = getProduitsAccueil();

    $title = "Accueil";

    ob_start();
    require "Vues/VueUser/home.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}
    //-----afficher le panier------
