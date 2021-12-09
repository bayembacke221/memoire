<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
require_once('../Function/function.php');
require_once('function.php');
if (isset($_SESSION['email'])) {
    $user = getUser($_SESSION['email'], $BDD);
    $info= (int) trim($_GET['infoId']);
    $idOffre = (int) trim($_GET['idOffre']);
    $session_client = $BDD->prepare("SELECT c.*,p.* FROM client c
    LEFT JOIN personne p on (p.numero=c.numero)
    WHERE email=?");
    $session_client->execute([$_SESSION['email']]);
    $clients = $session_client->fetch();
    $client = $clients['numero'];
     
     //echo $info;
    //   echo $user['prenom'];
      // exit;
    if($client){
        $sql = "SELECT p.*, d.*,ps.*
        FROM prestataire p 
        LEFT JOIN demande d ON (d.idPrestataire=p.numero AND idClient= :id2) LEFT JOIN personne ps ON (ps.numero =p.numero)
        WHERE ps.numero=:id1";
        $req=$BDD->prepare($sql);
        $req->execute(array('id1'=>$info, 'id2'=>$client));
    }else {
        $sql= "SELECT p.*,ps.*
            FROM prestataire p
            LEFT JOIN personne ps ON (ps.numero =p.numero)
            WHERE p.idPrestataire=:id1";
            $req=$BDD->prepare($sql);
            $req->execute(array('id1'=>$info));

    }
    $voir_prestataire = $req->fetch();
   
    if (isset($_POST['envoyer'])) {
        if (isset($_POST['information'])) {
            $information=$_POST['information'];
            $requette = "INSERT INTO  demande (idClient,idPrestataire,information,etat) VALUE(?,?,?,?)";
            $etat=0;
            $reqs=$BDD->prepare($requette);
            $reqs->execute(array($client,$info,$information,$etat));

           
        }
        $idDemande=$BDD->lastInsertId();
       
        if (isset($_FILES['photo'])) {
            
            $total_count = count($_FILES['photo']['name']); 
            for ($i=0; $i < $total_count; $i++) { 
                $fic= $_FILES['photo']['name'][$i];

                $url=$_FILES['photo']['tmp_name'][$i];
                if (valid_extension($fic)) {
                    if ($newPic= (move_file($url,"MyPhotos",$fic))){
                        $reqq ="INSERT INTO `photodemande` (`idDemande`, `nomPhoto`) VALUES (?,?)";
                        $stmt = $BDD->prepare($reqq);
                        $stmt->execute(array($idDemande,$newPic));
                    } else {
                        echo 'Echec de deplacement';
                    }
                } else {
                    echo 'mauvaise extension';
                } 
            }




        }
    }
    if (isset($_POST['user-supprimer'])){
        $sql = $BDD->prepare("SELECT * from demande where idClient=? AND idPrestataire=?");
        $sql->execute(array( $client,$info));
        $rows=$sql->fetch();
        $row=$rows['idDemande'];
        $supprimerPhoto= $BDD->prepare("DELETE FROM photodemande where idDemande=?");
        $supprimerPhoto->execute(array($row));
        $req5=$BDD->prepare("DELETE FROM demande WHERE  (idPrestataire=? AND idClient=?) 
        OR (idPrestataire=? AND idClient=?)");
        $req5->execute(array($info, $client, $client,$info));
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        <!--========== SWEET ALERT ==========-->
        <link href='../assets/css/sweetalert2.min.css' rel='stylesheet'>

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">
       <link rel="stylesheet" href="styleAccueil.css?t=<?php echo time(); ?>">

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
    <div class="modal fade" id="valider" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fiche de demande</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">Photo du service</h6>
                                    <input type="file" id="photo" name="photo[]" multiple  class="form-control">
                                </div>
                            <h6 class="heading-small text-muted mb-4">Motif de la demande</h6>
                                <div class="pl-lg-4">
                                <div class="form-group focused">
                                    <label></label>
                                    <textarea rows="4" name="information" class="form-control form-control-alternative" placeholder="Explication ..."></textarea>
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
    <?php   
                
                $sqlEtat=$BDD->prepare("SELECT idDemande,etat FROM demande WHERE (idPrestataire=? AND idClient=?) 
                OR (idPrestataire=? AND idClient=?)");
                $sqlEtat->execute(array($info, $client ,$client,$info));
                $verifEtat=$sqlEtat->fetch();
                $query = $BDD->prepare("SELECT * from offre where idOffre= ?");
                $query->execute(array($idOffre));
                $offreId= $query->fetch();
    ?>

    

    <div style="padding-top: 5%;width:55%;margin-left: 22.5%;" class="menu__content">
        <img class="card-img" 
        style="max-width:20%;display:flex;justify-content: center;align-items: center;margin-left: 40%; border-radius: 10%;"
         src="../EspacePrestataire/images/<?=$voir_prestataire['photo']?>" alt="2"><br>
         <h3 class="menu__name ms-4 m-sm-2"><?=$voir_prestataire['prenom']?> <?=$voir_prestataire['nom']?></h3>
        <h3 class="menu__name ms-4 m-sm-2">Telephone : <?=$voir_prestataire['telephone']?></h3>
        <h3 class="menu__name ms-2 m-sm-2">Proffession : <?=$voir_prestataire['profession']?></h3>
        <h3 class="menu__name ms-2 m-sm-2">Service : <?=$offreId['nomOffre']?></h3>
        <?php
			if(isset($_SESSION['email'])){
						?>
        <form method="post">
            <div style="margin-left: 42.5%; ">
            <a href='voir_profile.php?infoId=<?=$info?>' ><button class="btn btn-info ms-4 m-sm-3"  type="button" id="btnProfile" name="user-profile">Voir profile</button></a><br>
            <?php
					if(!isset($verifEtat['etat'])){
			?>
                <button class="btn btn-success ms-4 m-sm-2" data-bs-toggle="modal" data-bs-target="#valider" type="button" id="btnAjouter" name="user-ajouter">Demander service</button><br>
                <?php
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
		require_once('../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<!-- <script src="../assets/dist/scrollreveal.js"></script> -->

	<!--========== SCROLL REVEAL ==========-->
	<script src="../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../assets/js/lightslider.js"></script>

       <!--========== SWEET ALERT JS ==========-->
       <script src="../assets/js/sweetalert2.min.js"></script>

       <script>

            var Envoyer = document.getElementById("envoyer");
            Envoyer.addEventListener('click', function (){
                Swal.fire(
                    'Demande envoyee !!',
                    'Cliquez sur le bouton pour pousuivre',
                    'success')
            },false)
       </script>


	<!--========== MAIN JS ==========-->
	<!-- <script src="../assets/js/main.js"></script> -->
</body>
</html>


<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>