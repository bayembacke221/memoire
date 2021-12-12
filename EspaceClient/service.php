<?php
session_start();
include("../ConnexionDB/connexionDB.php");
$query =$BDD->query("SELECT * FROM service LIMIT 9  ");
$services =$query->fetchAll();
$query2 = $BDD->query("SELECT * FROM service LIMIT 10 OFFSET 9 ");
$service2s =$query2->fetchAll();
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
                    <li class="nav__item"><a href="service.php" class="nav__link ">Services</a>
                    <div class="sub-menu-1">
                           
                           <ul>
                               <li class="nav__item">
                               <?php
                           foreach ($services as $service) {
                                   ?>
                                   <a href="voir_offre.php?infoId=<?=$service['idService']?>&nomoffre=<?=$service['nom']?>" class="nav__link "><?=$service['nom']?></a><br>
                                   <?php
                                   }?>
                                  
                                   <div class="sub-menu-2">
                                       <ul>

                                           <li class="nav__item">
                                           <?php
                                               foreach ($service2s as $service2) {
                                               ?>
                                               <a href="voir_offre.php?infoId=<?=$service2['idService']?>&nomoffre=<?=$service2['nom']?>" class="nav__link "><?=$service2['nom']?></a><br>
                                               <?php
                                               }?>
                                           </ul>
                                   </div>
                                  
                               </li>
                           </ul>
                           
                       </div>
                    </li>
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
    <br><br><br><br>
    <div class="fusion-fullwidth fullwidth-box fusion-builder-row-1 fusion-parallax-none nonhundred-percent-fullwidth non-hundred-percent-height-scrolling fusion-no-small-visibility" style="background-color: rgba(255,255,255,0);
    background-image: url(&quot;../Images/fond-header-services-1.jpg&quot;);background-position: center center;background-repeat: no-repeat;padding-top:6%;padding-right:5%;padding-bottom:6%;padding-left:5%;border-top-width:0px;border-bottom-width:0px;border-color:#eae9e9;border-top-style:solid;border-bottom-style:solid;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;"><div class="fusion-builder-row fusion-row "><div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_2 fusion-builder-column-0 fusion-one-half fusion-column-first 1_2" style="margin-top:0px;margin-bottom:30px;width:48%; margin-right: 4%;"><div class="fusion-column-wrapper" style="padding: 0px; background-position: left top; background-repeat: no-repeat; background-size: cover; height: auto;" data-bg-url=""><div class="fusion-text"><h1 class="fusion-responsive-typography-calculated" style="--fontsize: 80; line-height: 1; text-align: left; margin-bottom: 10px; --fontSize: 45;" data-fontsize="45" data-lineheight="45px"><span style="color: #c2b59b;">NOS SERVICES</span></h1>
<p style="font-size: 30px; line-height: 36px; text-align: left;"><span style="color: #ffffff;">Un service clé en main pour des travaux de rénovation de qualité</span></p>
</div><div class="fusion-sep-clear"></div><div class="fusion-separator fusion-full-width-sep sep-none" style="margin-left: auto;margin-right: auto;margin-top:10px;margin-bottom:10px;"></div><div class="fusion-clearfix"></div></div></div></div></div>
   
<style>
    .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link) , .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):before, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):after {color: #2b2b2b;}.fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:before, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:after {color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .pagination a.inactive:hover, .fusion-fullwidth.fusion-builder-row-1 .fusion-filters .fusion-filter.fusion-active a {border-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .pagination .current {border-color: #c2b59b; background-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .fusion-filters .fusion-filter.fusion-active a, .fusion-fullwidth.fusion-builder-row-1 .fusion-date-and-formats .fusion-format-box, .fusion-fullwidth.fusion-builder-row-1 .fusion-popover, .fusion-fullwidth.fusion-builder-row-1 .tooltip-shortcode
     {color: #c2b59b;}#main .fusion-fullwidth.fusion-builder-row-1 .post .blog-shortcode-post-title a:hover {color: #c2b59b;}
</style>

<section   class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
                <?php
                 $sql =$BDD->query("SELECT * FROM service  ORDER BY `service`.`nom` ASC");
                    $stmts =$sql->fetchAll();
                    foreach($stmts as $stmt){ 
                        $idserv = $stmt['idService'];
                        $sql2=$BDD->query("SELECT * FROM photo where idService=$idserv");
                                                $stmt2 =$sql2->fetch();
                        
                            ?>
                        <div style="margin-right: 5%;background-color: #393939;" class="menu__content" >
                            <img   src="../EspaceAdmin/uploadImage/<?=$stmt2['nomPhoto']?>" class="rounded-circle"><br>
                            <h3 style="color: #069C54;" class="menu__name"><?= $stmt['nom']?></h3><br>
                            <h3 style="color: #fff;" class="menu__name"><?= $stmt['domain']?></h3><br>
                                <a class="nav__link" href="voir_offre.php?infoId=<?= $idserv;?>"> <i style="color:#069C54;" data-bs-toggle="modal" data-bs-target="#valider" class="bx bxs-right-arrow-alt"> Voir</i></a>
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

    
    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../assets/js/main.js"></script>
</body>
</html>