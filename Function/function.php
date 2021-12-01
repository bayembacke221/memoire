<?php
function getUser($username, $conn){
    $sql = "SELECT p.* ,ps.*
    FROM prestataire p
    LEFT JOIN personne ps ON (ps.numero =p.numero) 
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);
 
    if ($stmt->rowCount() === 1) {
         $user = $stmt->fetch();
         return $user;
    }else {
        $user = [];
        return $user;
    }
 }
 function getClient($idClient, $conn){
    $sql = "SELECT c.*,ps.* FROM client c
    LEFT JOIN personne ps ON (ps.numero =c.numero) 
            WHERE idClient=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$idClient]);
 
    if ($stmt->rowCount() === 1) {
         $user = $stmt->fetch();
         return $user;
    }else {
        $user = [];
        return $user;
    }
 }


?>