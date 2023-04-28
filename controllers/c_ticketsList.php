<?php

//__________CALL THE GENERAL FUNCTIONS FILE
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/controllers/c_generalFunctions.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\controllers\\c_generalFunctions.php";
}

require_once($path);

//__________CALL THE MODEL
requirePageOnAllSystem("models","m_ticketsList");

//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Tickets";
$pageDescription = "List of all tickets, opened and closed.";

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
