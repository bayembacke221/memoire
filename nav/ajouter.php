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
<div class="container">
    <div class="step-row">
        <div id="progress"></div>
        <div class="step-col">
             <small>Premier etape</small>
        </div>
        <div class="step-col">
            <small>Deuxieme etape</small>
        </div>
        <div class="step-col">
            <small>Trosieme etape</small>
        </div>
    </div>
    <br>
                                        <form id="Form1">
                                            <p>Quel est l'avancement de votre besoin ?</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Je souhaite trouver un prestataire rapidement
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Je cherche juste un prix
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Je suis au stade de la réflexion pour un besoin futur
                                                </label>
                                            </div>
                                            <div class="btn-box">
                                                <button type="button" id="Next1">Suivante</button>
                                            </div>
                                        </form>

                                        <form id="Form2">
                                            <p>Quand souhaitez-vous que le service soit réalisé ?</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Le plus tôt possible
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2" id="label">
                                                    À une date précise
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Je suis flexible
                                                </label>
                                            </div>
                                            <div class="btn-box">
                                                <button type="button" id="Back1">Precedent</button>
                                            
                                                <button type="button" id="Next2" >Suivante</button>
                                            </div>
                                        </form>


                                        <form id="Form3">
                                            <p>Souhaitez-vous ajouter des photos ?</p>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" id="inputGroupFile01">
                                            </div>
                                            <div class="btn-box">
                                                <button type="button" id="Back2">Precedent</button>
                                            
                                                <button type="submit" >Envoyer</button>
                                            </div>
                                        </form>
                                        
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
    <script>
        var Form1 = document.getElementById('Form1');
        var Form2 = document.getElementById('Form2');
        var Form3 = document.getElementById('Form3');

        var Next1 = document.getElementById('Next1');
        var Next2 = document.getElementById('Next2');

        var Back1 = document.getElementById('Back1');
        var Back2 = document.getElementById('Back1');

        Next1.onclick - function() {
            Form1.style.left = "-450px";
            Form2.style.left = "40px";

        }

        var flexRadioDefault2 = document.getElementById('flexRadioDefault2');
        flexRadioDefault2.addEventListener('click', function() {
            document.getElementById('label').innerHTML += `<input style="margin-left:100%;margin-top:-20%" type="date" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
</div>`;
        })
        var ProductImg = document.getElementById('ProductImg');
        var SmallImg = document.getElementsByClassName("small-img");
        for (let index = 0; index < SmallImg.length; index++) {
                SmallImg[index].onclick = function(){
                ProductImg.src=SmallImg[index].src;
            }
            
        }
    </script>
</body>
</html>