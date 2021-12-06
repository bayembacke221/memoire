<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
require_once('function.php');
if (isset($_SESSION['numero'])) {
    $sql = "SELECT * FROM service";
    $req = $BDD->prepare($sql);
    $req->execute();
    $rows=$req->fetchAll();
    if (isset($_POST['envoyer'])) {
        if (isset($_POST['nom']) && isset($_POST['profession']) && isset($_POST['description']) ) {
           
            
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

    $query = $BDD->prepare("SELECT * FROM offre WHERE idPrestataire=?");
    $query->execute([$_SESSION['numero']]);
    $verification_offre = $query->fetchAll();
    if(!empty($_POST)){
        extract($_POST);
        $valid = (boolean)true;
        if (isset($_POST['supprimer'])) {
            $idOffre =(int)$idOffre;
            $idPrestataire = (int)$idPrestataire;
            if($idPrestataire){
                $supprimerPhoto= $BDD->prepare("DELETE FROM image where idOffre=?");
                $supprimerPhoto->execute(array($idOffre));
                $req = $BDD->prepare("DELETE  FROM offre WHERE idPrestataire=? AND idOffre=? ");
                $req->execute(array($idPrestataire, $idOffre));
                header('Location: favoris.php');
                exit();
            }
           
        }

        if (isset($_POST['edition'])) {
            $idOffres =(int)$idOffres;
            $idPrestataires = (int)$idPrestataires;
            if(isset($_POST['descriptions'])){
                $description = $_POST['descriptions'];
                $req = $BDD->prepare("UPDATE offre SET description=?   WHERE  idOffre=?");
                $req->execute(array($description,$idOffres));
                header('Location: favoris.php');
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
    <div class="modal fade" id="ajouter" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" action="" enctype="multipart/form-data">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Fiche d'ajout d'offre</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <h6 class="heading-small text-muted mb-4">Libelle</h6>
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
   
    <br><br><br>
    <button style="float:right;margin-right: 15%;margin-top:1%;" type="submit" 
    data-bs-toggle="modal" data-bs-target="#ajouter"
      name="ajouter" class="btn btn-success"><i class='bx bxs-add-to-queue'></i>Ajouter offre</button>
    <span style="margin-left:2.5%;font-size: 200%;" class="section-subtitles">Services proposés</span>
   <section style="margin-top: -10%;margin-left:5%;" class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
            <?php
        foreach ($verification_offre as $offre) {
    ?>
            <div class="menu__content"  >
                <h3 style="color: #069C54;" class="menu__name"><?= $offre['nomOffre']?></h3><br>
                <h3 style="color: #393939;" class="menu__name"><?= $offre['description']?></h3><br>
                <div><br>
                    <form method="post" action="">
                        <input  type="hidden" name="idOffre" value="<?= $offre['idOffre']?>">
                        <input type="hidden" name="idPrestataire" value="<?= $offre['idPrestataire']?>">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#valider" 
                        data-bs-whatever="<?=$offre['description']?>" data-whatever="<?= $offre['idOffre']?>"
                         class="btn btn-primary" name="editer"><i class='bx bxs-edit' id="offre" ></i></button>
                        <button type="submit" class="btn btn-danger ms-5" name="supprimer"><i class='bx bxs-comment-x' ></i></button>
                    </form>
                </div>
               </div>
               <div class="modal fade" id="valider" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title"><?=$offre['nomOffre']?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                                <input type="hidden" name="idOffres" >
                                                <textarea cols="50" class="form-control" rows="4" name="descriptions"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            <button type="submit" name="edition" class="btn btn-primary">Editer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
              <?php

 }
?>
            </div>
   </section>
   




            <?php
			    require_once('../../Footer/footer.php');
		    ?>
		
		<!--========== SCROLL REVEAL ==========-->
		<script src="../../assets/dist/scrollreveal.js"></script>

        <!--========== BOOTSTRAP JS ==========-->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== LIGHTSLIDER JS ==========-->
    <script src="../../assets/js/lightslider.js"></script>

        <!--========== JQUERY ==========-->
     <script src="../../assets/jquery/jquery-3.6.0.min.js"></script>
        
      <!--========== SWEET ALERT JS ==========-->
      <script src="../../assets/js/sweetalert2.min.js"></script>

		<!--========== MAIN JS ==========-->
		<script src="../../assets/js/main.js"></script>
        <script>
        var offre = document.querySelector('i #offre');
        var exampleModal = document.getElementById('valider')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var idOffre = button.getAttribute('data-whatever')
        var modalBodyInput = exampleModal.querySelector('.modal-body textarea')
        var modalBodyInputs = exampleModal.querySelector('.modal-body input')
        modalBodyInput.innerHTML = recipient
        modalBodyInputs.value=idOffre
        console.log(idOffre)
    })
    </script>
</body>
</html>

<?php
  }else{
  	header("Location: ../index.php");
   	exit;
  }
 ?>