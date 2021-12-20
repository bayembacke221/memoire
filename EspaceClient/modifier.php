<?php
session_start();
require_once("../ConnexionDB/connexionDB.php");
if (isset($_SESSION['numero'])) {
if(isset($_POST['valider'])){
    // echo "valider";
    // exit;
    if (isset($_POST['email']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['adresse'])
    && isset($_POST['telephone'])){
        $valid = true;
        $email=$_POST['email'];
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $adresse = $_POST['adresse'];
        $telephone = $_POST['telephone'];

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
        }else{
            $query = $BDD->prepare("SELECT email FROM personne WHERE numero=?");
            $query->execute(array($_SESSION['numero']));
            $stmt= $query->fetch();
            if ($stmt['email'] <> "" && $_SESSION['email'] != $stmt['email']){
                $valid = false;
                $er_username = "Ce mail existe déjà";}

        }
        if ($valid) {
            $req =$BDD->prepare("UPDATE personne SET prenom = ?, nom = ?, email = ? , telephone=? , adresse=?
            WHERE numero = ?");
            $req->execute(array($prenom, $nom,$email,$telephone,$adresse, $_SESSION['numero']));
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
        // header('Location:  profil.php');
        // exit;
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

                $img_upload_path = "../EspaceClient/images/".$new_img_name;

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