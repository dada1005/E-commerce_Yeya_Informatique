<?php

//require_once "Modele/modeleAdmin.php";
require_once(__DIR__ . "/../Modele/modeleAdmin.php");

/*Vérifier si le compte administrateur existe*/
function verifierAdmin()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
        $_SESSION['message'] = "Accès réservé aux administrateurs.";
        header("Location: index.php?page=login");
        exit;
    }
}

/*Afficher le tableau de bord*/
function adminDashboard()
{
    verifierAdmin(); // Sécurisation

    $title = "Tableau de bord administrateur";

    ob_start();
    require "Vues/VueAdmin/dashboard.php";
    $content = ob_get_clean();

    require "Vues/gabarit.php";
}

function inscriptionAdmin()
{
    verifierAdmin(); // Seul un admin peut créer un autre admin

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        inscrireAdmin($nom, $email, $password);

        $_SESSION['message'] = "Administrateur créé avec succès.";
        header("Location: index.php?page=adminDashboard");
        exit;
    }

    $title = "Créer un administrateur";
    ob_start();
    require "Vues/VueAdmin/inscriptionAdmin.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}


function adminProduits()
{
    verifierAdmin();
    $produits = getAllProduits();

    $title = "Gestion des produits";
    ob_start();
    require "Vues/VueAdmin/produits.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}

/*Ajouter un produit*/
function adminAjouterProduit()
{
    verifierAdmin();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nomProduit'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $idCategorie = $_POST['idCategorie'];

        // Upload image
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "Images/" . $image);

        ajouterProduit($nom, $description, $prix, $image, $idCategorie);

        $_SESSION['message'] = "Produit ajouté avec succès.";
        header("Location: index.php?page=adminProduits");
        exit;
    }

    $categories = getAllCategories();

    $title = "Ajouter un produit";
    ob_start();
    require "Vues/VueAdmin/ajouterProduit.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}


/*Modifier un produit*/
function adminModifierProduit()
{
    verifierAdmin();

    $id = $_GET['id'];
    $produit = getProduitById($id);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nomProduit'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];
        $idCategorie = $_POST['idCategorie'];

        // Si nouvelle image
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], "Images/" . $image);
        } else {
            $image = $produit['image'];
        }

        modifierProduit($id, $nom, $description, $prix, $image, $idCategorie);

        $_SESSION['message'] = "Produit modifié.";
        header("Location: index.php?page=adminProduits");
        exit;
    }

    $categories = getAllCategories();

    $title = "Modifier un produit";
    ob_start();
    require "Vues/VueAdmin/modifierProduit.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}

/*Supprimer un produit*/
function adminSupprimerProduit()
{
    verifierAdmin();

    $id = $_GET['id'];
    supprimerProduit($id);

    $_SESSION['message'] = "Produit supprimé.";
    header("Location: index.php?page=adminProduits");
    exit;
}


function adminCommandes()
{
     verifierAdmin();

    $commandes = getAllCommandes();

    $title = "Gestion des Commandes";
    ob_start();
    require "Vues/VueAdmin/mesCommandes.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}
function detailCommande()
{
    verifierAdmin();

    $id = $_GET['id'] ?? 0;

    // APPEL DU BON MODELE
    $commande = getCommandeById($id);

    if (!$commande) {
        $_SESSION['message'] = "Commande introuvable.";
        header("Location: index.php?page=adminCommandes");
        exit;
    }

    $title = "Détails des Commandes";
    ob_start();
    require "Vues/VueAdmin/detailsCommande.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
   
}

function deconnexion()
{
    session_start();
    session_unset();   // Supprime toutes les variables de session
    session_destroy(); // Détruit complètement la session

    header("Location: index.php?page=home");
    exit;
}


