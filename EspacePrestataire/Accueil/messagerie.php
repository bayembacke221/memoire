<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
require_once('function.php');
if (isset($_SESSION['numero'])){
    $session_prestataire = $BDD->prepare("SELECT ps.*,p.* FROM prestataire ps
    LEFT JOIN personne p on (p.numero=ps.numero)
    WHERE username=?");
    $session_prestataire->execute([$_SESSION['username']]);
    $prestataires = $session_prestataire->fetch();
    $prestataire = $prestataires['numero'];
    $sql = "SELECT d.idDemande,d.etat,d.idPrestataire,d.information,ps.*,c.idClient
    FROM demande d
    LEFT JOIN client c ON (d.idClient= c.numero) LEFT JOIN personne ps ON (ps.numero =c.numero)
    WHERE  d.idPrestataire=? ";
    $req=$BDD->prepare($sql);
    $req->execute(array( $prestataire));
     $voir_profil=$req->fetch();
    
     if(!empty($_POST)){
         extract($_POST);
         $valid = (boolean)true;
         if(isset($_POST["demarrer"])){
             $id_relation=(int)$id_relation;
             if($id_relation){ 
                 $req = $BDD->prepare("SELECT idDemande FROM demande WHERE idPrestataire=? AND etat=1");
                 $req->execute(array($id_relation));
                 $verification = $req->fetch();
                 if(isset($verification['idPrestataire'])){
                     $valid = false;
                 }if($valid){
                     $req = $BDD->prepare("UPDATE demande SET etat=2   WHERE idPrestataire=? AND idClient=?");
                     $req->execute(array($id_relation, $id_cible));
                 }
                 header('Location: consulterOffre.php');
                 exit();
     
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
  <link rel="stylesheet" href="../fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
        <!--========== BOX ICONS ==========-->
        <link href='../../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
        <!--========== LIGHRSLIDE CSS ==========-->
        <link href='../../assets/css/lightslider.css' rel='stylesheet'>

        <!--========== SWEET ALERT CSS ==========-->
        <link href='../../assets/css/sweetalert2.min.css' rel='stylesheet'>

    
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >
       <!--========== CSS ==========-->
       <link rel="stylesheet" href="style.css?t=<?php echo time(); ?>">
    
       <!--========== CSS ==========-->
       <link rel="stylesheet" href="../../assets/css/styles.css?t=<?php echo time(); ?>">

    
       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="../../Images/job-5359923_640.png">
    
       <!-- STYLE CSS -->
       <link rel="stylesheet" href="css/style.css?t=<?php echo time(); ?>">
</head>
<body>
     <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="../accueil.php" class="nav__link active-link active">Accueil</a></li>
                    <li class="nav__item"><a href="../profil.php" class="nav__link"><i class="bx bxs-user-pin"></i>Profil</a></li>
                    <li class="nav__item"><a href="messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i> Boite Messagerie</a></li>
                    <li class="nav__item"><a href="consulterOffre.php" class="nav__link">Mes demandes</a></li>
                    <li class="nav__item"><a href="favoris.php" class="nav__link">Mes offres</a></li>
                    <li class="nav__item"><a href="../deconnexion.php" class="nav__link">Deconnexion</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

     
    <section style="margin-top:-5%;margin-left:5%" class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
                <?php
                    if (isset($voir_profil['etat'])) {
                    
                ?>
                <div class="menu__content"  >
                        <img src="../../EspaceClient/images/<?=$voir_profil['photo']?>"
                            class=" rounded-circle"><br><br>
                    <h3 class="menu__name ms-2"><?=$voir_profil['prenom']?> <?=$voir_profil['nom']?></h3><br>
                    
                        <?php
			            if(isset($_SESSION['numero'])){
                            
						?>
                        <form method="post" >
                        <input type="hidden"  name="id_relation" value="<?= $voir_profil['idPrestataire']?>" />
                        <input type="hidden"  name="id_cible" value="<?= $voir_profil['numero']?>" /><br>
                        <?php if(isset($voir_profil['etat']) && $voir_profil['etat']>=2) {?>
                            <a class="nav__link" href="discussion.php?idClient=<?= $voir_profil['numero']?>&idPrestataire=<?= $_SESSION['numero']?>">
                                <button style="max-width: 70%;" type="button" id="discussion"  name="discussion" class="btn btn-success ms-4	">Discuter avec le client</button><br><br>
                            </a>
                                <?php  
                                
                            }?>
                    </form>
                    <?php
                         }
                    ?>
                </div>
                <?php     
                    }?>
            </div>

                       
     </section> 
<!--Modal -->
                           
                          
        <?php
			require_once('../../Footer/footer.php')
		
		?>
    <!--========== SCROLL REVEAL ==========-->
		<script src="../../assets/dist/scrollreveal.js"></script>

<!--========== BOOTSTRAP JS ==========-->
<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

<!--========== LIGHTSLIDER JS ==========-->
<script src="../../assets/js/lightslider.js"></script>

<!--========== JQUERY ==========-->
<script src="../../assets/jquery/jquery-3.6.0.min.js"></script>


<!--========== MAIN JS ==========-->
<script src="../../assets/js/main.js"></script>

</body>
</html>
<?php
  }else{
  	header("Location: ../../index.php");
   	exit;
  }
 ?>