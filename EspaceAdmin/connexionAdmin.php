<?php
session_start();
require_once("../ConnexionDB/connexionDB.php");
    if (isset($_POST['valider'])) {
        if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $pseudo = $_POST['pseudo'];
             $password = $_POST['mdp'];
             //echo $pseudo."<br>".$password;
            // exit();
			 $req = $BDD->prepare("SELECT * FROM administrateur WHERE username =?");
            
             $req->execute([$pseudo]);
             if ($req->rowCount() === 1) {
                 $user = $req->fetch();
                 if ($user['username'] == $pseudo) {
                     
                 
                    if ($user['password'] == $password){
                        $_SESSION['id']=$user['id'];
                        $_SESSION['username']=$user['username'];
                        $_SESSION['password']=$password;
                        header("Location: indexAndmin.php");
                    }else {
                        echo "Mauvais mot de passe";
                    }
                 }else{
                    echo "Error: login failed";
                }
             }else {
                echo "Votre mot de passe ou pseudo est incorrect";
            }
        }else {
            header("Location: ../../index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--========== BOX ICONS ==========-->
		 <link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">

    <title>Kaay Deefar</title>
    <link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">

    <title>Document</title>
</head>
<header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="../nav/service.php" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="../EspacePrestataire/Inscriptionprestataire.php" class="nav__link">Devenir prestataire</a></li>
                    <li class="nav__item"><a href="../EspaceClient/connexionClient.php" class="nav__link">Se connecter</a></li>
                    <li class="nav__item"><a href="../#contact" class="nav__link">Contactez nous</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
<body>
    <br><br><br><br><br><br>
    <form method="post" action="" align="center" class="formulaire">
    <div class="mb-3">
            <label class="form-label">
                Pseudo
            </label>
            <input type="text" name="pseudo"   class="form-control" autocomplete="off">
        </div>
        <br/>
        <div class="mb-3">
            <label class="form-label">
                Password
            </label>
            <input type="password" name="mdp"   class="form-control">
        </div>
        <br><br>
        <input type="submit" class="btn btn-success" name="valider" value="Se connecter">
    </form>

    <?php
			require_once('../Footer/footer.php')
		
		?>
		
		<!--========== SCROLL REVEAL ==========-->
		<script src="../assets/dist/scrollreveal.js"></script>

		<!--========== MAIN JS ==========-->
		<script src="../assets/js/main.js"></script>
</body>
</html>