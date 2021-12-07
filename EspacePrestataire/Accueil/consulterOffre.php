<?php
session_start();
require_once('../../ConnexionDB/connexionDB.php');
if (isset($_SESSION['username'])) {
    $session_prestataire = $BDD->prepare("SELECT ps.*,p.* FROM prestataire ps
    LEFT JOIN personne p on (p.numero=ps.numero)
    WHERE username=?");
    $session_prestataire->execute([$_SESSION['username']]);
    $prestataires = $session_prestataire->fetch();
    $prestataire = $prestataires['numero'];

    $sql = "SELECT d.idDemande,d.idPrestataire,d.idClient,d.information,d.etat,ps.*
    FROM demande d
    LEFT JOIN client c ON (d.idClient= c.numero) LEFT JOIN personne ps ON (ps.numero =c.numero)
    WHERE  d.idPrestataire=?";
    $req=$BDD->prepare($sql);
    $req->execute(array($prestataire));
   $voir_profil=$req->fetch();
   if(!empty($_POST)){
       extract($_POST);
       $valid = (boolean)true;
    if(isset($_POST["accepter"])){
        $id_relation=(int)$id_relation;
        
        if($id_relation){ 
            $req = $BDD->prepare("SELECT idDemande FROM demande WHERE idPrestataire=? AND etat=0");
            $req->execute(array($id_relation));
            $verification = $req->fetch();
            if(isset($verification['idPrestataire'])){
                $valid = false;
            }if($valid){
                $req = $BDD->prepare("UPDATE demande SET etat=1   WHERE idPrestataire=? AND idClient=?");
                $req->execute(array($id_relation, $id_cible));
            }
            header('Location: consulterOffre.php');
            exit();

        }

        
    }elseif(isset($_POST["refuser"])){
        //echo "entree 1";
       $id_cible=(int)$id_cible;
        //echo $id_cible;
         $id_relation=(int)$id_relation;
        // echo $id_relation;
         if($id_relation){ 
            $sql = $BDD->prepare("SELECT * from demande where idClient=? AND idPrestataire=?");
            $sql->execute(array( $id_cible,$id_relation));
            $rows=$sql->fetch();
            $row=$rows['idDemande'];
            $supprimerPhoto= $BDD->prepare("DELETE FROM photodemande where idDemande=?");
            $supprimerPhoto->execute(array($row));
        $req = $BDD->prepare("DELETE  FROM demande WHERE idPrestataire=? AND idClient=? ");
        $req->execute(array($id_relation, $id_cible));
        
         }
        header('Location: consulterOffre.php');
        exit();
        //echo '1';

    }elseif(isset($_POST['demarrer'])){
        $id_cible  = (int)$id_cible;
        $id_relation=(int)$id_relation;
        if ($id_relation) {
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

    }elseif(isset($_POST['achever'])){
        $id_cible  = (int)$id_cible;
        $id_relation=(int)$id_relation;
        if ($id_relation) {
            $req = $BDD->prepare("SELECT idDemande FROM demande WHERE idPrestataire=? AND etat=2");
            $req->execute(array($id_relation));
            $verification = $req->fetch();
            if(isset($verification['idPrestataire'])){
                $valid = false;
            }if($valid){
                $req = $BDD->prepare("UPDATE demande SET etat=3   WHERE idPrestataire=? AND idClient=?");
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
    <?php
                
                $idPrestataire = $_SESSION['idPrestataire'];
                $sqloffre=$BDD->prepare("SELECT s.*,o.*
                 from offre o
                 LEFT JOIN service s ON (s.idService=o.idService)
                  where o.idPrestataire=?");
                $sqloffre->execute(array($idPrestataire));
                $verifoffre=$sqloffre->fetch();
                $info = $verifoffre['idService'];
                $sqlEtat=$BDD->prepare("SELECT idOffre,etat FROM offre WHERE (idPrestataire=? AND idService=?) 
                OR (idPrestataire=? AND idService=?)");
                $sqlEtat->execute(array($idPrestataire,$info,$info,$idPrestataire));
                $verifEtat=$sqlEtat->fetch();
    ?>



<section style="margin-top:-5%;margin-left:3%" class="menu section bd-container" id="menu" >  
            <div class="menu__container bd-grid">
            <?php
                    if (isset($voir_profil['etat'])) {
                    
                ?>
                <div style="background-color: #393939;" class="menu__content"  >
                        <img style="border-radius: 10%;" src="../../EspaceClient/images/<?=$voir_profil['photo']?>"
                            ><br>
                    <h3 style="color: #069C54;" class="menu__name ms-2"><br><?=$voir_profil['prenom']?>  <?=$voir_profil['nom']?></h3><br>
                    <?php
			            if(isset($_SESSION['idPrestataire'])){
						?>
                    <form method="post" >
                        <input type="hidden"  name="id_relation" value="<?= $voir_profil['idPrestataire']?>" />
                        <input type="hidden"  name="id_cible" value="<?= $voir_profil['idClient']?>" /><br>
                        <button style="max-width: 70%;" data-bs-toggle="modal" data-bs-target="#valider"  
                        data-bs-whatever="<?=$voir_profil['information']?>"
                        type="button" name="details" class="btn btn-info ms-4	btn-lg">Details</button><br><br>
                        <?php
                            if(isset($voir_profil['etat']) && $voir_profil['etat']==0){
			            ?>
                         <button style="max-width: 70%;" type="submit" name="accepter" class="btn btn-success ms-4	btn-lg">Accepter</button><br><br>
                        <?php
                            }elseif(isset($voir_profil['etat']) && $voir_profil['etat']==1){ 
                        ?>
                        <button type="submit"  name="refuser" class="btn btn-warning btn-lg ms-4	">Refuser</button><br><br>
                       
                        <button type="submit"  name="demarrer" class="btn btn-success btn-lg ms-4	">Demarrer</button>
                        <?php
                        }elseif(isset($voir_profil['etat']) && $voir_profil['etat']==2){
                            echo "<h4 style='color:#069C54;margin-left:10%;'>Demarrage</h4>";
                            ?>
                            <button type="submit"  name="achever" class="btn btn-info btn-lg ms-4	">Terminer</button>
                            <?php
                        }elseif(isset($voir_profil['etat']) && $voir_profil['etat']==3){
                            echo "<h4 style='color:red;margin-left:10%;'>Archive<i class='bx bxs-notepad' ></i></h4>";
                        }
                        ?>
                    </form>
                    <?php
                    }
                    ?>
                </div>
                <?php     
                    }?>
            </div>
     </section> 
     <div class="modal fade" id="valider" tabindex="-1">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                            <h5 class="modal-title"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                        <?php
                                                $query =$BDD->prepare("SELECT * FROM photodemande WHERE idDemande = ? ");
                                                $query->execute([$voir_profil['idDemande']]);
                                                $rows=$query->fetchAll();


                                                foreach ($rows as $row){
                                                    ?>
                                                    <img style="max-width:30%;display:inline-block" src="../../EspaceClient/<?=$row['nomPhoto']?>" alt="<?=$row['idPhotoDemande']?>">
                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
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
        
      <!--========== SWEET ALERT JS ==========-->
      <script src="../../assets/js/sweetalert2.min.js"></script>

		<!--========== MAIN JS ==========-->
		<script src="../../assets/js/main.js"></script>
        <script>
        var exampleModal = document.getElementById('valider')
        exampleModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var modalBodyInput = exampleModal.querySelector('.modal-title')
        modalBodyInput.innerHTML = "motif "+ recipient
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