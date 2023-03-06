<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_accountCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_accountCreation.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Création de compte";

$isActiveDashboard = '';
$isActiveTickets = '';
$isActiveSocieties = '';
$isActiveAccounts = 'class="active"';


//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_accountCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_accountCreation.php";
}

require_once($path);
