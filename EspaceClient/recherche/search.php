
<?php
session_start();
include("../../ConnexionDB/connexionDB.php");
if (isset($_SESSION['email'])){
   
    if (isset($_POST['key'])) {
        
        $key = "%{$_POST['key']}%";
        $sql = "SELECT p.* ,ps.*
        FROM `prestataire` p
        LEFT JOIN personne ps ON (ps.numero =p.numero)
         WHERE nom LIKE ? or prenom LIKE ?";
        $req = $BDD->prepare($sql);
        $req->execute([$key,$key]);
        if($req->rowCount() > 0){ 
            $prestataires = $req->fetchAll();
            foreach ($prestataires as $prestataire) {
                ?>
                            <!-- 2-->
                            <li class="list-group-item">
                                <div class="d-flex
                                            align-items-center">
                                    <img style="max-width:30%" src="../EspacePrestataire/images/<?=$prestataire['photo']?>"
                                        class="card-img  rounded-circle">
                                    <h3 class="fs-xs m-2">
                                        <?=$prestataire['prenom']?> <?=$prestataire['nom']?>
                                    
                                    </h3>
                            </li>
                            <li class="list-group-item">
                                    <h3 class="fs-xs m-2">
                                        <?=$prestataire['profession']?>
                                    
                                    </h3>
                                        <a href="voir_profile.php?infoId=<?=$prestataire['numero']?>" ><button type="submit" style="display:flex; justify-content: center; align-items: center; max-width:100px" name="user-seeing" class="btn btn-primary m-lg-0">Demander un service</button></a>
                                </div>
	                        </li>
 
            <?php
       
            }
        }else {
            ?>
                <div class="alert alert-info 
                            text-center">
                    <i class="fa fa-user-times d-block fs-big"></i>
                    Le prestataire "<?=htmlspecialchars($_POST['key'])?>"
                    n'existe pas.
                </div>
            <?php
        }
    }
}