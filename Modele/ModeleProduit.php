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


    //---- Afficher tous les produits ----
    function getAllProduits()
    {
        $db = getConnexion();
        $sql = $db->query("SELECT * FROM produit ORDER BY idProduit");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    //---- Ajouter un produit ----
    function addProduit($nomProduit, $description, $prix, $image, $idCategorie)
    {
        $db = getConnexion();
        $req = $db->prepare("INSERT INTO produit (nomProduit, description, prix, image, idCategorie)
        VALUES (?, ?, ?, ?, ?)");
        return $req->execute([$nomProduit, $description, $prix, $image, $idCategorie]);
        
    }

    //----- Récupérer tous les produits par catégorie -----
    // function getProduitsByCategorie($idCategorie)
    // {
    //     $db = getConnexion();
    //     $sql = $db->prepare("SELECT * FROM produit WHERE idCategorie = ?");
    //     $sql->execute([$idCategorie]);
    //     return $sql->fetchAll(PDO::FETCH_ASSOC);
    // }


    //---- Récupérer un produit par ID ----
     function getProduitById($id)
{
    $bd = getConnexion();
    $sql = $bd->prepare("SELECT * FROM produit WHERE idProduit = ?");
    $sql->execute([$id]);
    return $sql->fetch(PDO::FETCH_ASSOC);
}

    //---afficher quatre produits dans la page d'accueil
        function getProduitsAccueil()
    {
        $db = getConnexion();
        $sql = $db->query("SELECT * FROM produit ORDER BY idProduit ASC LIMIT 4");
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    //---- Afficher toutes les catégories ----
    function getAllCategories()
    {
        $db = getConnexion();
        $rq = $db->query("SELECT * FROM categorie");
        return $rq->fetchAll(PDO::FETCH_ASSOC);
    }




?>