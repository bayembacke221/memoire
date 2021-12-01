<?php
session_start();
require_once('../ConnexionDB/connexionDB.php');
if ($_SESSION['password']) {
    
    

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
                        <a href="offre.php" class="nav__link">Offre</a>
                    </li>
                    <li class="nav__item">
                        <a href="logout.php" class="nav__link">Se Deconnecter</a>
                    </li>
                </ul>
            </div>
        </nav>
 </header>
        <?php
            $req = $BDD->prepare("SELECT o.idOffre,o.idPrestataire, p.username, p.idPrestataire id_utilisateur,o.idService,ps.prenom,ps.nom,ps.numero,ps.photo
            FROM offre o
            INNER JOIN prestataire p ON p.numero=o.idPrestataire INNER JOIN personne ps on (ps.numero=p.numero)
            WHERE  o.etat=?");
            $req->execute(array(0));
            $voir_profil=$req->fetchAll();
            

            if (!empty($_POST)) {
                extract($_POST);
                $valid = (boolean)true;
                if(isset($_POST["accepter"])){
                    $id_relation=(int)$id_relation;
                    if($id_relation){ 
                        $req = $BDD->prepare("SELECT idOffre FROM offre WHERE idPrestataire=? AND etat=0");
                        $req->execute(array($id_relation));
                        $verification = $req->fetch();
                        if(isset($verification['idPrestataire'])){
                            $valid = false;
                        }if($valid){
                            $req = $BDD->prepare("UPDATE offre SET etat=1   WHERE idPrestataire=? AND idService=?");
                            $req->execute(array($id_relation, $id_cible));
                        }
                        header('Location: offre.php');
                        exit();
            
                    }
        
        
                    
                }elseif(isset($_POST["refuser"])){
                    //echo "entree 1";
                   $id_cible=(int)$id_cible;
                    //echo $id_cible;
                     $id_relation=(int)$id_relation;
                    // echo $id_relation;
                     if($id_relation){ 
                         echo "c'est bon";
                    $req = $BDD->prepare("DELETE  FROM offre WHERE idPrestataire=? AND idService=? ");
                    $req->execute(array($id_relation, $id_cible));
                    
                     }
                    header('Location: offre.php');
                    exit();
                    //echo '1';
        
                }
            }

        
        ?>
         <section class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
            <?php
                foreach ($voir_profil as  $ver){
                    $req1 = $BDD->prepare("SELECT * FROM service where idService=?");
                    $req1->execute(array($ver['idService']));
                    $voir_service = $req1->fetch();
                    
                    
                    ?>
                    
                <div class="menu__content"  >
                        <img src="../EspacePrestataire/images/<?=$ver['photo']?>"
                            class=" rounded-circle"><br>
                    <h3 class="menu__name ms-3">Prenom : <?=$ver['prenom']?></h3>
                    <h3 class="menu__name">Nom : <?=$ver['nom']?></h3>
                    <h3 class="menu__name ms-3">Ofre demandee : <?=$voir_service['nom']?></h3>
                    <form method="post" >
                        <input type="hidden"  name="id_relation" value="<?= $ver['numero']?>" />
                        <input type="hidden"  name="id_cible" value="<?= $ver['idService']?>" /><br>
                        <button style="max-width: 70%;" type="submit" name="accepter" class="btn btn-success ms-4	">Accepter</button><br><br>
                        <button type="submit"  name="refuser" class="btn btn-secondary ms-4	">Refuser</button>
                    </form>
                </div>
            <?php }?>
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