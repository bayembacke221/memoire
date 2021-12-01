<?php
session_start();
include("../ConnexionDB/connexionDB.php");
if (!isset($_SESSION['idPrestataire'])) {
$sql = "SELECT * FROM service";
$req = $BDD->prepare($sql);
$req->execute();
$rows=$req->fetchAll();

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
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
	</head>
	
	<body>
		<style>
			.fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link) , .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):before, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):after {color: #2b2b2b;}.fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:before, .fusion-fullwidth.fusion-builder-row-1 a:not(.fusion-button):not(.fusion-builder-module-control):not(.fusion-social-network-icon):not(.fb-icon-element):not(.fusion-countdown-link):not(.fusion-rollover-link):not(.fusion-rollover-gallery):not(.fusion-button-bar):not(.add_to_cart_button):not(.show_details_button):not(.product_type_external):not(.fusion-quick-view):not(.fusion-rollover-title-link):not(.fusion-breadcrumb-link):hover:after {color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .pagination a.inactive:hover, .fusion-fullwidth.fusion-builder-row-1 .fusion-filters .fusion-filter.fusion-active a {border-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .pagination .current {border-color: #c2b59b; background-color: #c2b59b;}.fusion-fullwidth.fusion-builder-row-1 .fusion-filters .fusion-filter.fusion-active a, .fusion-fullwidth.fusion-builder-row-1 .fusion-date-and-formats .fusion-format-box, .fusion-fullwidth.fusion-builder-row-1 .fusion-popover, .fusion-fullwidth.fusion-builder-row-1 .tooltip-shortcode {color: #c2b59b;}#main .fusion-fullwidth.fusion-builder-row-1 .post .blog-shortcode-post-title a:hover {color: #c2b59b;}
		</style>
		 <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../index.php" class="nav__link active-link">Accueil</a></li>
                    <li class="nav__item"><a href="../nav/service.php" class="nav__link ">Services</a></li>
                    <li class="nav__item"><a href="Inscriptionprestataire.php" class="nav__link">Espace  Prestataire</a></li>
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
		 <!--========== SERVICES ==========-->
		 <section class="services section bd-container" id="services">
            <h2 class="section-title">Sur Kaay Deefar, vous êtes le patron</h2>

            <div class="services__container  bd-grid">
                <div class="services__content">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="160" height="160" viewBox="0 0 160 160">
						<defs>
							<rect id="a" width="43" height="36" rx="4"/>
							<path id="b" d="M6 14h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm18 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm-9 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm18 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zM6 23h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm18 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm-9 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1zm18 0h3a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-3a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1z"/>
							<linearGradient id="d" x1="0%" y1="57.968%" y2="57.968%">
								<stop offset="0%" stop-color="#54FFFF"/>
								<stop offset="100%" stop-color="#2F78FE"/>
							</linearGradient>
							<path id="c" d="M4 0h35a4 4 0 0 1 4 4v5H0V4a4 4 0 0 1 4-4z"/>
							<linearGradient id="e" x1="9.307%" x2="91.778%" y1="91.91%" y2="20.519%">
								<stop offset="0%" stop-color="#54FFFF"/>
								<stop offset="100%" stop-color="#2F78FE"/>
							</linearGradient>
						</defs>
						<g fill="none" fill-rule="evenodd">
							<circle cx="80" cy="80" r="80" fill="#FFF"/>
							<g stroke="#000" stroke-width="2" transform="translate(44 54)">
								<circle cx="50" cy="20" r="20" fill="#FFF" fill-rule="nonzero"/>
								<g transform="translate(0 17)">
									<use fill="#FFF" fill-rule="nonzero" xlink:href="#a"/>
									<use fill="#FFF" fill-rule="nonzero" xlink:href="#b"/>
									<use fill="url(#d)" xlink:href="#c"/>
								</g>
								<path fill="url(#e)" d="M52 18h7a2 2 0 1 1 0 4h-9a2 2 0 0 1-2-2V8a2 2 0 1 1 4 0v10z"/>
							</g>
						</g>
					</svg>

                    <h3 class="services__title">Maîtrisez vos horaires</h3>
                </div>

                <div class="services__content">
					<svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" viewBox="0 0 160 160">
						<defs>
							<linearGradient id="a" x1="9.307%" x2="91.778%" y1="91.91%" y2="20.519%">
								<stop offset="0%" stop-color="#54FFFF"/>
								<stop offset="100%" stop-color="#2F78FE"/>
							</linearGradient>
						</defs>
						<g fill="none" fill-rule="evenodd">
							<circle cx="80" cy="80" r="80" fill="#FFF"/>
							<g transform="translate(52 50)">
								<rect width="37" height="50" x="6.225" y="4.707" fill="url(#a)" stroke="#000" stroke-width="2" rx="4" transform="rotate(-15 24.725 29.707)"/>
								<rect width="39" height="52" x="18" y="8" fill="#FFF" fill-rule="nonzero" stroke="#000" stroke-width="2" rx="4"/>
								<text fill="#000" font-family="Radnika-Medium, Radnika" font-size="22" font-weight="400">
									<tspan x="24" y="55">€</tspan>
								</text>
								<path fill="url(#a)" stroke="#000" stroke-width="2" d="M25.5 17h23a1.5 1.5 0 0 1 0 3h-23a1.5 1.5 0 0 1 0-3zm0 7h14a1.5 1.5 0 0 1 0 3h-14a1.5 1.5 0 0 1 0-3zm0 7h19a1.5 1.5 0 0 1 0 3h-19a1.5 1.5 0 0 1 0-3z"/>
							</g>
						</g>
					</svg>

					<h3 class="services__title">Fixez vos prix</h3>
                </div>

                <div class="services__content">
					<svg xmlns="http://www.w3.org/2000/svg" width="160" height="160" viewBox="0 0 160 160">
						<defs>
							<linearGradient id="a" x1="9.307%" x2="91.778%" y1="91.91%" y2="20.519%">
								<stop offset="0%" stop-color="#54FFFF"/>
								<stop offset="100%" stop-color="#2F78FE"/>
							</linearGradient>
						</defs>
						<g fill="none" fill-rule="evenodd">
							<circle cx="80" cy="80" r="80" fill="#FFF"/>
							<path fill="url(#a)" stroke="#000" stroke-linejoin="round" stroke-width="2" d="M75.145 52.14c0 5.049 4.08 9.14 9.109 9.14 5.03 0 9.108-4.091 9.108-9.14 0-5.048-4.079-9.14-9.108-9.14-5.03 0-9.109 4.092-9.109 9.14m-17.697 6.128c0 3.384 2.735 6.128 6.106 6.128 3.372 0 6.105-2.744 6.105-6.128s-2.733-6.128-6.105-6.128c-3.371 0-6.106 2.744-6.106 6.128M72.511 79.65V102H99V79.65c0-7.34-5.93-13.291-13.244-13.291s-13.245 5.95-13.245 13.29M54 77.717v12.488h18.37V77.717c0-5.09-4.112-9.216-9.186-9.216-5.07 0-9.184 4.126-9.184 9.216"/>
							<g stroke="#000" stroke-width="2" transform="translate(94 72)">
								<circle cx="11" cy="11" r="11" fill="#FFF" fill-rule="nonzero"/>
								<path fill="url(#a)" d="M10.536 14.9l-4.95-4.95A2 2 0 1 1 8.414 7.12l3.536 3.536 7.07-7.071a2 2 0 1 1 2.83 2.828L13.363 14.9a2 2 0 0 1-2.828 0z"/>
							</g>
						</g>
					</svg>

					<h3 class="services__title">Sélectionnez vos clients</h3>
                </div>
            </div>
        </section>
		<div class="fusion-sep-clear"></div>
		<div class="fusion-separator sep-single sep-solid" style="border-color:#d1d1d1;border-top-width:2px;margin-left: auto;margin-right: auto;margin-top:0px;margin-bottom:30px;width:100%;max-width:280px;"></div>
		<div class="fusion-text"><h3 style="text-align: center; font-size: 17px;width: 1000px; color:#2b2b2b;margin-left: 15%;" >
			

Nous travaillons avec des ouvriers qualifiés qui ont beaucoup d’expérience dans leur domaine et grâce à cela, nous garantissons une excellente qualité de service.

Notre engagement sans réserve à vos côtés vous assurera de la réalisation parfaite de votre projet.

Notre objectif est de fournir des prestations à forte valeur ajoutée par le biais desquelles la pérennité de nos relations stratégiques sera assurée.

Les valeurs de Kaay Deefar bâties autour d’un encrage national mettant en avant le sens de la responsabilité, le sens du relationnel entre autres, impriment à notre démarche, la rigueur nécessaire à l’accomplissement de vos projets :
</h3>
<ul class="fusion-checklist fusion-checklist-1" style="margin-left:45%;">
	<li class="fusion-li-item">
		<span style="font-size:150%;" 
			class="icon-wrapper circle-yes">
			<i class='bx bxs-chevron-right-circle'>L’engagement</i>
		</span>
		
	</li>
	<li class="fusion-li-item">
		<span style="font-size:150%" 
		class="icon-wrapper circle-yes">
		<i class='bx bxs-chevron-right-circle'>La sécurité</i>
		</span>
		
	</li>
	<li class="fusion-li-item">
		<span style="font-size:150%" 
		class="icon-wrapper circle-yes">
		<i class='bx bxs-chevron-right-circle'>La transparence</i>
		</span>
		
	</li>
	<li class="fusion-li-item">
		<span style="font-size:150%" 
			class="icon-wrapper circle-yes">
			<i class='bx bxs-chevron-right-circle'>L’efficacité</i>
		</span>
		
	</li>
	<li class="fusion-li-item">
		<span style="font-size:150%" 
		class="icon-wrapper circle-yes">
		<i class='bx bxs-chevron-right-circle'>L’esprit d’équipe</i>
		</span>
		
	</li>
</ul>
		</div>
		<div class="wrapper">
			<div class="inner">
				
				<form method="post" id="inscription" action="traitementPrestataire.php" enctype="multipart/form-data">
					<h3>Postuler pour etre prestataire</h3>



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

                if (isset($_GET['username'])) {
                    $username = $_GET['username'];
                }else $username = '';

				if (isset($_GET['email'])) {
                    $email = $_GET['email'];
                }else $email = '';

                ?>



					<div class="form-group">
						<input type="text" id="prenom" name="prenom" value="<?=$prenom?>" placeholder="Prenom" class="form-control">
						<input type="text" id="nom" name="nom" value="<?=$nom?>" placeholder="Nom" class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" id="username" name="username" value="<?=$username?>" placeholder="Username" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" id="email" name="email" placeholder="Adresse Email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="sexe" id="sexes" class="form-control">
							<option value="sexe" disabled selected>Sexe</option>
							<option value="m">Homme</option>
							<option value="f">Femme</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" id="passwd" name="password" placeholder="Mot de passe" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" id="passwd2" name="cofirmPpassword" placeholder="Confirmez Mot de passe" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" id="address" name="adresse" placeholder="Adresse" class="form-control">
						<i class='bx bxs-home-circle'></i>
					</div>
					<div class="form-wrapper">
						<input type="text" id="telephone" name="telephone" placeholder="Telephone" class="form-control">
						<i class='bx bxs-phone'></i>
					</div>
					
					<div class="form-wrapper">
						<label for="profession">
							<select name="profession" class="form-select form-select-sm mb-3 " aria-label=".form-select-sm example">
								<option selected>Choix de profession</option>
								<?php
									foreach($rows as $row){
								?>
								<option value="<?=$row['nom']?>"> <?=$row['nom']?></option>
								<?php
								}
								?>
							</select>
						</label>
					</div>
					<div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label></label>
                                    <textarea rows="4" name="description" class="form-control form-control-alternative" placeholder="Votre description ..."></textarea>
                                </div>
                                </div>
					
					<div class="form-wrapper">
						<input type="file" id="photo" name="photo" placeholder="Photo de profile" class="form-control">
						<i class='bx bxs-photo-album'></i>
					</div>
					<button style="margin-left:25%;" name="valider" class="btn btn-success" value="S'inscrire">S'inscrire
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					<p><a style="color:green; margin-top:-15%" href="connexionPrestataire.php"> Deja un compte</a></p>
					
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

		<script src="JS/index.js"></script>
		
	</body>
	    
</html>
<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>