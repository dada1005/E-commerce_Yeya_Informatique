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


function getProduitById($id)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM produit WHERE idProduit = ?");
    $req->execute([$id]);
    return $req->fetch(PDO::FETCH_ASSOC);
}




function creerCommande($totalCommande, $idClient)
{
    $bd = getConnexion();

    // Générer la date actuelle
    $dateCommande = date("Y-m-d H:i:s");

    $req = $bd->prepare("
        INSERT INTO commande (dateCommande, totalCommande, idClient)
        VALUES (?, ?, ?)
    ");

    $req->execute([$dateCommande, $totalCommande, $idClient]);

    // Retourner l'id de la commande créée
    return $bd->lastInsertId();
}



function ajouterLigneCommande($idCommande, $idProduit, $quantite, $prix_unitaire)
{
    $bd = getConnexion();

    $sql = $bd->prepare("
        INSERT INTO ligne_commandes (quantite, prix_unitaire, idCommande, idProduit)
        VALUES (?, ?, ?, ?)
    ");

    $sql->execute([$quantite, $prix_unitaire, $idCommande, $idProduit]);
}

function getCommandesByClient($idClient)
{
    $bd = getConnexion();
    $req = $bd->prepare("
        SELECT idCommande, totalCommande, dateCommande
        FROM commande
        WHERE idClient = ?
        ORDER BY dateCommande DESC
    ");
    $req->execute([$idClient]);
    return $req->fetchAll(PDO::FETCH_ASSOC);
}




?>