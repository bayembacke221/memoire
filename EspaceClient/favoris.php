<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('../Function/function.php');
if (isset($_SESSION['numero'])) {
    $id= $_GET['id'];
    if ($id != $_SESSION['numero']) {
        $dejaFavoris = $BDD->prepare("SELECT * FROM favoris WHERE idClient =? AND idPrestataire=?");
        $dejaFavoris->execute(array($_SESSION['numero'],$id));
        $favoris  = $dejaFavoris->rowCount();
        if ($favoris == 0) {
            $addFavoris = $BDD->prepare("INSERT INTO favoris (idClient,idPrestataire) VALUES (?,?)");
            $addFavoris->execute(array($_SESSION['numero'],$id));
        }
        elseif($favoris==1){ 
        $deletefavorite=$BDD->prepare('DELETE from favoris where idClient=? AND idPrestataire=?');
        $deletefavorite->execute(array($_SESSION['numero'],$id));
        }
    }
    header('location:'.$_SERVER['HTTP_REFERER']);
}
