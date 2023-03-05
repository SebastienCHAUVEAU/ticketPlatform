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
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$allTicketDetails = getAllTicketDetails($idTicket);
if ($allTicketDetails === false) {
    echo "404 error page";
    exit();
}

$allTicketComments =  getAllTicketComments($idTicket);
var_dump($allTicketComments);
if ($allTicketComments === false) {
    $ticketCommentsToDisplay = "";
} else {
    $ticketCommentsToDisplay = "";
    foreach ($allTicketComments as $comment) {
        $ticketCommentsToDisplay =  $ticketCommentsToDisplay . "<p>" . date('d-m-Y à H:i',strtotime($comment["comment_date"])) . " : " . $comment['comment_content'];
    }
    
}
echo "<pre>";
var_dump($allTicketDetails);
echo "</pre>";

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_ticketDetails.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_ticketDetails.php";
}

require_once($path);
