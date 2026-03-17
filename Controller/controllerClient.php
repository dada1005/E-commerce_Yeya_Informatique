<?php
require_once(__DIR__ . "/../Modele/modeleClient.php");


function afficherLogin()
{
    $title = "Connexion";
    ob_start();
    require "Vues/VueUser/login.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}

function connecterClient()
{
    if (!isset($_POST['mailClient'], $_POST['mdpClient'])) {
        $_SESSION['message'] = "Veuillez remplir tous les champs.";
        header("Location: index.php?page=loginClient");
        exit;
    }

    $mail = $_POST['mailClient'];
    $mdp = $_POST['mdpClient'];

    // Récupération du client
    $client = getClientByEmail($mail);

    if (!$client) {
        $_SESSION['message'] = "Adresse email incorrecte.";
        header("Location: index.php?page=loginClient");
        exit;
    }

    if (!password_verify($mdp, $client['mdpClient'])) {
        $_SESSION['message'] = "Email ou mot de passe incorrect.";
        header("Location: index.php?page=loginClient");
        exit;
    }

    // Connexion OK → session client
    $_SESSION['client'] = $client;

    // Redirection après login (ex: confirmerCommande)
    if (isset($_SESSION['redirect_after_login'])) {
        $page = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);
        header("Location: $page");
        exit;
    }

    header("Location: index.php?page=home");
    exit;
}


// se déconnecter
function deconnexion()
{
    unset($_SESSION['client']);
    $_SESSION['message'] = "Vous êtes maintenant déconnecté.";
    header("Location: index.php?page=home");
    session_destroy(); // Détruit complètement la session
    exit;
}



function afficherInscription()
{
    $title = "Inscription";
    ob_start();
    require "Vues/VueUser/inscription.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}

// créer un compte
function inscrireClient()
{
    $nom = $_POST['nom'] ?? '';
    $email = $_POST['email'] ?? '';
    $mdp = $_POST['motdepasse'] ?? '';

    // Vérifier si l'email existe déjà
    if (getClientByEmail($email)) {
        $_SESSION['message'] = "Cet email est déjà utilisé.";
        header("Location: index.php?page=inscription");
        exit;
    }


    // Créer le client
    creerClient($nom, $email, $mdp);

    $_SESSION['message'] = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    header("Location: index.php?page=loginClient");
    exit;
}

// créer la gestion de compte
function monCompte()
{
    if (!isset($_SESSION['client'])) {
        $_SESSION['redirect_after_login'] = "index.php?page=monCompte";
        header("Location: index.php?page=modifierCompte");

        exit;
    }

    $title = "Mon compte";
    ob_start();
    require "Vues/VueUser/monCompte.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}

// modifier un compte
function modifierCompte()
{
    if (!isset($_SESSION['client'])) {
        $_SESSION['redirect_after_login'] = "index.php?page=modifierCompte";
        header("Location: index.php?page=loginClient");
        exit;
    }


    $title = "Modifier mes informations";
    ob_start();
    require "Vues/VueUser/modifierCompte.php";
    $content = ob_get_clean();
    require "Vues/gabarit.php";
}
function updateCompte()
{
    if (!isset($_SESSION['client'])) {
        header("Location: index.php?page=loginClient");
        exit;
    }

    $nom = $_POST['nomClient'];
    $email = $_POST['mailClient'];
    $id = $_SESSION['client']['idClient'];

    // Vérifier si email déjà utilisé par un autre client
    $existant = getClientByEmail($email);
    if ($existant && $existant['idClient'] != $id) {
        $_SESSION['message'] = "Cet email est déjà utilisé.";
        header("Location: index.php?page=modifierCompte");
        exit;
    }

    updateClient($id, $nom, $email);

    // Mettre à jour la session
    $_SESSION['client']['nomClient'] = $nom;
    $_SESSION['client']['mailClient'] = $email;

    $_SESSION['message'] = "Informations mises à jour.";
    header("Location: index.php?page=monCompte");
    exit;
}
