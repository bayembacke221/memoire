<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
if ($_SESSION['password']) {
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean)true;
        if (isset($_POST['btn_supprimer'])) {
            $numero=(int)$numero;
            $idPrestataire=(int)$idPrestataire;
            
            $query = $BDD->prepare("DELETE  FROM prestataire WHERE idPrestataire=? ");
            $query->execute(array($idPrestataire));
            $query = $BDD->prepare("DELETE  FROM personne WHERE numero=? ");
            $query->execute(array($idPrestataire));
    
         }
    } 
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--========== BOX ICONS ==========-->
	<link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/css/styles.css?t=<?php echo time(); ?>">

    <title>Kaay Deefar</title>
    <link rel="icon" type="image/png" sizes="20x20" href="../Images/job-5359923_640.png">
    <title>Document</title>
</head>
<body>
       <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                       <a href="indexAndmin.php" class="nav__link active-link"> Accueil </a> 
                    </li>
                    <li class="nav__item">
                        <a href="clients.php" class="nav__link">Voir clients</a>
                    </li>
                    <li class="nav__item">
                        <a href="prestataires.php" class="nav__link">Voir prestataires</a>
                    </li>
                    <li class="nav__item">
                        <a href="services.php" class="nav__link">Services</a>
                    </li>
                    <li class="nav__item">
                        <a href="logout.php" class="nav__link">Se Deconnecter</a>
                    </li>
                </ul>
            </div>
        </nav>
 </header>

  
 <section class="menu section bd-container" id="menu" >  
            <div  style="margin-left: 15%;" class="menu__container bd-grid">
 <?php
    $recupPrestataire =$BDD->query("SELECT c.*,p.* FROM prestataire c LEFT JOIN personne p ON(p.numero=c.numero)") ;
    while ($prestataire= $recupPrestataire->fetch()){
        ?>

                <div class="menu__content"  >
                    <img   src="../EspacePrestataire/images/<?=$prestataire['photo']?>" style="border-radius: 10%;">
                    <h3 class="menu__name"><?= $prestataire['prenom']?> <?= $prestataire['nom']?></h3>
                    <h3 class="menu__name"><?= $prestataire['profession']?></h3><br>
                    <form method="post">
                        <input type="hidden"  name="idPrestataire" value="<?= $prestataire['idPrestataire']?>">
                        <input type="hidden"  name="numero" value="<?= $prestataire['numero']?>">
                        <button type="submit" class="btn btn-danger " name="btn_supprimer" >Supprimer compte</button>
                    </form>
                </div>
          
       

    <?php
    }

    ?>
      </div>
     </section> 

        <?php
			require_once('../Footer/footer.php')
		?>
		
		<!--========== SCROLL REVEAL ==========-->
		<script src="../assets/dist/scrollreveal.js"></script>

		<!--========== MAIN JS ==========-->
		<script src="../assets/js/main.js"></script>
</body>
</html>
<?php
}else{
    header("Location: connexionAdmin.php");
}