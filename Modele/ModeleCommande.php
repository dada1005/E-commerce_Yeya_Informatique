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



// créer une commande
    function creerCommande($totalCommande, $idUsers)
    {
        $bd = getConnexion();

        $req = $bd->prepare("
            INSERT INTO commande (dateCommande, totalCommande, idUsers)
            VALUES (now(), ?, ?)
        ");

        $req->execute([$totalCommande, $idUsers]);

        // Retourner l'id de la commande créée
        return $bd->lastInsertId();
    }

    // ajouter une ligne de commande
    function ajouterLigneCommande($idCommande, $idProduit, $quantite, $prix_unitaire)
    {
        $bd = getConnexion();

        $sql = $bd->prepare("
            INSERT INTO ligne_commandes (quantite, prix_unitaire, idCommande, idProduit)
            VALUES (?, ?, ?, ?)
        ");

        $sql->execute([$quantite, $prix_unitaire, $idCommande, $idProduit]);
    }

    // récupérer toutes les commandes par id du client
    function getCommandesById($idUsers)
{
    $bd = getConnexion();
    $req = $bd->prepare("
        SELECT c.idCommande, c.totalCommande, c.dateCommande, u.nomUsers
        FROM commande c 
        INNER JOIN users u ON c.idUsers = u.idUsers
        WHERE c.idUsers = ?
        ORDER BY c.dateCommande DESC
    ");
    $req->execute([$idUsers]);
    return $req->fetchAll(PDO::FETCH_ASSOC);
}



    function getCommandeById($idCommande)
    {
        $bd = getConnexion();

        // Récupérer la commande
        $sql = "SELECT * FROM commande WHERE idCommande = ?";
        $stmt = $bd->prepare($sql);
        $stmt->execute([$idCommande]);
        $commande = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$commande) {
            return null;
        }

        // Récupérer les lignes de commande + infos produit
        $sql2 = "SELECT *, p.nomProduit, p.image, p.description 
                FROM ligne_commandes lc
                JOIN produit p ON lc.idProduit = p.idProduit
                WHERE lc.idCommande = ?";
        $stmt2 = $bd->prepare($sql2);
        $stmt2->execute([$idCommande]);
        $lignes = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $commande['lignes'] = $lignes;

        return $commande;
    }
    function getClientById($idUsers)
    {
        $pdo = getConnexion();
        $sql = "SELECT * FROM users WHERE idUsers = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idUsers]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
