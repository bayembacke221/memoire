<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('../Function/function.php');
if (isset($_SESSION['email'])) {
    $user = getClient($_SESSION['idClient'], $BDD);
    // echo $user['prenom'];
    // exit;
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
            <div  style="margin-top:-3.5%;margin-right: -30%;" class="box-search">
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
        </nav>
    </header>

    <section class="slider">
                    <!--1 -->
                    <ul id="autoWidth" class="cs-hidden">
                        <!-- 2-->
                        <li class="item-b">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-carreleur.jpg" alt="2">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Carreleur</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                    
                        <!-- 3-->
                        <li class="item-c">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-chauffeur.jpg" alt="3">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Chauffeur</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                    
                        <!-- 4-->
                        <li class="item-d">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-cle-minute.jpg" alt="4">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Cle minute</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                
                        <!-- 5-->
                        <li class="item-e">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-electricien.jpg" alt="5">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Electricien</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                
                        <!-- 6-->
                        <li class="item-f">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-frigoriste.jpg" alt="6">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Frigoriste</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                
                        <!-- 7-->
                        <li class="item-g">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-jardinier.jpg" alt="7">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Jardinage</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                
                        <!-- 8-->
                        <li class="item-h">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-macon.jpg" alt="8">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Maçon</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                        <!-- 9-->
                        <li class="item-i">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-mecanicien.jpg" alt="9">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Mecanicien</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                         <!-- 10-->
                         <li class="item-i">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-menuisier.jpg" alt="10">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Menuisier Bois</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                         <!-- 11-->
                         <li class="item-i">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-metallique.jpg" alt="11">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Menuisier Metallique</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                         <!-- 12-->
                         <li class="item-i">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/metier-peintre.jpg" alt="12">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Peintre</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                         <!-- 13-->
                         <li class="item-i">
                            <div class="box">
                                    <div class="slide-img">
                                        <img src="../EspaceClient/images/platier.jpg" alt="13">
                                        <div class="overlay">
                                            <a href="#" class="service-btn">Voir service</a>
                                        </div>
                                    </div>
                                    <div class="detail-box">
                                        <div class="type">
                                            <a href="#" class="">Platrier</a>
                                            <span>Decoration</span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                    </ul>
                    <!-- -->
            </section>
            <!-- <div class="box-search">
                <span class="section-subtitle">Cliquez pour rechercher un service </span>
                    <input type="checkbox" id="check">
                    <div class="search-box">
                        <input type="text" id="searchText" placeholder="Rechercher un service..." >
                        <label class="icon" for="check">
                            <i id="searchBtn" class="bx bx-search"></i>
                        </label>
                    </div>
                <div id="serviceList"></div>
            </div> -->

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
     <script src="../assets/jquery/jquery.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../assets/js/lightslider.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../assets/js/main.js"></script>
    <script>
          ///////////////////////////////////SECteur metier//////////////////////////
 $(document).ready(function(){  
      $('#searchText').keyup(function(){  
           var key = $(this).val();  
           console.log(key); 
           if(key != '')  
           {  
                $.ajax({  
                     url:"Rservice/search.php",  
                     method:"POST",  
                     data:{key:key},  
                     success:function(data)  
                     {  
                          $('#serviceList').fadeIn();  
                          $('#serviceList').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '#searchText', function(){  
           $('#searchText').val($(this).text());  
           $('#serviceList').fadeOut();  
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