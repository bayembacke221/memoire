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
    <!--========== BOX ICONS ==========-->
	<link href='../assets/boxicons-2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
    <!--========== CSS ==========-->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" rel='stylesheet' >
    <link rel="stylesheet" href="../assets/cerulean/theme/bootstrap.min.css" rel='stylesheet' >
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

    <!--Formulaire d'ajout de Services-->
    <div class="container col-md-6 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">Formulaire d'ajout de service</div>
            <div class="panel-body" id="form">
            <form method="post" action="traitementService.php" enctype="multipart/form-data" >
                
                <p><label class="control-label" for="nom">Nom</label></p>
                <p><input type="text" name="nom" id="nom" class="form-control" /></p><br><br>

                <p><label class="control-label" for="domaine">Domaine</label></p>
                <p><input type="text" name="domaine" class="form-control" /></p><br><br>

                <p><label class="control-label" for="description">Description</label></p>
                <p><textarea name="description" rows="9" cols="50"></textarea></p><br><br>

                <p><label class="control-label" for="photo">Photo</label></p>
                <p><input type="file" name="photo" class="form-control" /></p><br><br>

                <button type="submit" class="btn btn-success"name="valide" value="Envoyer">Envoyer</button</p><br><br>
                <button class="btn btn-danger" name="Annuler"type="reset" value="invalider">Annuler</buttonp><br><br>

            </form>
           
            </div>
            
            

        </div>
    </div>
    

</body>
</html>
<?php
}else{
    header("Location: connexionAdmin.php");
}