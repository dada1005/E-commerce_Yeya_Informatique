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



//----- Page pour voir le  Produit avec sa description-----

    function afficherProduit()
{
    $id = $_GET["id"] ?? 0;
    $produit = getProduitById($id);

    $title = "Produit";

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
