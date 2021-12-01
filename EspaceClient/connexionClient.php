<?php
    session_start();
    if (!isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
   
    		 <!--========== HEADER ==========-->
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
    <br><br><br><br><br>
    <div class="fusion-layout-column fusion_builder_column fusion_builder_column_2_3 fusion-builder-column-3 fusion-two-third 2_3" style="margin-top:0px;margin-bottom:30px;width:100%; margin-right: 4%;">
    <div class="fusion-column-wrapper"
     style="padding: 0px; background-position: left top; background-repeat: no-repeat; background-size: cover; height: auto; " data-bg-url=""><div class="imageframe-align-center"><span style="width:100%;max-width:100px;" class="fusion-imageframe imageframe-none imageframe-1 hover-type-none">
     <img src="images/outils-1.png" alt="" title="outils" class="img-responsive wp-image-880" 
     srcset="images/outils-1.png 200w, images/outils-1.png 329w" 
     sizes="(max-width: 800px) 100vw, 329px" width="209" height="128" style="display:flex;justify-content: center;align-items: center;margin-left: 40%;">
    </span></div><div class="fusion-sep-clear"></div><div class="fusion-separator fusion-full-width-sep sep-none" style="margin-left: auto;margin-right: auto;margin-top:20px;"></div><div class="fusion-text"><h2 style="text-align: center; --fontSize: 40; line-height: 1.1;" data-fontsize="40" data-lineheight="44px" class="fusion-responsive-typography-calculated">N’ayez plus peur des travaux !</h2>
</div><div class="fusion-sep-clear"></div><div class="fusion-separator sep-single sep-solid" style="border-color:#d1d1d1;border-top-width:2px;margin-left: auto;margin-right: auto;margin-top:0px;margin-bottom:30px;width:100%;max-width:280px;"></div><div class="fusion-text"><h3 style="text-align: center; --fontSize: 25; line-height: 1.1; --minFontSize: 25;" data-fontsize="25" data-lineheight="27.5px" class="fusion-responsive-typography-calculated">Notre équipe est soucieuse de la qualité et répondra à toutes vos demandes en matière de rénovation. Il est de notre devoir de vous donner un service professionnel dans le délai établi.</h3>
</div><div class="fusion-sep-clear"></div><div class="fusion-separator fusion-full-width-sep sep-none" style="margin-left: auto;margin-right: auto;margin-top:30px;"></div><div class="fusion-clearfix"></div></div></div>
    <section class="services section bd-container" id="services">
           
            <div class="services__container  bd-grid">
                <div class="services__content">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACECAYAAABRRIOnAAADNElEQVR4nO2cUXEbQRAFG4IgDARDMARDEARBGAaBEAiGEAiGEAiB4HyoUmU769VJOu2sdN1V/S/N67o6/QhERERERERERERERERERERE5Fx2wDOwBw5A6tnuOd7wrnkCfgJ/gHddzVcgls8wBwcM4dbm0jEqCY4FVx9rK74x+dPiF/VH2pq/Fy1TwIH642zVw4J9hhL4zlDt06mRRuJ7Q72vJ1caxA6fDrO4O7HVEJ6pP4QefelPNYY99YfQo1O8XPrrYh6zP9UYkvpDqEFow+wuNYik/hBqENowu0sNIqk/hBqENszuUoNI6g+hBqENs7vUIJL6Q6hBaMPsLjWIpP4QahDaMLtLDSKpP4QahDbM7lKDSOoPoQahDbO71CCS+kOoQWjD7C41iKT+EGoQ2jC7Sw0iqT+EGoQ2zO5Sg0jqD6EGoQ2zu9QgkvpDqEFow+wuNYik/hBqENowu0sNIqk/hBqENszuUoNI6g+hBqENs7vUIJL6Q6hBaMPsLjWIpP4QahDaMLtLDSKpP4QahDbM7lKDSOoPsYYzEhz/7d4gCpyN4LwYDGJlZyI4PwaDWNlZCC6LwSBWdgaCy2MwiJWtJrguhncm+fPzpH7Mew8iuD6GH6M/9Hck9WPecxDBA8UABnENwYPFAAZxKcEDxgAGcQnBg8YABnEuwQPHAAZxDsGDxwAGsZRgAzGAQSwh2EgMYBCnCDYUAxhEj2BjMYBBfEewwRjAIFoEG40BDOIrwYZjAIP4SLDxGMAg/hEYA2AQYAyfSOrHrAwiMIZPJPVjVgURGMN/JPVjVgQRGEOTpH7M0UEExvAtSf2YI4MIjKFLUj/mqCACYzhJUj/miCACY1hEUj/mrYMIjGExSf2YtwwiMIazSOrHvFUQgTGcTVI/5i2CCIzhIpL6MdcOIjCGi0nqx1wziMAYriKpH3OtIAJjuJqkfsw1DIxhFZL6MdfQGFbihfoxqzWGD2w9CGP4wo76UYxhMl6pH8cYJiKoH8gYJiOpH8oYJuON+sGMYSKCx43CGK4gqR/QGCbjicf49WEMN+AF2HN8ctyT+2VfT0RERERERERERERERERERERm5S+OPi6ToOQPawAAAABJRU5ErkJggg=="/>

                    <p class="services__description">Une offre technique et financière gratuite et détaillée en 24h</p>
                </div>

                <div class="services__content">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACECAYAAABRRIOnAAAEcElEQVR4nO2dUZWjQBRESwISIiESImEkICES2kEkICESkDASkICE3Q+SM5yZYdIk/bqKUPec+7E/u7xHbUOapgGMMcYYY4wxxhhjjDHGmN3TAPgA0AH4BDAC+GeLeQVwyT4bZE4ABvCbtgfHW78laTCllt2kvTneei9Fg+nSwG7OXu0en6K6eGTgOj4+RfX4AL8hVgRfKnSUwKODjhJcwW+EFQrEAH4jrANhf1ECdhOsA2EXlIDdBOtA2AUlYDfBOhBF/MQ0h9Jheg7TAeix7V9NErCbkOuI6YSfARwy6jpje5NuErCbkGMP4PhkfUdMowe7BgeigCOmZy0lOEJ/GaAE7CYs+Ym8S8Ma1J/sSsBuwlIYIpeU9QI1OhCZDohfX6g6UkjAbsLcEc/fPK7lAL17CgnYTZibYkv9QVvgmB2IIAdwlqIPTx6vAxHsObrQBdrM49t0INIK2U24eyhW/TqazOPbdCDYha31GtOGbDrwe+BAzEwhXcinBb8HDsTMUtPTz3ICvwcOxMxacw9LqNxHhMEubK2HkC7k40CIqfAqPLsHDsRM9iXjAH4PHIiZp5Au5HMCvwcOxEzWLOWdFvweOBAz2RNTKmsvw0grZDfhLuvGsoHOY3AJ2E242wbXuYTS/hgSsJtwl7HHktrKKQnYTZjbxpb6g3Oh43YggvQSOgHYTfjuEFsugOlS0ZPqcyCesA+st4HOz0wHYoUR72Yoh8GByLDkPcUJWgtqHYgX7PD8I/IDpu0C1G4gHYgCXpH303T+rY8tBCE8EGmF7CY8a4+vDUMSplGgx7Y/9hIGuzDrQNgChsEuzDoQtoBhsAuzDoQtYBjswqwDYQsYBrsw60CEe9/K+HLzjGl6+oTpAdjp9ucWXzOXHbSWyNECkVbIbsJfAbhgOsElHoN/3P4+5YBIwG7C3B7T//zoZXTN7d8ZiLU6EH/Yg/c63/2pKLsHuw/EiOlEsF/0vaOwSboErBFBJQjfOYJ3nyFB7VHhDI39IB7BeGdDAo8KyxxRd1GuBDUKvWAbo8ISFzgQRcPwDtQIhQSRBaZ6ZVQhwYF4WvauMFFEbh8QRlphRGHvcplYIuryEUbksPbI6M8jqRAxVxEGKwwj+DvK1eIAB+Kh73rfsETp+4kwGGEYIgsSZoAD8aspsiBhWjgQPxyxjxvJ32hQbpQIw6NDXUr9DA2jdiC29tCqNKU+rxBG7UDs9XIxp8QWBGHUDMMQWciGKDFRFUZa4atF9JGFbIgS6yYkeLWId39ukUuJG0sJXi0iVT9iTRIcCAdiRoID4UDMSHAgHIgZCQ6ELawE7CZYB8IuKAG7CdaBsAtKwG6CdSDsghKwm2AdCLugBOwmWAfCLijBVr8+845KoLxv496UoAO/EVYoEC34jbBCgSj55pF9g0AAsbui2A0GAtD+JvYe/Hx8iuriSwfX7vEpqk8D/+pgKP/2fAtPWNUMQ5tzUhQ4Y3pVbwC/ce/kiK8vBB1yT4YxxhhjjDHGGGOMMcYYI8x/V+VLtRJIrikAAAAASUVORK5CYII="/>

                    <p class="services__description">Les meilleurs ouvriers spécialisés sélectionnés pour vous</p>
                </div>

                <div class="services__content">
                <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIQAAACECAYAAABRRIOnAAAFk0lEQVR4nO2cW3njMBSEB0IgCEIgGEIgGEIhmMFCMISFYAiBYAiF0H1QvNt2k9SjyzmSM//3zVsrSzqTo6sNCCGEEEIIIYQQQgghhBBCCCGEECUIAE7elRBtEACsN8kUL05ANMLHTVfX2ghXAr6aYdPiWCfhRMB9M2ya3WomzAl4boZNF6f6CUMC9pnhA8D77e/FQQnYbwZNMl+ACZwZNk32VRVWLOANoaHjwJzADxsfAH57VFbYEJA2dGjVcWAGpA0dL88J8RcVfKtRhV/gTTF6VNSLE2JanBGXW++43ykr4pg6ov/DoCs4Q6w+1bRlwHMD7JlwjcZ1LsUZmkv8ZUAMZooJ7mmB39ASkL4SYPvgkJtVE9Izwk+azFoRCfi3lEwxRQDfxpBX5XY4Ic4Rahjhe7awIOD/fYUxoRy2T97yqt0GJ5QdIrxTa8DjTaaBLOv0oJxHOsQS1NIMtTPFCc9XCCnbzWyWYMtvijfYm2HTr8Jt+ckMm+aEcpl2dTtsDPAzw6ZzobbsNUPqr3glyu72fGOBvyFKzCdYM6RkCWb3sst5xAX+ZthUYkOHNQSbJdj+GvKaY08L2WHTWqA9KcfXbJZg9me6mkewkyQLhQLtYreb2dQ+E2V3NY8Y4W+AWr8oJmisEUei3DW3IZZ47DtY/aJqLhGZsruaWK7wN0DNDmSyBPvcWtnHFe/gP1KpOxTsioB5LrOaGbJbYkCAf+Br/6LYYYN57kKUO+Y2xIKUix9WGgq2kwkc89yZKHfMboUBr2KIWoFjdiy72ItocQ9iUyjYzlqBm4hyp+xWGOEdeAtDTMRzpwbKdaXWFblclWQmnjsS5U5EuVNuI6xocWNqcWwjc7h2uDkE0ObW9VS4jQvx7IEot1bmcaXFiWUo3D5mWGSeXSvzuLPC3wSbSl+6rblTyfRbV4Zo6YJM6bGW+RWzZqyVeZog5ZZRaa0o+x5oABe0iSybaVt3DPA3xFi4Teyb2wNRNpNVu32tb4afGUpfwz+Dyw7s0TczFHV1Y+o7C+zNcEXZocLi5vVKlF3a7KakdGaOVpRfZqZstg3EM9hJeFcrjHtYmeKK8rPvlLqzKX0iyn5H/x9M+UvK53T2aka9jmJM8Q7+jbF1Z9kfOOBH0keU3bi6wmZff68p2PGdvUPS9fzhGW/IM8b7rQzL9Fnj7e/pSXn3NGS1oAMGxMAu+NkAC2IHlnqJN4WAx8tPdrL3rKxH2fDl2D5JeEE0yxntTaIC/g9kSipn51RTXrVFTQL+mWLO/P+9CnlVFrUJiMNYSgabwZlhya+uaJUB/CS6+80o8ZifJtAvN5k8IU4WL4j7Em+IE6a9GhF/ZaF6TcuT8t2t0aOiNTkjdkTOp4x/0m9EswSTFqVxAd/+Fe2tspI4IwbI46LMgrikC5XbyMAenx8mO5wQg9HK+xktGCP1cK/rew+tGeGeMTxIPT5POSRrhgFt3bR+1slDlR54TOoJ72Rcz2K8od2s8EiWbz0F8P1T+saXCdsQ4R3cVFkOIQH7TdHlUGH9hftastzwCdhnim7e2fzMDP9gltJSuG+eEfDcFF1efvH8wn0ttTB8dDlvGOEfvFqyPDwK+GqKLs2QutPWkywncwGxP7s0A9DWB81ryfpUMcB/FzWJlt7mri3dO9jBK2SHTWuhPjssr5QdNo0lOu6otPCdB2t19bV5S1r+Mm1thfzuOx4T/APjpSm79w7IAv/AeEnDxjcC/IPirZDZh4fiiGcWrLo8eayFDKF5xBdm+AfEW11fci3NES7A5GrJ7sUD8YobUt+llcYnVvgHxFsyxCe8g9GKxA3vQLQiccM7EK1I3PAORCsSN7wD0YrEjUnSTqUQQgghhBBCCCGEEEIIIYQQQgghhBBCCCGEEEIIIYQQQgghkvkDSH4rZ+VNAmoAAAAASUVORK5CYII="/>
                    
                    <p class="services__description">Un conseiller travaux dédié pour vous accompagner de bout en bout</p>
                </div>
            </div>
        </section>
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img style="border-radius: 10%;" src="images/dame.jpg" alt="sing up image"></figure>
                        <a href="inscriptionclient.php" class="signup-image-link">Creer un compte</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Se connecter</h2>
                        <form method="POST" action="traitementConnexion.php" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="email" id="email" placeholder="votre email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="mot de passe"/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Se connecter"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Ou Se connecter avec votre compte</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <?php
			require_once('../Footer/footer.php')
		
		?>
        
    <!--========== SCROLL REVEAL ==========-->
    <script src="../assets/dist/scrollreveal.js"></script>

    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>

    
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
</body>
</html>
<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>