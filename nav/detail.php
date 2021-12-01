<?php
session_start();
include("../ConnexionDB/connexionDB.php");
    $idserv=$_GET['t'];
    $query = $BDD->prepare("SELECT p.*,s.* FROM photo p inner join service s on (s.idService=p.idService)  WHERE p.idService=$idserv");
    $query->execute();
    $req = $query->fetch();
                        $sql3=$BDD->prepare("SELECT ps.*,o.* FROM offre o 
                        LEFT join personne ps ON (o.idPrestataire=ps.numero)
                        where o.idService=$idserv AND o.etat=1 ORDER BY o.nomOffre");
                        $sql3->execute();
                        $stmt =$sql3->fetchAll();
                        

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--========== BOOTSTRAP ==========-->
    <link href='../assets/bootstrap/css/bootstrap.min.css' rel='stylesheet'>


    <!--========== LIGHRSLIDE CSS ==========-->
    <link href='../assets/css/lightslider.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">

    
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../Function/style.css?t=<?php echo time(); ?>">

     <!--========== CSS ==========-->
     <link rel="stylesheet" href="style.css?t=<?php echo time(); ?>">


    <title>Kaay Deefar</title>
    <link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">
</head>
<body>
        <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="../index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="service.php" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="../EspacePrestataire/Inscriptionprestataire.php" class="nav__link">Espace Prestataire</a></li>
                    <li class="nav__item"><a href="../EspaceClient/inscriptionclient.php" class="nav__link">Espace Client</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contactez nous</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <style>
        .fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link) , .fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):before, .fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):after {color: #2b2b2b;}.fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover, .fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:before, .fusion-fullwidth.fusion-builder-row-3 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:after {color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-3 .pagination a.inactive:hover, .fusion-fullwidth.fusion-builder-row-3 .fusion-filters .fusion-filter.fusion-active a {border-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-3 .pagination .current {border-color: #c2b59b; background-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-3 .fusion-filters .fusion-filter.fusion-active a, .fusion-fullwidth.fusion-builder-row-3 .fusion-date-and-formats .fusion-format-box, .fusion-fullwidth.fusion-builder-row-3 .fusion-popover, .fusion-fullwidth.fusion-builder-row-3 .tooltip-shortcode 
        {color: #c2b59b;}#main .fusion-fullwidth.fusion-builder-row-3 .post .blog-shortcode-post-title a:hover {color: #c2b59b;}
    </style>

    <div class="fusion-bg-parallax" data-bg-align="center center" 
    data-direction="down" data-mute="false" data-opacity="100" data-velocity="-0.3" 
    data-mobile-enabled="true" data-break_parents="0"
     data-bg-image="../EspaceAdmin/uploadImage/<?=$req['nomPhoto']?>" data-bg-repeat="false" data-bg-height=""
      data-bg-width="" style="display: none;" data-parallax-index="0">

    </div>
    <br><br><br><br>
    <div class="fusion-fullwidth fullwidth-box fusion-builder-row-4 fusion-parallax-down nonhundred-percent-fullwidth
     non-hundred-percent-height-scrolling bg-parallax-parent" style="background-color: rgba(139, 195, 74, 0);
      background-image: none; background-position: center center; background-repeat: no-repeat; padding: 100px 30px;
       background-size: cover; position: relative; overflow: hidden; z-index: 1;">
       <div class="parallax-inner"
        style="pointer-events: none; width: 1349px; height: 1354.7px; position: absolute; z-index: -1; top: -125.7px;
         left: 0px; opacity: 1; background-position: center center; background-repeat: no-repeat; background-size: cover;
          background-image: url(&quot;../EspaceAdmin/uploadImage/<?=$req['nomPhoto']?>&quot;); min-height: 150px; transform: translate3d(0px, 79.4643px, 0px);">
          </div><div class="fusion-builder-row fusion-row ">
              <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2 fusion-builder-column-9 
              fusion-one-half fusion-column-first 1_2" style="margin-top:0px;margin-bottom:30px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );margin-right: 4%;"><div class="fusion-column-wrapper" 
              style="padding: 0px; background-position: left top; background-repeat: no-repeat; background-size: cover; 
              height: auto;" data-bg-url=""><style type="text/css"></style><div class="fusion-title title fusion-title-1 
              fusion-sep-none fusion-title-text fusion-title-size-two fusion-border-below-title"
               style="margin-top:0px;margin-bottom:0px;"><h2 class="title-heading-left
                fusion-responsive-typography-calculated"
                style="margin: 0px; --fontSize: 40; line-height: 1.1; color: #069C54;" data-fontsize="40" data-lineheight="44px">
                <?=$req['nom']?>
            </h2></div><div class="fusion-text"><p style="text-align: left;color:#fff"><?=$req['description']?></p>
</div><div class="fusion-clearfix"></div></div></div><div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2 fusion-builder-column-10 fusion-one-half fusion-column-last 1_2" style="margin-top:0px;margin-bottom:30px;width:50%;width:calc(50% - ( ( 4% ) * 0.5 ) );"><div class="fusion-column-wrapper" style="padding: 0px 0px 0px 0px;background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
<div class="fusion-clearfix"></div></div></div></div></div>

<div class="modal fade" id="valider" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                        <h5 class="modal-title">Connexion requise <i style="color:red" class='bx bxs-error-alt'></i></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                    <form method="post" action="modal.php">
                            <h1>Avez-vous deja un compte</h1>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="OUI" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    OUI
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" value="NON" id="flexRadioDefault2" >
                                <label class="form-check-label" for="flexRadioDefault2">
                                     Non
                                 </label>
                            </div>
                            <button class=" btn btn-success next" type="submit">valider</button>
                    </form>
                    
                </div>
                   
            </div>
        </div>
    </div>
    <div style="width:70%;margin-left: -2%;" class="small-container single-product">
       
        <div class="row">
        <?php
                foreach($stmt as $stmt3){
                    if ($stmt3['idOffre']) {
        ?>
            <div class="col-2">
                <img src="../EspacePrestataire/images/<?=$stmt3['photo']?>" width="90%" id="ProductImg">
                
            </div>
            <div class="col-2">
                <h3><?=$stmt3['prenom']?> <?=$stmt3['nom']?></h3>
                <h3 style="color:#069C54;"><?=$stmt3['nomOffre']?></h3>
                <h3><?=$stmt3['adresse']?></h3><br>
                <a href="#contact" data-bs-toggle="modal" data-bs-target="#valider" class="nav__link selection">Selectionner prestataire<i class='bx bxs-plus-circle'></i></a><br>
                <h3>Detail Service <i class='bx bx-right-indent'></i></h3>
                <br>
                <p>
                    <?=$stmt3['description']?>
                </p>
            </div>
            
            <?php
         }}?>
        </div>
        
    </div>
    
    <?php
		require_once('../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<script src="../assets/dist/scrollreveal.js"></script>

    
    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../assets/js/main.js"></script>

</body>
</html>
