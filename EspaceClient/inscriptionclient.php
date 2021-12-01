<?php
session_start();

if (!isset($_SESSION['idClient'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="css/style.css">
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		 <!--========== BOX ICONS ==========-->
		 <link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

		 <!--========== CSS ==========-->
		 <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

		<!--========== CSS ==========-->
		<link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">

		<title>Kaay Deefar</title>
		<link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style.css?t=<?php echo time(); ?>">


        <!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
        <!--========== BOX ICONS ==========-->
        <link href='assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="assets/css/styles.css?t=<?php echo time(); ?>">

       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="Images/job-5359923_640.png">
        <style>
            .sexe
            {
                padding-left:20px;
            }
        </style>
</head>

<header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="../nav/service.php" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="../EspacePrestataire/Inscriptionprestataire.php" class="nav__link">Espace  Prestataire</a></li>
                    <li class="nav__item"><a href="connexionClient.php" class="nav__link">Espace Client</a></li>
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
<?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error = htmlspecialchars($_GET['error']);?>
                    </div>
                <?php } 
                 if (isset($_GET['prenom'])) {
                    $prenom = $_GET['prenom'];
                }else $prenom = '';
                if (isset($_GET['nom'])) {
                    $nom = $_GET['nom'];
                }else $nom = '';

				if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                }else $email = '';?>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Postuler pour etre client</h2>
                        <form method="POST" action="traitementclient.php" enctype="multipart/form-data">
                           
                        <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="prenom" id="prenom" value="<?=$prenom?>" placeholder="votre prenom"/>
                            </div>
							<div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="nom" id="nom" value="<?=$nom?>" placeholder="votre nom"/>
                            </div>
                            <div class="form-group"> 
                            <label for="name"><i class="zmdi zmdi-caret-down" style="font-size: 25px"></i></label>
                            <select name="sexe" class="sexe">
                                            <option  selected="selected">chosir votre sexe</option>
                                            <option value="masculin">Homme</option>
                                            <option value="feminin">Femme</option>
                             </select>
							 
                            </div>
                        
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" value="<?=$email?>" placeholder="votre email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="mot de passe"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class='zmdi zmdi-home'></i></label>
                                <input type="text" name="adresse" id="adresse" placeholder="votre addresse"/>
                            </div>
							 <div class="form-group">
                                <label for="re-pass"><i class='zmdi zmdi-phone'></i></label>
                                <input type="text" name="telephone" id="phone" placeholder="votre telephone" required="phone"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class='bx bxs-photo-album'></i></label>
                                <input type="file" id="photo" name="photo" placeholder="Photo de profile" class="form-control">
                            </div>
                            <div class="form-group form-button">
                               <a href="connexionClient.php"> <input type="submit" name="signup" id="signup" class="form-submit" style="background:green" value="Valider"/> </a>
                            </div>
                        </form>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="connexionClient.php" class="signup-image-link">deja un compte</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <?php
			require_once('../Footer/footer.php')
		
		?>
	
    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
     <!--========== MODAL JS ==========-->
 <!-- <script src="Function/modal.js"></script> -->
</body>
</html>
<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>