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



//----- Page pour voir le  Produit détaillé-----
function afficherDetailsProduit() {

    if (!isset($_GET['id'])) {
        header("Location: index.php?page=catalogue");
        exit;
    }

    $id = $_GET['id']; // récupérer l'id dans l'url
    $produit = getProduitById($id);

    $title = $produit['nomProduit'];

    ob_start();
    require "Vues/VueUser/produit.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}




//----- Page Accueil / Catégories -----
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

?>
