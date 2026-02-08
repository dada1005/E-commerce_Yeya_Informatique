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
        header("Location: index.php?page=login");
        exit;
    }

    $mail = $_POST['mailClient'];
    $mdp = $_POST['mdpClient'];

    $client = getClientByEmail($mail);

    if (!$client) {
        $_SESSION['message'] = "Adresse email incorrecte.";
        header("Location: index.php?page=login");
        exit;
    }

    if (!password_verify($mdp, $client['mdpClient'])) {
        $_SESSION['message'] = "Mot de passe incorrect.";
        header("Location: index.php?page=login");
        exit;
    }

    // Connexion OK
    $_SESSION['user'] = $client;

    // Si une redirection était prévue (ex: confirmerCommande)
    if (isset($_SESSION['redirect_after_login'])) {
        $url = $_SESSION['redirect_after_login'];
        unset($_SESSION['redirect_after_login']);
        header("Location: $url");
        exit;
    }

    // Sinon → page par défaut
    header("Location: index.php?page=home");
    exit;
}




function deconnexion()
{
    unset($_SESSION['user']);
    header("Location: index.php?page=home");
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
    header("Location: index.php?page=login");
    exit;
}

