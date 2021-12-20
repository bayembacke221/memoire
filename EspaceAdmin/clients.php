<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
if ($_SESSION['password']) {
if(!empty($_POST)){
    extract($_POST);
    $valid = (boolean)true;
    if (isset($_POST['btn_supprimer'])) {
        $numero=(int)$numero;
        $idClient=(int)$idClient;
        $query = $BDD->prepare("DELETE  FROM client WHERE idClient=? AND numero=? ");
        $query->execute(array($idClient,$numero));
        $query = $BDD->prepare("DELETE  FROM personne WHERE numero=? ");
        $query->execute(array($numero));

     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    $recupClient =$BDD->query("SELECT c.*,p.* FROM client c LEFT JOIN personne p ON (p.numero=c.numero)") ;
    while ($client= $recupClient->fetch()){
        ?>

                <div class="menu__content"  >
                    <img   src="../EspaceClient/images/<?=$client['photo']?>" style="border-radius: 10%;">
                    <h3 class="menu__name"><?= $client['prenom']?> <?= $client['nom']?></h3>
                    <h3 class="menu__name"><?= $client['adresse']?></h3><br>
                    <form method="post" >
                        <input type="hidden"  name="idClient" value="<?= $client['idClient']?>">
                        <input type="hidden"  name="numero" value="<?= $client['numero']?>">
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
