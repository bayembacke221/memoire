<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
require_once('function.php');
if (isset($_SESSION['numero'])) {
$query = $BDD->prepare("SELECT f.*,p.* FROM favoris f
LEFT JOIN personne p on (p.numero=f.idPrestataire)
 where f.idClient=?");
$query->execute(array($_SESSION['numero']));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- MATERIAL DESIGN ICONIC FONT -->
  <link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
        <!--========== BOX ICONS ==========-->
        <link href='../../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
        <!--========== LIGHRSLIDE CSS ==========-->
        <link href='../../assets/css/lightslider.css' rel='stylesheet'>

        <!--========== SWEET ALERT CSS ==========-->
        <link href='../../assets/css/sweetalert2.min.css' rel='stylesheet'>

    
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >
    
       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../../assets/css/styles.css?t=<?php echo time(); ?>">

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="style.css?t=<?php echo time(); ?>">
    
       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="../../Images/job-5359923_640.png">
    
       <!-- STYLE CSS -->
       <link rel="stylesheet" href="../css/style.css?t=<?php echo time(); ?>">
</head>
<body>
     <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../accueil.php" class=" nav__link active-link"><i class="bx bxs-home"></i> Accueil</a></li>
                    <li class="nav__item"><a href="messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i> Boite Messagerie</a></li>
                    <li class="nav__item"><a href="../faireDemande.php" class="nav__link">Faire une demande</a></li>
                    <li class="nav__item"><a href="suivreDemande.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="favoris.php" class="nav__link">Mes favoris</a></li>
                    <li class="nav__item"><a href="../logout.php" class="nav__link">Se deconnecter</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <section class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
                <?php
                $stmts = $query->fetchAll();
                foreach($stmts as $stmt){
                ?>
                <div class="menu__content"  >
                    <img   src="../../EspacePrestataire/images/<?=$stmt['photo']?>" class="rounded-circle"><br>
                    <h3 style="color: #069C54;" class="menu__name m-sm-3"><?= $stmt['prenom']?> <?= $stmt['nom']?></h3><br>
                    <h3 style="color: #393939;" class="menu__name"></h3><br>
                </div>
                <?php
                }
                ?>
            </div>
    </section>


    <?php
		require_once('../../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<script src="../../assets/dist/scrollreveal.js"></script>

	<!--========== SCROLL REVEAL ==========-->
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../../assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../../assets/js/lightslider.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../../assets/js/main.js"></script>
    
</body>
</html>
<?php
}else{
    header("Location: ../../index.php");
     exit;
}

?>