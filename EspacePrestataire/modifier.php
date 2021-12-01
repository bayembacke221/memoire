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
                $req = $BDD->prepare("SELECT p.email,ps.username FROM personne p LEFT JOIN prestataire ps on (p.numero=ps.numero)
                        WHERE p.email=? AND ps.username=? ");
                        $req->execute(array($email,$username));
                        $stmt= $req->fetch();
                        if ($stmt['username'] <> "" && $_SESSION['username'] != $stmt['username']){
                            $valid = false;
                            $er_username = "Ce username existe déjà";
                        }else{
                            if (isset($_FILES['photo'])) {
                                $img_name  = $_FILES['photo']['name'];
                                $tmp_name  = $_FILES['photo']['tmp_name'];
                                $error  = $_FILES['photo']['error'];
                  
                                if($error === 0){
                                   $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                  
                                  $img_ex_lc = strtolower($img_ex);
                  
                                  $allowed_exs = array("jpg", "jpeg", "png");
                  
                                  if (in_array($img_ex_lc, $allowed_exs)) {
                                      
                                    $new_img_name = $username. '.'.$img_ex_lc;
                  
                                    $img_upload_path = 'modfier/'.$new_img_name;
                  
                                    move_uploaded_file($tmp_name, $img_upload_path);
                                  }else {
                                    $em = "Type de fichier non reconnue";
                                    header("Location: profil.php");
                                    exit;
                                  }
                  
                                }
                            }
                           
                            if (isset($new_img_name)) {
                                $req =$BDD->prepare("UPDATE personne SET prenom = ?, nom = ?, email=?, telephone=?,adresse=?,photo=?
                                WHERE numero = ?");
                                $req->execute(array($prenom, $nom, $email,$telephone,$adresse,$new_img_name,$session));
                                $_SESSION['nom'] = $nom;
                                $_SESSION['prenom'] = $prenom;
                                $_SESSION['email'] = $email;
                                $_SESSION['telephone'] = $telephone;
                                $_SESSION['propos'] = $propos;
                                $_SESSION['adresse'] = $adresse;
                                $req =$BDD->prepare("UPDATE prestataire SET username=?,propos=? WHERE idPrestataire=?");
                                $req->execute(array($username,$propos,$_SESSION['idPrestataire']));
                                $_SESSION['username'] = $username;

                                header('Location:  profil.php');
                                exit;
                            }
                        }
        
                }
                
        }
    }
}