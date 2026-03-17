<?php

function getConnexion()
{
    $bdd = new PDO(
        "mysql:host=localhost:3306;dbname=yeya_informatique;charset=utf8",
        "root",
        "",
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
    return $bdd;
}

/* Récupérer un client par email */
function getClientByEmail($mailUsers)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM users WHERE mailUsers = ?");
    $req->execute([$mailUsers]);
    return $req->fetch(PDO::FETCH_ASSOC);
}
/* Inscrire un client */
function creerClient($nomUsers, $mailUsers, $mdpUsers)
{
    $bd = getConnexion();
    $hash = password_hash($mdpUsers, PASSWORD_DEFAULT);

    $req = $bd->prepare("
        INSERT INTO users (nomUsers, mailUsers, mdpUsers, role)
        VALUES (?, ?, ?, 'client')
    ");
    return $req->execute([$nomUsers, $mailUsers, $hash]);
}
function updateClient($idUsers, $nomUsers, $mailUsers)
{
    $bd = getConnexion();
    $req = $bd->prepare("UPDATE users SET nomUsers = ?, mailUsers = ? WHERE idUsers = ?");
    return $req->execute([$nomUsers, $mailUsers, $idUsers]);
}

/* Récupérer un client par ID */
function getClientById($idUsers)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM users WHERE idUsers = ?");
    $req->execute([$idUsers]);
    return $req->fetch(PDO::FETCH_ASSOC);
}


?>