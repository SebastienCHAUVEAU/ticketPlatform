<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_ticketCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_ticketCreation.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$errorConnexionMessage = "";

if(isset($_POST['object']) && isset($_POST['description'])){
    $titleTicket = htmlspecialchars($_POST['object']);
    $descriptionTicket = htmlspecialchars($_POST['description']);
    $userId = $_SESSION["idUser"];
    $userId = getUserTenant($_SESSION["idUser"])["user_society"];

    $insertNewTicket = insertNewTicket($titleTicket,$descriptionTicket,1,1);

    header("location:tickets");

}




//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketCreation.php";
}

require_once($path);
