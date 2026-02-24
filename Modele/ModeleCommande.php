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
    function creerCommande($totalCommande, $idClient)
    {
        $bd = getConnexion();

        $req = $bd->prepare("
            INSERT INTO commande (dateCommande, totalCommande, idClient)
            VALUES (now(), ?, ?)
        ");

        $req->execute([$totalCommande, $idClient]);

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
    function getClientById($idClient)
    {
        $pdo = getConnexion();
        $sql = "SELECT * FROM client WHERE idClient = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idClient]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
