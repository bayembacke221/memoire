<?php
session_start();

if (!isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
       <link rel="stylesheet" href="css/style.css?t=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    	 <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="../nav/service.php" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="../EspacePrestataire/Inscriptionprestataire.php" class="nav__link">Espace Prestataire</a></li>
                    <li class="nav__item"><a href="../EspaceClient/connexionClient.php" class="nav__link">Espace Client</a></li>
                    <li class="nav__item"><a href="../#contact" class="nav__link">Contactez nous</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
<div class="wrapper">
			<div class="inner">
				<form method="post" action="traitementConnexion.php" enctype="multipart/form-data">
					<h3>Connexion prestataire</h3> 

                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php echo htmlspecialchars($_GET['error']);?> <!--Convertit les caractères spéciaux en entités HTML -->
                        </div>
                        <?php } ?>
                        
                        <?php if (isset($_GET['success'])) { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo htmlspecialchars($_GET['success']);?>
                        </div>
                        <?php }
                     ?>

                    <div class="form-wrapper">
						<input type="text" name="username" placeholder="Nom d'utilisateur" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
                    <div class="form-wrapper">
						<input type="password" name="password" placeholder="Mot de passe" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
                    <button name="connecter" class="btn btn-success">Se connecter
						<i class="zmdi zmdi-arrow-right"></i>
					</button>

                </form>
                
			</div>
		</div>

        <?php
			require_once('../Footer/footer.php')
		
		?>
    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>
</body>
</html>
<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>