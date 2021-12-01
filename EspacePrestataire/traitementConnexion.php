<?php  
session_start();
//echo "Session".$_SESSION['idPrestataire'];
require_once('../ConnexionDB/connexionDB.php');
if(isset($_POST['username']) &&
   isset($_POST['password'])){
    //echo "Bonjour tous le monde!!";
    
   
    $password = $_POST['password'];
    $username = $_POST['username'];
    //echo $username."<br>".$password;
    if(empty($username)){
      $em = "Ce champ est obligatoire";
       header("Location: connexionPrestataire.php?error=$em");
    }else if(empty($password)){
       $em = "Mot de passe requis";

       header("Location: connexionPrestataire.php?error=$em");
    }else {
       $sql  = "SELECT p.*,ps.*
       FROM personne p
       LEFT JOIN prestataire ps on (ps.numero=p.numero)
       WHERE username=?";
      $stmt = $BDD->prepare($sql);
      $stmt->execute([$username]);

       if($stmt->rowCount() === 1){
         $user = $stmt->fetch();
       
        if ($user['username'] == $username) {
          if ($password == $user['password']) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['idPrestataire'] = $user['idPrestataire'];
            $_SESSION['numero'] = $user['numero'];
            header("Location: accueil.php");

           }else {
            $em = "Mauvais mot de passe";

            header("Location: connexionPrestataire.php?error=$em");
          }
        }else {
          
          $em = "L'utilisateur saisie n'existe pas ";

          
          header("Location: connexionPrestataire.php?error=$em");
        }

      }
    }
}
else {
  header("Location: Inscriptionprestataire.php");
  exit;
}