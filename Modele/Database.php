<?php


function getConnexion(): PDO
{

    $tParam = parse_ini_file("param/param.ini", true);


    extract($tParam);

    $dsn = "mysql:dbname=$DBNAME;host=$DBHOST;port=$DBPORT";

    try {
        $option = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );

        $connexion = new PDO($dsn, $DBUSER, $DBPASS, $option);

        return $connexion;
    } catch (PDOException $e) {
        die("Echec de Connexion" . $e->getMessage());
    }
}
?>
