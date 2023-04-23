<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_ticketDetails.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_ticketDetails.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if (!isset($_SESSION["connecter"])) {
    header("location:login");
    exit();
}

//_____PAGE AND NAV
$titlePage = "Détails du ticket";

$isActiveDashboard = '';
$isActiveTickets = 'class="active"';
$isActiveSocieties = '';
$isActiveAccounts = '';


//_____DISPLAY
$allTicketDetails = getAllTicketDetails($idTicket);
if ($allTicketDetails === false) {
    echo "404 error page";
    exit();
}


$allTicketComments =  getAllTicketComments($idTicket);

if ($allTicketComments === false) {
    $ticketCommentsToDisplay = "";
} else {
    $ticketCommentsToDisplay = "";
    foreach ($allTicketComments as $comment) {
        $ticketCommentsToDisplay =  $ticketCommentsToDisplay . "<p>" . date('d-m-Y à H:i', strtotime($comment["comment_date"])) . " (" . $comment['firstname'] . ' ' . $comment['lastname'] . ")" .  " : " . $comment['comment_content'];
    }
}

//_____MODIFY TICKET 
//_DISPLAY
$allCategories = getAllCategories();

//_DELETE QUERY 
if (isset($_POST['deleteTicketNumber'])) {
    $idTicketToDelete = htmlentities($_POST['deleteTicketNumber']);

    $deleteTicket = deleteTicket($idTicketToDelete);
    $deleteTicketComments = deleteTicketComments($idTicketToDelete);
    header("location:/tickets", true);
}


//_UPDATE QUERY
if (isset($_POST['ticketStatut'])) {
    $isOpen = htmlentities($_POST['ticketStatut']);
    $categoryTicket = htmlentities($_POST['ticketCategory']);
    $ticketNumber = htmlentities($_POST["ticketNumber"]);

    $updateTicket = setUpdateTicket($isOpen, $categoryTicket, $ticketNumber);

    header("location:$ticketNumber");
}
//_____ADD COMMENT
$errorCommentMessage = "";

if (isset($_POST["comment"])) {
    $newComment = htmlentities($_POST["comment"]);
    $ticketID = htmlentities($_POST["ticketNumber"]);

    if (empty($newComment)) {
        $errorCommentMessage .= '<p class="errorMessage">Veuillez renseigner le champ commentaire.</p>';
    }

    if (empty($ticketID)) {
        $errorCommentMessage .= '<p class="errorMessage">Veuillez renseigner le champ commentaire.</p>';
    }

    if ($errorCommentMessage === "") {
        $addNewComment =  insertNewTicketComment($ticketID, $_SESSION["idUser"], $newComment);
        header("location:$ticketID");
    }
}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketDetails.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketDetails.php";
}

require_once($path);
