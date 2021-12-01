    
      <?PHP
      require_once('../ConnexionDB/connexionDB.php');
      if (isset($_POST['prenom']) && isset($_POST['nom']) 
    && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['sexe']) 
    && isset($_POST['adresse']) &&   isset($_POST['telephone']))   
      {
        
            $prenom=$_POST['prenom'];
            $nom=$_POST['nom']; 
		    $sexe=$_POST['sexe'];
            $password=$_POST['password'];
            $adresse=$_POST['adresse'];
            $telephone=$_POST['telephone'];
			$email = htmlspecialchars($_POST['email']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
            echo $email."<br/>".$prenom."<br />".$telephone."<br />".$nom;
            if (empty($nom) && empty($prenom) ) {
                $em = "Prenom et nom requis!!";
       
                
                header("Location: inscriptionclient.php?error=$em");
                exit;
             }else if(empty($password)){
                $em = "Le mot de passe est invalide";
       
                header("Location: inscriptionclient.php?error=$em&$data");
                exit;
            }else if(strlen($password) < 3) {
                $valid = false;
                $em = "Le mot de passe doit faire plus de 3 caractères";
                header("Location: inscriptionclient.php?error=$em");
                exit;
                
            }else if(empty($email)){
                $em  ="Le mail ne peut pas etre vide";
                header("Location: inscriptionclient.php?error=$em");
                exit;
            }else if(!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i",$email)){
                $em = "Le mail n'est pas valide";
                header("Location: inscriptionclient.php?error=$em");
                exit;
            }else {
                $sql = "SELECT email FROM personne WHERE email=?";
                $stmt = $BDD->prepare($sql);
                $stmt->execute([$email]);
    
                if($stmt->rowCount() > 0){
                $em = "L'email ($email) est deja pris";
                header("Location: inscriptionclient.php?error=$em&$data");
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
                          
                          $new_img_name = $prenom. '.'.$img_ex_lc;
      
                          $img_upload_path = 'images/'.$new_img_name;
      
                          move_uploaded_file($tmp_name, $img_upload_path);
                      }else {
                          $em = "Type de fichier non reconnue";
                            header("Location: inscriptionclient.php?error=$em&$data");
                             exit;
                      }
      
                    }
                }
                if (isset($new_img_name)) {
                    $sql= "INSERT INTO `personne` (`prenom`, `nom`, `sexe`, `email`, 
                    `password`, `adresse`, `telephone`,`photo`)
                     VALUES (?,?,?,?,?,?,?,?)";
                    
                    $stmt = $BDD->prepare($sql);
                    $stmt->execute([$prenom,$nom,$sexe, $email, $password
                    ,$adresse,$telephone, $new_img_name]);
                    $numero = $BDD->lastInsertId();
                    $stmt2 = $BDD->prepare("INSERT INTO client(numero) VALUES (?)");
                    $stmt2->execute([$numero]);
                  }else {
                    $sql= "INSERT INTO `personne` (`prenom`, `nom`, `sexe`, `email`, 
                    `password`, `adresse`, `telephone`)
                     VALUES (?,?,?,?,?,?,?)";
                    $stmt = $BDD->prepare($sql);
                    $stmt->execute([$prenom,$nom,$sexe, $email, $password,$adresse
                    ,$telephone]);
                    $numero = $BDD->lastInsertId();
                    $stmt2 = $BDD->prepare("INSERT INTO client(numero) VALUES (?)");
                    $stmt2->execute([$numero]);
                  }
        
                  $sm = "Compte cree avec success ";
        
                  header("Location: connexionClient.php?success=$sm");
                 exit;
              }
            }


        }
            
            
            
      
      
      


      ?>