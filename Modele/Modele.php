<?php
require_once "Modele/Database";

function getListProduits()
{
    $db = getConnexion();

    $req = $db->query("select * from produit");

    $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

    return $resultat;
}
