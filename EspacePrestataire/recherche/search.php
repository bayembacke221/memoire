
<?php
session_start();
if (isset($_SESSION['username'])) {

include("../../ConnexionDB/connexionDB.php");
if (isset($_POST['key'])) {
    $key = "%{$_POST['key']}%";

    $sql = "SELECT * FROM service WHERE nom LIKE ?";
    $req = $BDD->prepare($sql);
    $req->execute([$key]);
    if($req->rowCount() > 0){ 
        $services = $req->fetchAll();
        
        foreach ($services as $service) {
            $idservice= $service['idService'];
            $sql2="SELECT * FROM photo WHERE idService = ?";
            $req2 = $BDD->prepare($sql);
            $req2->execute([$idservice]);
            $nomPhotos=$req2->fetchAll();

            
           ?>
                            <!-- 2-->
                            <li class="list-group-item">
                                <div class="d-flex
                                            align-items-center">
                                    <?php
                                    foreach ($nomPhotos as $nomPhoto){
                                    ?>
                                    <img style="max-width:30%" src="../EspaceAdmin/uploadImage/<?=$nomPhoto['nomPhoto']?>"
                                        class="card-img  rounded-circle"><?php }?>
                                    <h3 class="fs-xs m-2">
                                    <?=$service['nom']?>
                                    </h3>
                                        <a href="voir_offre.php?infoId=<?=$service['idService']?>" ><button type="submit" style="display:flex; justify-content: center; align-items: center; max-width:100px" name="user-seeing" class="btn btn-primary">Voir offre</button></a>
                                </div>
	                        </li>
 
            <?php
       
        }
        ?>
<?php
    }else {
        ?>
            <div class="alert alert-info 
                        text-center">
                <i class="fa fa-user-times d-block fs-big"></i>
                Le service "<?=htmlspecialchars($_POST['key'])?>"
                n'existe pas.
            </div>
        <?php
    }
}

?>
<script >
    
    var affiche = document.querySelectorAll("#affiche");
   for(var i=0;i<affiche.length;i++){
        affiche[i].addEventListener("mouseover",function (){
            this.style.backgroundColor="#048654";
            this.style.borderRadius=20+"px";
        })
        affiche[i].addEventListener("mouseout",function (){
            this.style.backgroundColor="white";
        })
   }
</script>
<?php
}