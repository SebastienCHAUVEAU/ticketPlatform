<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_accountsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_accountsList.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Comptes";
$pageDescription = "List of all the user accounts";

$isActiveDashboard = '';
$isActiveTickets = '';
$isActiveSocieties = '';
$isActiveAccounts = 'class="active"';

$allUsersInformations = getAllUser();


//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_accountsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_accountsList.php";
}

require_once($path);
