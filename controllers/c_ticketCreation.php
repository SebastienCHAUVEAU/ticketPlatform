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

//____BASIC INFORMATIONS PAGE DISPLAY
$titlePage = "Création de ticket";
$isActiveDashboard = '';
$isActiveTickets = 'class="active"';
$isActiveSocieties = '';
$isActiveAccounts = '';

//_____QUERY INSERT NEW TICKET
$errorMessage = "";

if(isset($_POST['object']) && isset($_POST['description'])){
    $titleTicket = htmlentities($_POST['object']);
    $descriptionTicket = htmlentities($_POST['description']);

    if(empty($titleTicket)){
        $errorMessage .= '<p class="errorMessage">Veuillez renseigner le champ objet.</p>';
    }
    
    if(empty($descriptionTicket)){
        $errorMessage .= '<p class="errorMessage">Veuillez renseigner le champ description.</p>';
    }

    if($errorMessage === ""){
        $userId = $_SESSION["idUser"];
        $userSociety = getUserTenant($_SESSION["idUser"])["user_society"];
    
        $insertNewTicket = insertNewTicket($titleTicket,$descriptionTicket,$userId,$userSociety);
    
        header("location:tickets");
    }

}



//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketCreation.php";
}

require_once($path);
