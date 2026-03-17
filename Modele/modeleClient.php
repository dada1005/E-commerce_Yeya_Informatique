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
function getClientByEmail($mailClient)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM client WHERE mailClient = ?");
    $req->execute([$mailClient]);
    return $req->fetch(PDO::FETCH_ASSOC);
}
/* Inscrire un client */
function creerClient($nomClient, $mailClient, $mdpClient)
{
    $bd = getConnexion();
    $hash = password_hash($mdpClient, PASSWORD_DEFAULT);

    $req = $bd->prepare("
        INSERT INTO client (nomClient, mailClient, mdpClient)
        VALUES (?, ?, ?)
    ");
    return $req->execute([$nomClient, $mailClient, $hash]);
}
function updateClient($idClient, $nomClient, $mailClient)
{
    $bd = getConnexion();
    $req = $bd->prepare("UPDATE client SET nomClient = ?, mailClient = ? WHERE idClient = ?");
    return $req->execute([$nomClient, $mailClient, $idClient]);
}

/* Récupérer un client par ID */
function getClientById($idClient)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM client WHERE idClient = ?");
    $req->execute([$idClient]);
    return $req->fetch(PDO::FETCH_ASSOC);
}


?>