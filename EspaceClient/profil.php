<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('../Function/function.php');
if (isset($_SESSION['numero'])) {
    $requete = $BDD->prepare("SELECT * FROM personne WHERE numero = ?");
    $requete->execute([$_SESSION['numero']]);
    $user = $requete->fetch();
    $query =$BDD->query("SELECT * FROM service LIMIT 9");
$services =$query->fetchAll();
$query2 = $BDD->query("SELECT * FROM service LIMIT 10 OFFSET 9 ");
$service2s =$query2->fetchAll();
    
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

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

         <!--========== LIGHRSLIDE CSS ==========-->
         <link href='../assets/css/lightslider.css' rel='stylesheet'>

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">
       <link rel="stylesheet" href="../EspacePrestataire/styleAccueil.css?t=<? echo time(); ?>">

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
                    <li class="nav__item"><a href="accueil.php" class="nav__link active-link active">Accueil</a></li>
                    <li class="nav__item"><a href="profil.php" class="nav__link"><i class="bx bxs-user-pin"></i>Profil</a></li>
                    <li class="nav__item"><a href="service.php" class=" nav__link ">Services</a>
                        <div class="sub-menu-1">
                           
                            <ul>
                                <li class="nav__item">
                                <?php
                            foreach ($services as $service) {
                                    ?>
                                    <a href="voir_offre.php?infoId=<?=$service['idService']?>" class="nav__link "><?=$service['nom']?></a><br>
                                    <?php
                                    }?>
                                   
                                    <div class="sub-menu-2">
                                        <ul>

                                            <li class="nav__item">
                                            <?php
                                                foreach ($service2s as $service2) {
                                                ?>
                                                <a href="voir_offre.php?infoId=<?=$service2['idService']?>" class="nav__link "><?=$service2['nom']?></a><br>
                                                <?php
                                                }?>
                                            </ul>
                                    </div>
                                   
                                </li>
                            </ul>
                            
                        </div>
                       
                    </li>
                    <li class="nav__item"><a href="Accueil/messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i>Messagerie</a></li>
                    <li class="nav__item"><a href="Accueil/suivreDemande.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="Accueil/favoris.php" class="nav__link">Favoris</a></li>
                    <li class="nav__item"><a href="logout.php" class="nav__link">Deconnexion</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

  <div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">  
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="images/<?=$user['photo']?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?=$user['prenom']?> <?=$user['nom']?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
             
             
             
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(images/<?=$user['photo']?>); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Bienvenue <?=$user['prenom']?> <?=$user['nom']?></h1>
            <p class="text-white mt-0 mb-5">Voici votre page de profil</p>
           
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="images/<?=$user['photo']?>" style="border-radius: 10%;">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              
            </div>
            <div class="card-body pt-0 pt-md-4">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    
                  </div>
                </div>
              </div>
              <br><br>
              <div class="text-center">
                <h3>
                    <?=$user['prenom']?> <?=$user['nom']?><span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i><?=$user['adresse']?> 
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i><?=$user['telephone']?> 
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Mon compte</h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data" action="modifier.php">
              
                <h6 class="heading-small text-muted mb-4">Information de l'utilisateur</h6>
                <div class="pl-lg-4">
                  <div class="row">
                   
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Adresse email</label>
                        <input style="color:black" type="email" name="email" id="input-email" class="form-control form-control-alternative" value="<?=$user['email']?>" >
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">Prenom</label>
                        <input style="color:black" type="text" name="prenom" id="input-first-name" class="form-control form-control-alternative" value="<?=$user['prenom']?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Nom</label>
                        <input style="color:black" type="text" name="nom" id="input-last-name" class="form-control form-control-alternative" value="<?=$user['nom']?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Photo profile</label>
                        <input style="color:black" type="file" name="pp" id="input-last-name" class="form-control form-control-alternative" >
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Mes informations personnelles</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Adresse</label>
                        <input style="color:black" id="input-address" name="adresse" class="form-control form-control-alternative" value="<?=$user['adresse']?>"  type="text">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Telephone</label>
                        <input style="color:black" type="text" name="telephone" id="input-city" class="form-control form-control-alternative" value="<?=$user['telephone']?>">
                      </div>
                    </div>
                    
                    </div>
                    
                  </div>
                </div>
                <button name="valider" class="btn btn-info">Editer votre profil</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 


        <?php
			require_once('../Footer/footer.php')
		
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
</body>
</html>

<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>