<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_ticketsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_ticketsList.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Liste des tickets";

$isActiveDashboard = '';
$isActiveTickets = 'class="active"';
$isActiveSocieties = '';
$isActiveAccounts = '';

$openedTicketInfos = getOpenedTicketInfosObject();
$closedTicketInfos = getClosedTicketInfos();




//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketsList.php";
}

require_once($path);
