<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('../Function/function.php');
if (isset($_SESSION['email'])) {
    $user = getClient($_SESSION['idClient'], $BDD);
    $info = (int) trim($_GET['infoId']);
    $query = $BDD->prepare("SELECT ps.*,o.* FROM offre o 
    LEFT join personne ps ON (o.idPrestataire=ps.numero)
    where o.idService=? AND o.etat=1 ORDER BY o.nomOffre");
    $query->execute([$info]);
    $rows = $query->fetchAll();
    
    
    
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
        <!--========== BOX ICONS ==========-->
        <link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!--========== BOOTSTRAP ==========-->
        <link href='../assets/bootstrap/css/bootstrap.min.css' rel='stylesheet'>


        <!--========== LIGHRSLIDE CSS ==========-->
        <link href='../assets/css/lightslider.css' rel='stylesheet'>


        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">
       <link rel="stylesheet" href="styleAccueil.css?t=<?php echo time(); ?>">

       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">

       <!-- STYLE CSS -->
       <link rel="stylesheet" href="../css/style.css?t=<?php echo time(); ?>">
</head>
<body>
       <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="accueil.php" class=" nav__link active-link"><i class="bx bxs-home"></i> Accueil</a></li>
                    <li class="nav__item"><a href="Accueil/messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i> Boite Messagerie</a></li>
                    <li class="nav__item"><a href="faireDemande.php" class="nav__link">Faire une demande</a></li>
                    <li class="nav__item"><a href="Accueil/suivreDemande.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="Accueil/favoris.php" class="nav__link">Mes favoris</a></li>
                    <li class="nav__item"><a href="logout.php" class="nav__link">Se deconnecter</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <section   class="menu section bd-container" id="menu" >  
            <div style="column-gap: 10rem;margin-left: 20px;grid-template-columns: repeat(3, 210px);" class="menu__container bd-grid"> 
   
                <?php
                        foreach ($rows  as $row) {
                            ?>
                            <div class="box">
                                    <div class="slide-img">
                                    <img   src="../EspacePrestataire/images/<?=$row['photo']?>" ><br>
                                        <div class="overlay">
                                            <a href="#"  data-bs-toggle="modal" data-bs-target="#valider" data-bs-whatever="<?=$row['description']?>" class="service-btn">Voir detail</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                        <h3 style="color: #069C54;margin-left:35%" class="menu__name"><?= $row['prenom']?> <?= $row['nom']?></h3>
                                            <p style="margin-left:40%"><?=$row['nomOffre']?></p>
                                            <a href="voir_prestataire.php?infoId=<?=$row['idPrestataire']?>&idOffre=<?=$row['idOffre']?>" ><button type="submit" 
                                            style="display:flex; justify-content: center; align-items: center; max-width:100px" 
                                            name="user-seeing" class="btn btn-success ms-5">Demander un service</button></a>
                                                            
                                        </div>
                                    </div>
                            </div>

                        <div class="modal fade" id="valider" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title"><?=$row['nomOffre']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        
                        <?php
                        } 

                
                        ?>
            </div>
    </section>

    <?php
		require_once('../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<script src="../assets/dist/scrollreveal.js"></script>

	<!--========== SCROLL REVEAL ==========-->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../assets/js/lightslider.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../assets/js/main.js"></script>
    <script>
        var exampleModal = document.getElementById('valider')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var modalBodyInput = exampleModal.querySelector('.modal-body p')
        modalBodyInput.innerHTML = recipient
    })
    </script>
</body>
</html>

<?php
  }else{
  	header("Location: ../../index.php");
   	exit;
  }
 ?>