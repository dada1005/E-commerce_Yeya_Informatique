<?php
    require_once("Modele/Database.php");

    class ModeleProduit {
        public static function getListProduit():array{

            $db = Database::getConnexion();
           
            $req = $db->query("select * from produit" );
            
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

            return $resultat;    
            
        }

        public static function addProduit($image, $titre, $type,  $description, $prix, $id_user): bool|string{
            $db = Database::getConnexion();

            $req = "insert into annonce (image_annonce, titre_annonce, type_annonce, description_annonce, prix_annonce, id_user)
            values (:image, :titre, :type, :description, :prix, :id_user)";
            $reponse = $db->prepare($req);
            $reponse->execute(array(":image"=>$image,":titre"=>$titre, ":type" =>$type,
            ":description"=>$description, ":prix"=>$prix, ":id_user"=>$id_user));
            $reponse->closeCursor();
            
            return $reponse->rowCount() > 0; 

        }
    }    
?>