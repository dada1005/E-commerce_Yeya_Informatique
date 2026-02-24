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

/*inscription d'un administrateur*/
function inscrireAdmin($nom, $email, $password)
{
    $bd = getConnexion();

    // Hash du mot de passe
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql = $bd->prepare("INSERT INTO client (nomClient, mailClient, mdpClient, role)
                         VALUES (?, ?, ?, 'admin')");
    return $sql->execute([$nom, $email, $passwordHash]);
}

/*Récupérer toutes les catégories*/
function getAllCategories()
{
    $db = getConnexion();
    $rq = $db->query("SELECT * FROM categorie");
    return $rq->fetchAll(PDO::FETCH_ASSOC);
}


/* Récupérer tous les produits*/
function getAllProduits() {
    $bd = getConnexion();
    $req = $bd->query("
        SELECT p.*, c.nomCategorie
        FROM produit p
        JOIN categorie c ON p.idCategorie = c.idCategorie
    ");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/* Récupérer le produit par ID*/
function getProduitById($idProduit)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM produit WHERE idProduit = ?");
    $req->execute([$idProduit]);
    return $req->fetch(PDO::FETCH_ASSOC);
}

/* Ajouter un produit*/
function ajouterProduit($nom, $description, $prix, $image, $idCategorie)
{
    $bd = getConnexion();
    $req = $bd->prepare("
        INSERT INTO produit (nomProduit, description, prix, image, idCategorie)
        VALUES (?, ?, ?, ?, ?)
    ");
    return $req->execute([$nom, $description, $prix, $image, $idCategorie]);
}

/*Modifier un produit*/
function modifierProduit($idProduit, $nom, $description, $prix, $image, $idCategorie)
{
    $bd = getConnexion();
    $req = $bd->prepare("
        UPDATE produit 
        SET nomProduit = ?, description = ?, prix = ?, image = ?, idCategorie = ?
        WHERE idProduit = ?
    ");
    return $req->execute([$nom, $description, $prix, $image, $idCategorie, $idProduit]);
}

/*Supprimer un produit*/
function supprimerProduit($idProduit)
{
    $bd = getConnexion();
    $req = $bd->prepare("DELETE FROM produit WHERE idProduit = ?");
    return $req->execute([$idProduit]);
}
/* Récupérer tous les commandes*/
function getAllCommandes()
{
    $bd = getConnexion();
    $req = $bd->query("SELECT c.*, cl.nomClient, cl.mailClient FROM commande c 
    JOIN client cl ON c.idClient = cl.idClient ORDER BY c.dateCommande ASC");
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/*Récupérer les commandes par ID*/

function getCommandeById($idCommande)
{
    $bd = getConnexion();
    $sql = $bd->prepare("SELECT c.*, cl.nomClient, cl.mailClient FROM commande c 
    JOIN client cl ON c.idClient = cl.idClient WHERE c.idCommande = ?");
    $sql->execute([$idCommande]);
    $commande = $sql->fetch(PDO::FETCH_ASSOC);

        if (!$commande) {
            return null;
        }

     // Récupérer les lignes de commande + infos produit
        $sql2 = "SELECT lc.*, p.nomProduit, p.image, p.description 
                FROM ligne_commandes lc
                JOIN produit p ON lc.idProduit = p.idProduit
                WHERE lc.idCommande = ?";
        $stmt2 = $bd->prepare($sql2);
        $stmt2->execute([$idCommande]);
        $lignes = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        $commande['lignes'] = $lignes;

        return $commande;
}
/*Récupérer la ligne de commande par Id */
    // function getLigneCommande($idCommande)
    // {
    //     $bd = getConnexion();
    //     $sql = $bd->prepare("SELECT lc.*, p.nomProduit, p.image FROM ligne_commandes lc 
    //     JOIN produit p ON lc.idProduit = p.idProduit WHERE lc.idCommande = ?"); 
    //     $sql->execute([$idCommande]);
        
    // }
