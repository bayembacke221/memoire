<?php
if (isset($_POST['flexRadioDefault'])) {
    $value = $_POST['flexRadioDefault'];
    if ($value =="OUI") {
        header("Location: ../EspaceClient/connexionClient.php");
        exit;
    }else {
        header("Location: ../EspaceClient/Inscriptionclient.php");
    }
}

?>