<?php 
session_start();
require_once('../ConnexionDB/connexionDB.php');
if ($_SESSION['password']) {
    if (isset($_POST['nom']) && isset($_POST['domaine']) && isset($_POST['description']) ) {
       $nom = $_POST['nom'];
       $domaine = $_POST['domaine'];
       $description = $_POST['description'];

       $sql = "INSERT INTO `service` (`nom`,`description`,`domain`) VALUES(?,?,?)";
       $stmt = $BDD->prepare($sql);
       $stmt->bindParam(1,$nom);
        $stmt->bindParam(2,$description);
        $stmt->bindParam(3,$domaine);
        $stmt->execute();
        $idService=$BDD->lastInsertId();



        if (isset($_FILES['photo'])) {
            $img_name  = $_FILES['photo']['name'];
            $tmp_name  = $_FILES['photo']['tmp_name'];
            $error  = $_FILES['photo']['error'];

            if($error === 0){
             
               $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);

              $img_ex_lc = strtolower($img_ex);

              $allowed_exs = array("jpg", "jpeg", "png");

              if (in_array($img_ex_lc, $allowed_exs)) {
                  
                  $new_img_name = $idService. '.'.$img_ex_lc;

                  $img_upload_path = 'uploadImage/'.$new_img_name;

                  move_uploaded_file($tmp_name, $img_upload_path);
              }else {
                  $em = "Type de fichier non reconnue";
                    header("Location: inscriptionclient.php?error=$em&$data");
                     exit;
              }

            }
        }
             if (isset($new_img_name)) {
                $req="INSERT INTO photo(nomPhoto,idService) 
                VALUES(?,?)";
                $res=$BDD->prepare($req);
                $res->bindParam(1,$new_img_name);
                $res->bindParam(2,$idService);
                $res->execute();
                header("Location: services.php");
                exit;
            }
       
    }

}else{
    
    header("Location: connexionAdmin.php");
}