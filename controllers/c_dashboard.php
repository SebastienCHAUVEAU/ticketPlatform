<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_dashboard.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_dashboard.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Dashboard";

$isActiveDashboard = 'class="active"';
$isActiveTickets = '';
$isActiveSocieties = '';
$isActiveAccounts = '';

$totalCurrentOpenedTickets = getTotalOpenedTickets();
$userIdentity = getNamesConnectedUSer($_SESSION['idUser']);



//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_dashboard.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_dashboard.php";
}

require_once($path);