<?php
session_start();
include("../ConnexionDB/connexionDB.php");
if (isset($_SESSION['email'])) {
   
    
    

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

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">

       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">

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
            <div style="margin-left:35%;" class="box-search">
                <span class="section-subtitle">Cliquez pour rechercher un prestataire </span>
                    <input type="checkbox" id="check">
                    <div class="search-box">
                        <input type="text" id="searchText" placeholder="Rechercher un prestataire..." >
                        <label class="icon" for="check">
                            <i id="searchBtn" class="bx bx-search"></i>
                        </label>
                    </div>
                <div id="serviceList"></div>
            </div>
    


<?php
		require_once('../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<script src="../assets/dist/scrollreveal.js"></script>

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
}else {
    header("Location: connexionClient.php");
   	exit;
}
?>