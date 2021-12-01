<?php
require_once('../ConnexionDB/connexionDB.php');
    
    if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['username']) 
    && isset($_POST['password']) 
    && isset($_POST['email']) && isset($_POST['sexe']) && isset($_POST['adresse'])
    && isset($_POST['profession']) &&  isset($_POST['cofirmPpassword'])&& isset($_POST['telephone']) && isset($_POST['description'])) {
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sexe = $_POST['sexe'];
        $adresse = $_POST['adresse'];
        $profession = $_POST['profession'];
        $telephone = $_POST['telephone'];
        $cofirmPpassword = $_POST['cofirmPpassword'];
        $description = $_POST['description'];
        
        $data = 'nom='.$nom.'&prenom='.$prenom.'&username='.$username;

        // ---- verification username
			if(empty($username)){
				$em = ("Le pseudo ne peut pas être vide");
				header("Location: Inscriptionprestataire.php?error=$em");
                exit;
			}elseif(iconv_strlen($username) < 3){
				$em = ("Le pseudo doit être compris entre 3 et 20 caractères");
                header("Location: Inscriptionprestataire.php?error=$em");
                exit;
			}elseif(iconv_strlen($username) > 20){
				$em = ("Le pseudo doit être compris entre 3 et 20 caractères");
				header("Location: Inscriptionprestataire.php?error=$em");
                exit;
			}elseif(!preg_match("/^[\p{L}0-9- ]*$/u", $username)){
				$em = ("Caractères acceptés : a à z, A à Z, 0 à 9, -, espace.");
                header("Location: Inscriptionprestataire.php?error=$em");
                exit;
			}

        if (empty($nom) && empty($prenom) ) {
            $em = "Prenom et nom requis!!";
   
            
            header("Location: Inscriptionprestataire.php?error=$em");
            exit;
        }else if(empty($username)){
            $em = "Le nom d'utilisateur is requis";
   
            header("Location: Inscriptionprestataire.php?error=$em&$data");
            exit;
      }else if(empty($password)){
            $em = "Le mot de passe est invalide";
   
            header("Location: Inscriptionprestataire.php?error=$em&$data");
            exit;
        }else if(strlen($password) < 3) {
            $valid = false;
            $em = "Le mot de passe doit faire plus de 3 caractères";
            header("Location: Inscriptionprestataire.php?error=$em");
            exit;
            
        }else if($password != $cofirmPpassword){
            $em = "La confirmation du mot de passe ne correspond pas";
            header("Location: Inscriptionprestataire.php?error=$em");
            exit;
        }else if(empty($email)){
            $em  ="Le mail ne peut pas etre vide";
            header("Location: Inscriptionprestataire.php?error=$em");
            exit;
        }else if(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i",$email)){
            $em = "Le mail n'est pas valide";
            header("Location: Inscriptionprestataire.php?error=$em");
            exit;
        }else {
            $sql = "SELECT email FROM personne WHERE email=?";
            $stmt = $BDD->prepare($sql);
            $stmt->execute([$username]);

            if($stmt->rowCount() > 0){
            $em = "Le login ($username) est deja pris";
            header("Location: Inscriptionprestataire.php?error=$em&$data");
            exit;
        }else {
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
  
                      $img_upload_path = 'Images/'.$new_img_name;
  
                      move_uploaded_file($tmp_name, $img_upload_path);
                  }else {
                      $em = "Type de fichier non reconnue";
                        header("Location: Inscriptionprestataire.php?error=$em&$data");
                         exit;
                  }
  
                }
            }

            if (isset($new_img_name)) {

                $sql ="INSERT INTO `personne`(`prenom`, `nom`, `sexe`,`email`, `password` , `adresse`,`telephone`,`photo`) 
                VALUES(?,?,?,?,?,?,?,?)";
                $stmt = $BDD->prepare($sql);
                $stmt->execute([$prenom,$nom,$sexe, $email, $password
                ,$adresse,$telephone,$new_img_name]);
                $numero = $BDD->lastInsertId();
                $sql2= "INSERT INTO `prestataire`(`numero`,`username`,`profession`,`propos`) VALUES (?,?,?,?)";
                $stmt2 = $BDD->prepare($sql2);
                $stmt2->execute([$numero,$username,$profession,$description]);
                $sm = "Compte cree avec success :)";
    
                header("Location: connexionPrestataire.php?success=$sm");
               exit;
              }else {
                $sql ="INSERT INTO `personne`(`prenom`, `nom`, `sexe`,`email`, `password` , `adresse`,`telephone`) 
                VALUES(?,?,?,?,?,?,?)";
                $numero = $BDD->lastInsertId();
                $sql2= "INSERT INTO `prestataire`(`numero`,`username`,`profession`,`propos`) VALUES (?,?,?,?)";
                $stmt2 = $BDD->prepare($sql2);
                $stmt2->execute([$numero,$username,$profession,$description]);
                $sm = "Compte cree avec success :)";
    
                header("Location: connexionPrestataire.php?success=$sm");
               exit;
              }
    
             
          }
        }


}else {
    header("Location: Inscriptionprestataire.php");
    exit;
}
    














?>