<?php
    session_start();
    
    include ("ConnexionDB/connexionDB.php");
    include ("Function/domain.php");
    include ("Function/function.php");
    include ("Function/v_register.php");
    include ("Menu/menu.php");
    include ("Footer/footer.php");


    $__Domain 			= new Domain;
    define("URL", $__Domain->domain());
    define("CURRENT_URL",  $__Domain->current_url());
?>