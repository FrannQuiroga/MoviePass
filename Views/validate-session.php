<?php
    if(!isset($_SESSION["loggedUser"]))
    header ("location:../User/ShowLoginView");
?>