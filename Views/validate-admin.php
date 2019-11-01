<?php
    require_once("validate-session.php");
    $loggedUser = $_SESSION["loggedUser"]; 
    if($loggedUser->getIsAdmin() != 1)
    {
        header ("location:../");
    }
?>