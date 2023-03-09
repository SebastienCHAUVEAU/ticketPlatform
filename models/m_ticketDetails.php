<?php
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);

function getAllTicketDetails($ticketID){

    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT ticket_id, ticket_isActive, ticket_title, ticket_content, ticket_author, ticket_tenant, ticket_category,ticket_openDate, ticket_updateDate, c.tenant_name AS tenantname, u.user_firstname AS firstname, u.user_lastname AS lastname FROM tickets AS t INNER JOIN tenants AS c ON c.tenant_id = t.ticket_tenant INNER JOIN users AS u ON u.user_id = t.ticket_author WHERE ticket_id=:idTicket");
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
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT comment_id, comment_ticket_id, comment_author_id, comment_content, comment_date, u.user_firstname AS firstname, u.user_lastname AS lastname FROM ticket_comments AS t INNER JOIN users AS u ON u.user_id =  t.comment_author_id WHERE comment_ticket_id=:idTicket ORDER BY comment_date DESC");
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

function getAllCategories(){
    $conn = pdoConnexion();

    try {


        $stmt = $conn->prepare("SELECT * FROM categories;");
        $stmt->execute();

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

function setUpdateTicket($isOpen, $category,$ticketID)
{
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("UPDATE tickets SET ticket_isActive = :isActive, ticket_category = :category WHERE ticket_id = :ticketID");
        $stmt->execute(["isActive" => $isOpen, "category" => $category, "ticketID" => $ticketID]);

        return true;

    } catch (PDOException $e) {
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}


function insertNewTicketComment($ticketId, $authorId, $commentContent)
{

    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("INSERT INTO ticket_comments (comment_ticket_id,comment_author_id,comment_content) VALUES (:ticket,:author,:content)");
        $stmt->execute(["ticket" => $ticketId, "author" => $authorId, "content" => $commentContent]);

        $insertedIdToReturn = $conn->lastInsertId();


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

function deleteTicket($idTicket)
{
    $conn = pdoConnexion();

    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("DELETE FROM tickets WHERE ticket_id=:id");
        $stmt->execute(["id" => $idTicket]);

        $conn->commit();
        return true;

    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}

function deleteTicketComments($idTicket)
{
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("DELETE FROM ticket_comments WHERE comment_ticket_id=:id");
        $stmt->execute(["id" => $idTicket]);

        return true;
    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}