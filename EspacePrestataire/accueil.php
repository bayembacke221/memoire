<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('Accueil/function.php');
if (isset($_SESSION['numero'])) {
    $sql = "SELECT * FROM service";
    $req = $BDD->prepare($sql);
    $req->execute();
    $rows=$req->fetchAll();
    $user = getUser($_SESSION['username'], $BDD);
    if (isset($_POST['envoyer'])) {
        echo "yes ";
        if (isset($_POST['nom']) && isset($_POST['profession']) && isset($_POST['description']) ) {
            echo "ok ok";
            
            $nom = $_POST['nom'];
            $profession = $_POST['profession'];
            $description = $_POST['description'];
    
            $query = $BDD->prepare("SELECT * FROM service WHERE nom =?");
            $query->execute(array($profession));
            $idServices=$query->fetch();
            $idService=$idServices['idService'];
            
     
            $sql = $BDD->prepare("INSERT INTO `offre` (`etat`,`idService`,`idPrestataire`,nomOffre,description) VALUES(?,?,?,?,?)");
            $sql->execute(array(1,$idService,$_SESSION['numero'],$nom,$description));
        } 
        $idOffre=$BDD->lastInsertId();
 
 
 
         if (isset($_FILES['photo'])) {
            $total_count = count($_FILES['photo']['name']); 
            for ($i=0; $i < $total_count; $i++) { 
                $fic= $_FILES['photo']['name'][$i];

                $url=$_FILES['photo']['tmp_name'][$i];
                if (valid_extension($fic)) {
                    if ($newPic= (move_file($url,"Imageoffre",$fic))){
                        $reqq ="INSERT INTO `image` (`idOffre`, `nom`) VALUES (?,?)";
                        $stmt = $BDD->prepare($reqq);
                        $stmt->execute(array($idOffre,$newPic));
                    } else {
                        echo 'Echec de deplacement';
                    }
                } else {
                    echo 'mauvaise extension';
                } 
            }




        }
    }
     
         
             
        
   
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

    <!--========== LIGHRSLIDE CSS ==========-->
    <link href='../assets/css/lightslider.css' rel='stylesheet'>


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
      <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu"  id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="accueil.php" class="nav__link active-link active">Accueil</a></li>
                    <li class="nav__item"><a href="profil.php" class="nav__link"><i class="bx bxs-user-pin"></i>Profil</a></li>
                    <li class="nav__item"><a href="Accueil/messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i>Messagerie</a></li>
                    <li class="nav__item"><a href="Accueil/consulterOffre.php" class="nav__link">Mes demandes</a></li>
                    <li class="nav__item"><a href="Accueil/favoris.php" class="nav__link">Mes offres</a></li>
                    <li class="nav__item"><a href="deconnexion.php" class="nav__link">Deconnexion</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>
            <div style="margin-top:-3.5%;margin-right: -10%;" class="box-search">
                        <input type="checkbox" id="check">
                        <div class="search-box">
                            <input type="text" id="searchText" placeholder="Rechercher un service..." >
                            <label class="icon" for="check">
                                <i id="searchBtn" class="bx bx-search"></i>
                            </label>
                        </div>
                        <div id="serviceList"></div>
                    </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
    <div class="modal fade" id="valider" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fiche d'ajout d'offre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">Nom</h6>
                                    <input type="text"  name="nom"   class="form-control">
                            </div>
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">Service</h6>
                                <select name="profession" class="form-select form-select-sm mb-3 " aria-label=".form-select-sm example">
                                    <option selected>Choix de service</option>
                                    <?php
                                        foreach($rows as $row){
                                    ?>
                                    <option value="<?=$row['nom']?>"> <?=$row['nom']?></option>
                                    <?php
                                    }
                                    ?>
							    </select>
                            </div>
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">Photo(s) de l'offre</h6>
                                <input type="file" id="photo" name="photo[]" multiple  class="form-control">
                            </div>
                            <h6 class="heading-small text-muted mb-4">Description de l'offre</h6>
                                <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label></label>
                                    <textarea rows="4" name="description" class="form-control form-control-alternative" placeholder="Explication ..."></textarea>
                                </div>
                                </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="reset" name="annuler" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" id="envoyer" name="envoyer" class="btn btn-primary">Envoyer</button>
                    </div>
                    </div>
            </form>
        </div>
    </div>

     <!--========== HOME ==========-->
     <section  style="width:100%; height: 50%;" class="home" id="home">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                
                <div class="carousel-inner item-anime ">
                    <div class="carousel-item active">
                        <img src="../Images/fleuriste.jpg" class="d-block w-100 " alt="..."   data-c="cover-proportional" data-no-retina>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                        <div class="carousel-item">
                        <img src="../Images/metallique.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="../Images/macon.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                   
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="">Next</span>
                </button>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#valider" class="btn btn-info"><i class='bx bx-send'>Poster offre</i></button>
           
            <!-- <div class="box-search">
                <span class="section-subtitle">Cliquez pour rechercher un offre de service </span>
                    <input type="checkbox" id="check">
                    <div class="search-box">
                        <input type="text" id="searchText" placeholder="Rechercher un service..." >
                        <label class="icon" for="check">
                            <i id="searchBtn" class="bx bx-search"></i>
                        </label>
                    </div>
                <div id="serviceList"></div>
            </div> -->

            
        </section> 
     


            <?php
			require_once('../Footer/footer.php')
		
		    ?>
		
		<!--========== SCROLL REVEAL ==========-->
		<script src="../assets/dist/scrollreveal.js"></script>

        <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== LIGHTSLIDER JS ==========-->
    <script src="../assets/js/lightslider.js"></script>

        <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>

		<!--========== MAIN JS ==========-->
		<script src="../assets/js/main.js"></script>
    <script>
            /*====================RECHERCHE SERVICE JQUERY====================*/
    $(document).ready(function() {
        $("#searchText").on("input", function() {
            var searchText = $("#searchText").val();
            if (searchText == "") return;
            $.post("recherche/search.php", 
            {
                key: searchText
            }, function(data, status) {
                $("#serviceList").html(data);
            });
        });

        $("#searchBtn").on("click", function() {
            var searchText = $("#searchText").val();
            if (searchText == "") return;
            $.post("recherche/search.php", 
            {
                key: searchText
            }, function(data, status) {
                $("#serviceList").html(data);
            });
        });
    });
    </script>
</body>
</html>


<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>