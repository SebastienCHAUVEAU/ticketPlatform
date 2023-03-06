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
$titlePage = "Détail du ticket";

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




//_UPDATE QUERY
if(isset($_POST['ticketStatut'])){
    $isOpen = $_POST['ticketStatut'];
    $categoryTicket = $_POST['ticketCategory'];
    $ticketNumber = $_POST["ticketNumber"];

    $updateTicket = setUpdateTicket($isOpen, $categoryTicket,$ticketNumber);

    header("location:$ticketNumber");

}
//_____ADD COMMENT

if (isset($_POST["comment"])) {
    $newComment = $_POST["comment"];
    $ticketID = $_POST["ticketNumber"];

    $addNewComment =  insertNewTicketComment($ticketID, $_SESSION["idUser"], $newComment);
    header("location:$ticketID");
}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketDetails.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketDetails.php";
}

require_once($path);
