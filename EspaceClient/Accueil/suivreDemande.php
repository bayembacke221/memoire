<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
require_once('function.php');
if (isset($_SESSION['numero'])) {
    $query =$BDD->prepare("SELECT DISTINCT d.*,p.*,o.idPrestataire,o.idService FROM  demande d 
    LEFT JOIN personne p ON (p.numero = d.idPrestataire) LEFT JOIN offre o ON (o.idPrestataire=p.numero)
 where d.idClient=? ");
    $query->execute(array($_SESSION['numero']));
    $stmts = $query->fetchAll();
   
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

       <!--========== CSS ==========-->
       <link rel="stylesheet" href="style.css?t=<?php echo time(); ?>">
    
       <title>Kaay Deefar</title>
       <link rel="icon" type="image/png" sizes="20x20" href="../../Images/job-5359923_640.png">
    
       <!-- STYLE CSS -->
       <link rel="stylesheet" href="../css/style.css?t=<?php echo time(); ?>">
</head>
<body>
       <!--========== HEADER ==========-->
 <header class="l-header" id="header">
        <nav class="nav bd-container">
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                <li class="nav__item"><a href="../accueil.php" class=" nav__link active-link"><i class="bx bxs-home"></i> Accueil</a></li>
                    <li class="nav__item"><a href="messagerie.php" class="nav__link "><i class="bx bxs-message-alt-detail"></i> Boite Messagerie</a></li>
                    <li class="nav__item"><a href="../faireDemande.php" class="nav__link">Faire une demande</a></li>
                    <li class="nav__item"><a href="suivreDemande.php" class="nav__link">Suivis des demandes</a></li>
                    <li class="nav__item"><a href="favoris.php" class="nav__link">Mes favoris</a></li>
                    <li class="nav__item"><a href="../logout.php" class="nav__link">Se deconnecter</a></li>
                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
   

    
    <section class="menu section bd-container" id="menu" >  
      
            <div class="menu__container bd-grid">
            <?php
        foreach ($stmts as $stmt){
                 if (isset($_POST['note'])) {
                    if ( isset($_POST['comment'])  && isset($_POST['note']) ){
                        $note = $_POST['note'];
                        $comment = $_POST['comment'];
                        $prestataire = $stmt['idPrestataire'];
                        $query = $BDD->prepare("INSERT INTO notes (idClient,idPrestataire,contenu,note) VALUES (?, ?, ?, ?)");
                        $query->execute(array($_SESSION['numero'],$prestataire,$comment,$note));
                    }
                }
                $select= $BDD->prepare("SELECT * FROM notes where idClient=?");
                $select->execute(array($_SESSION['numero']));
                $notes = $select->rowCount();
        ?>
                <?php
                if (isset($stmt['etat'])) {
                    ?>
                    <div class="menu__content"  >
                    <img   src="../../EspacePrestataire/images/<?=$stmt['photo']?>" class="rounded-circle"><br>
                    <h3 style="color: #069C54;" class="menu__name m-sm-3"><?= $stmt['prenom']?> <?= $stmt['nom']?></h3><br>
                    <h3 style="color: #393939;" class="menu__name "><?= $stmt['information']?><br><?=$stmt['DateDemande']?></h3><br>
                    
                    <?php
                    if(isset($_SESSION['numero'])){
						?>
                        <form method="post" >
                        <input type="hidden"  name="id_relation" value="<?= $stmt['idPrestataire']?>" />
                        <input type="hidden"  name="id_cible" value="<?= $stmt['idClient']?>" />
                        <input type="hidden"  name="id_cible" value="<?= $stmt['etat']?>" /><br><br>
                        
                        <?php if(isset($stmt['etat']) && $stmt['etat'] == 0) { 
                            echo "<h3 style='color: #069C54;' class='menu__name m-sm-2'>Demande envoyee<i class='bx bx-send'></i></h3><br>";
                        }elseif(isset($stmt['etat']) && $stmt['etat']==1) { 
                            echo "<h3 style='color: #069C54;' class='menu__name m-sm-2'>Demande acceptee<i class='bx bx-check'></i></h3><br>";
                        }elseif(isset($stmt['etat']) && $stmt['etat']==2) { 
                            echo "<h3 style='color: #069C54;' class='menu__name m-sm-2'>Travail en cours<i class='bx bx-loader'></i></h3><br>";
                        }elseif(isset($stmt['etat']) && $stmt['etat']==3) { 
                            if( $notes==0){ 
                            ?>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#valider"  name="note" class="btn btn-info btn-lg ms-2	">Noter prestataire</button>
                            <?php
                            }if( $notes==1) {
                                echo "<h4 style='color:red;margin-left:10%;'>Archive<i class='bx bxs-notepad' ></i></h4>";
                             }
                        }
                        ?>
                    </form>
                    <?php
                         }
                    ?>
                </div>
                <?php
                 }
                }
                ?>
               
            </div>
        
    </section>
    <div class="modal fade" id="valider" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Note de <?=$stmt['prenom']?>  <?=$stmt['nom']?></h5> 
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <h6 class="heading-small text-muted mb-4">Note</h6>
                        <div class="stars">
                            <i class="bx bxs-star" data-value="1"></i><i class="bx bxs-star" data-value="2"></i><i class="bx bxs-star" data-value="3"></i><i class="bx bxs-star" data-value="4"></i><i class="bx bxs-star" data-value="5"></i>
                        </div><br>
                        <h6 class="heading-small text-muted mb-4">Commentaire</h6>
                        <div class="form-group focused">
                            <div  class="form-group focused">
                                <label for="commentaire"></label>
                                <textarea name="comment" id="commentaire" class="form-control form-control-alternative" placeholder="Commentaire ..."></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="note" id="note" value="0">
                        <button class="btn btn-info btn-lg ms-4	" type="submit">Valider</button>
                                            
                    </div>
                                        
                </div>
            </form>
        </div>
    </div>

    
    <?php
		require_once('../../Footer/footer.php');
	?>
		
	<!--========== SCROLL REVEAL ==========-->
	<script src="../../assets/dist/scrollreveal.js"></script>

	<!--========== SCROLL REVEAL ==========-->
	<script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

    <!--========== BOOTSTRAP JS ==========-->
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>

     <!--========== JQUERY ==========-->
     <script src="../../assets/jquery/jquery-3.6.0.min.js"></script>

      <!--========== LIGHTSLIDER JS ==========-->
      <script src="../../assets/js/lightslider.js"></script>


	<!--========== MAIN JS ==========-->
	<script src="../../assets/js/main.js"></script>
    <script>
        window.onload = () => {
    // On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".bxs-star");
    
    // On va chercher l'input
    const note = document.querySelector("#note");

    // On boucle sur les étoiles pour le ajouter des écouteurs d'évènements
    for(star of stars){
        // On écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "#e9f006";
            this.classList.add("las");
            this.classList.remove("bx");
            // L'élément précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;

            while(previousStar){
                // On passe l'étoile qui précède en rouge
                previousStar.style.color = "#e9f006";
                previousStar.classList.add("bx");
                previousStar.classList.remove("las");
                // On récupère l'étoile qui la précède
                previousStar = previousStar.previousElementSibling;
            }
        });

        // On écoute le clic
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });

        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        });
    }

    /**
     * Reset des étoiles en vérifiant la note dans l'input caché
     * @param {number} note 
     */
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color = "black";
                star.classList.add("bx");
                star.classList.remove("las");
            }else{
                star.style.color = "#e9f006";
                star.classList.add("bx");
                star.classList.remove("las");
            }
        }
    }
}
    </script>
    
</body>
</html>
<?php
}else{
    header("Location: ../../index.php");
     exit;
}

?>