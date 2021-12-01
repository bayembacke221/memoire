<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
if (isset($_SESSION['numero'])) {
    $id = (int)$_POST['id'];

    

    $sql = "SELECT d.idDemande,d.etat,d.idPrestataire,d.information,ps.*,c.idClient
    FROM demande d
    LEFT JOIN client c ON (c.idClient= d.idClient) LEFT JOIN personne ps ON (ps.numero =c.numero)
    WHERE  d.idPrestataire=? AND d.etat=?";
    $req=$BDD->prepare($sql);
    $req->execute(array( $_SESSION['numero'], 2));
     $voir_profil=$req->fetch();

     $req2 =$BDD->prepare("SELECT * FROM message WHERE  emmetteur=? AND destinataire=? AND lu=?");
     $req2->execute(array($_SESSION['numero'],$id,1));
     $affiche_message=$req2->fetchAll();
     $messageLus = $req2->fetch();

    $req2 =$BDD->prepare("UPDATE  message SET lu= ? WHERE emmetteur=? AND destinataire=?");
    $req2->execute(array(0,$_SESSION['numero'],$id));
    
     foreach($affiche_message as $message){
        echo "<div class='conversation'>";
        echo 
        "<div  class=' talk droite'>
           <p>".nl2br($message['contenu'])."</p>";
        echo "</div>"; 
    }
 

}?>