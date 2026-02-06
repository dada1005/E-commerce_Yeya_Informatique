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

        //-----AFFICHER LE PANIER-----

    

// function getProduitsByIds($ids) {
//     $bd= getConnexion();

//     $in  = str_repeat('?,', count($ids) - 1) . '?';
//     $sql = $bd->prepare("SELECT * FROM produit WHERE idProduit IN ($in)");
//     $sql->execute($ids);

//     return $sql->fetchAll(PDO::FETCH_ASSOC);
// }


    
function getProduitById($id)
{
    $bd = getConnexion();
    $req = $bd->prepare("SELECT * FROM produit WHERE idProduit = ?");
    $req->execute([$id]);
    return $req->fetch(PDO::FETCH_ASSOC);
}


    
?>