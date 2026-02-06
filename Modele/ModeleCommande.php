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


function enregistrerCommande($nom, $email, $adresse, $telephone, $panier, $total)
    {
        // Exemple simple : stocker dans un fichier ou une base plus tard
        $commande = [
            "nom" => $nom,
            "email" => $email,
            "adresse" => $adresse,
            "telephone" => $telephone,
            "panier" => $panier,
            "total" => $total,
            "date" => date("Y-m-d H:i:s")
        ];

        // Pour l'instant on stocke dans la session
        $_SESSION['derniere_commande'] = $commande;

        return true;
    }

?>