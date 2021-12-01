
<?php
session_start();

include("../ConnexionDB/connexionDB.php");
require_once('../Function/function.php');
if (isset($_SESSION['username'])) {
    $user = getUser($_SESSION['username'], $BDD);
    $info= (int) trim($_GET['infoId']);
    // $info;
    $prestataire= $user['idPrestataire'];
    $photo= "SELECT * from photo where idService=?";
    $stmt  = $BDD->prepare($photo);
    $stmt->execute(array($info));
    $voir_photo=$stmt->fetch();
    if($_SESSION['idPrestataire']) {
        $sql="SELECT p.*, s.*
        FROM prestataire p 
        LEFT JOIN service s ON (idService =:id1  AND idPrestataire=p.idPrestataire)
        WHERE p.idPrestataire=:id2";
        $req=$BDD->prepare($sql);
        $req->execute(array('id1'=>$info, 'id2'=>$prestataire));
    }else {
        $req = $BDD->prepare("SELECT s.* 
        FROM service s 
        WHERE s.idService=:id1");
         $req->execute(array('id1'=>$info));
    }
    $voir_offre=$req->fetch();
    // echo $voir_offre['etat'];
    // exit;
    if (!empty($_POST)) {
        extract($_POST);
        $valid=(boolean) true;
        $prestataires= $user['numero'];
        if (isset($_POST["user-ajouter"])) {

            $req3=$BDD->prepare("SELECT idOffre FROM offre WHERE (idPrestataire=? AND idService=?) 
            OR (idPrestataire=? AND idService=?)");
            $req3->execute(array($prestataires,$info,$info,$prestataires));
            $verification=$req3->fetch();
            if(isset($verification['numero'])){
                $valid=false;
            }
            if ($valid) {
                $req4=$BDD->prepare("INSERT INTO offre (idService,idPrestataire,etat) VALUES(?,?,?)");
                $req4->execute(array($info,$prestataires,0));
            }
        }elseif(isset($_POST["user-supprimer"])){
                $req5=$BDD->prepare("DELETE FROM offre WHERE  (idPrestataire=? AND idService=?) 
                OR (idPrestataire=? AND idService=?)");
                $req5->execute(array($prestataires,$info,$info,$prestataires));
               
        }
        
    }
?>
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

         <!--========== SWEET ALERT CSS ==========-->
         <link href='../assets/css/sweetalert2.min.css' rel='stylesheet'>
    
    
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
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="accueil.php" class="nav__link active-link active">Accueil</a></li>
                    <li class="nav__item"><a href="profil.php" class="nav__link"><i class="bx bxs-user-pin"></i>Profil</a></li>
                    <li class="nav__item"><a href="Accueil/messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i> Boite Messagerie</a></li>
                    <li class="nav__item"><a href="Accueil/consulterOffre.php" class="nav__link">Consulter les demandes</a></li>
                    <li class="nav__item"><a href="Accueil/favoris.php" class="nav__link">Mes favoris</a></li>
                    <li class="nav__item"><a href="deconnexion.php" class="nav__link">Se deconnecter</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <?php
                 $prestataires= $user['numero'];
                $sqlEtat=$BDD->prepare("SELECT idOffre,etat FROM offre WHERE (idPrestataire=? AND idService=?) 
                OR (idPrestataire=? AND idService=?)");
                $sqlEtat->execute(array($prestataires,$info,$info,$prestataires));
                $verifEtat=$sqlEtat->fetch();
    ?>
                   
    <div style="padding-top: 5%; width: 50%; margin-left: 25%;" class="menu__content">
        <img class="card-img rounded-circle" style="max-width:20%;display:flex;justify-content: center;align-items: center;margin-left: 40%;" src="../EspaceAdmin/uploadImage/<?=$voir_photo['nomPhoto']?>" alt="2"><br>
        <h3 class="menu__name ms-5">Nom de l'offre : <?=$voir_offre['nom']?></h3><br>
        <h3 class="menu__name ms-2">Domaine : <?=$voir_offre['domain']?></h3>
        <?php
			if(isset($_SESSION['idPrestataire'])){
						?>
        <form method="post">
            <div style="margin-left: 42.5%;">
            <?php
					if(!isset($verifEtat['etat'])){
			?>
                <button class="btn btn-success ms-1"  type="submit" id="btnAjouter" name="user-ajouter">S'inscrire a l'offre</button><br>
            <?php
                    }elseif (isset($verifEtat['etat']) && $verifEtat['etat']==1) {
                        echo "<h4 style='color:#069C54;margin-left:-10%;'>Vous etes promis a ce boulot</h4>";
                    }
                    if(isset($verifEtat['etat']) && $verifEtat['etat']==0){
			?>
                <button  class="btn btn-danger ms-4" type="submit" id="btnSupprimer" name="user-supprimer">Annuler votre demande</button>
                <?php }?>
            </div>
        </form>
        <?php
            }
        ?>
    </div>
            
            
            
            
            
            
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

        
        <!--========== SWEET ALERT JS ==========-->
        <script src="../assets/js/sweetalert2.min.js"></script>
        <script>
            var btnAjouter = document.getElementById("btnAjouter");
            btnAjouter.addEventListener('click', function (){
                Swal.fire(
                    'Demande envoyee !!',
                    'Cliquez sur le bouton pour pousuivre',
                    'success')
            },false)

           var btnSupprimer = document.getElementById("btnSupprimer");
           btnSupprimer.addEventListener('click', function (){
                Swal.fire({
                    title: 'Etes vous sur?',
                    text: "De vouloir annule votre demande",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oui, je veux annuler'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Demande annulee.',
                        'success'
                        )
                    }
                })
            },false)
            
        </script>
    
</body>
</html>

<?php
}else{
    header("Location: ../index.php");
     exit;
}