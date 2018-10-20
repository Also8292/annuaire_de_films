<?php


/**
 * get database connexion
 */
function connexion() {
    try {
        $con = new PDO('mysql:host=localhost;dbname=annuaire_film;charset=utf8','root','');
        return $con;
    }
    catch(Exception $ex) {
        die('Erreur : ' . $ex->getMessage());
    }
}


/**
 * get all film from database
 */
function show_film() {
    $db = connexion();
    $query = 'SELECT * FROM films';
    $request = $db->prepare($query);
    $request->execute();

    return $request;
}


