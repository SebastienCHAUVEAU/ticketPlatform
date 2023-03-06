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
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

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
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

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
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("UPDATE tickets SET ticket_isActive = :isActive, ticket_category = :category WHERE ticket_id = :ticketID");
        $stmt->execute(["isActive" => $isOpen, "category" => $category, "ticketID" => $ticketID]);

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

function insertNewTicketComment($ticketId, $authorId, $commentContent)
{
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("INSERT INTO ticket_comments (comment_ticket_id,comment_author_id,comment_content) VALUES (:ticket,:author,:content)");
        $stmt->execute(["ticket" => $ticketId, "author" => $authorId, "content" => $commentContent]);

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