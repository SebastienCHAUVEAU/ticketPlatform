<?php
function getAllTicketDetails($ticketID){
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM tickets WHERE ticket_id=:idTicket");
        $stmt->execute(['idTicket' => $ticketID]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;

    }catch(PDOException $e){
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;

}

function getAllTicketComments($ticketID){
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT * FROM ticket_comments WHERE comment_ticket_id=:idTicket");
        $stmt->execute(['idTicket' => $ticketID]);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;

    }catch(PDOException $e){
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;

}

function insertNewTicketComment($title, $content, $author, $tenant)
{
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("INSERT INTO tickets (ticket_title,ticket_content,ticket_author,ticket_tenant) VALUES (:title,:content,:author,:tenant)");
        $stmt->execute(["title" => $title, "content" => $content, "author" => $author, "tenant" => $tenant]);

        $insertedIdToReturn = $conn->lastInsertId();
        $conn->commit();

        return $insertedIdToReturn;
        return true;
    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}