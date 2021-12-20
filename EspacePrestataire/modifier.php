<?php
session_start();
require_once("../ConnexionDB/connexionDB.php");
if (isset($_SESSION['numero'])) {
    $session = $_SESSION['numero'];
    if (isset($_POST['valider'])) {
        if (isset($_POST['username']) && isset($_POST['email'])&& isset($_POST['prenom'])&& isset($_POST['nom'])
        && isset($_POST['adresse'])&& isset($_POST['telephone']) && isset($_POST['propos'])) {
           
            $username = $_POST['username'];
            $email = $_POST['email'];
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $valid = true;
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $propos = $_POST['propos'];
            if(empty($username)){
                $valid = false;
                $er_username = "Il faut mettre un username";
            }
            if(empty($email)){
                $valid = false;
                $er_email = "Il faut mettre un email";
            }
            if(empty($prenom)){
                $valid = false;
                $er_prenom = "Il faut mettre un prenom";
            }
            if(empty($nom)){
                $valid = false;
                $er_nom = "Il faut mettre un nom";
            }
            if(empty($adresse)){
                $valid = false;
                $er_adresse = "Il faut mettre un adresse";
            }
            if(empty($telephone)){
                $valid = false;
                $er_telephone = "Il faut mettre un telephone";
            }
            if(empty($propos)){
                $valid = false;
                $er_propos = "Il faut mettre un propos";
            }else{
                $req = $BDD->prepare("SELECT username  FROM prestataire  
                        WHERE numero=? ");
                        $req->execute(array($_SESSION['numero']));
                        $stmt= $req->fetch();
                        if ($stmt['username'] <> "" && $_SESSION['username'] != $stmt['username']){
                            $valid = false;
                            $er_username = "Ce username existe déjà";
                        }
        
                }
                if ($valid) {
                    $req =$BDD->prepare("UPDATE personne SET prenom = ?, nom = ?, email = ? , telephone=? , adresse=?
                    WHERE numero = ?");
                    $req->execute(array($prenom, $nom,$email,$telephone,$adresse, $_SESSION['numero']));
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['email'] = $email;
                    $req2 = $BDD->prepare("UPDATE prestataire SET propos=?,username=? WHERE numero = ?");
                    $req2->execute(array($propos,$username,$_SESSION['numero'])); 
                }
                
        }
        
        if (isset($_FILES['pp'])) {
        
            $img_name  = $_FILES['pp']['name'];
            $tmp_name  = $_FILES['pp']['tmp_name'];
            $error  = $_FILES['pp']['error'];
            if($error === 0){
                
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
    
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png");
                if (in_array($img_ex_lc, $allowed_exs)) {
                
                    $new_img_name =$_SESSION['numero'].'.'.$img_ex_lc;
    
                    $img_upload_path = "../EspacePrestataire/images/".$new_img_name;
    
                    move_uploaded_file($tmp_name, $img_upload_path);
                }else {
                    $em = "Type de fichier non reconnue";
                    header("Location: accueil.php?error=$em&$data");
                        exit;
                }
    
            }
            
        }
        if (isset($new_img_name)) {
        $req =$BDD->prepare("UPDATE personne SET photo = ?
        WHERE numero = ?");
        $req->execute(array($new_img_name, $_SESSION['numero']));
        
        }
        header('Location:  profil.php');
        exit;
    }
}