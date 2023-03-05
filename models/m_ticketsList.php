<?php
function getOpenedTicketInfos(){
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT ticket_id, ticket_title, u.user_firstname AS firstname, u.user_lastname AS lastname, tn.tenant_name AS tenant, c.category_name AS category, ticket_openDate, ticket_updateDate FROM tickets AS t INNER JOIN users AS u ON u.user_id = t.ticket_author INNER JOIN tenants as tn ON tn.tenant_id = t.ticket_tenant INNER JOIN categories AS c ON c.category_id = t.ticket_category WHERE t.ticket_isActive = 1;");
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

function getClosedTicketInfos(){
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $stmt = $conn->prepare("SELECT ticket_id, ticket_title, u.user_firstname AS firstname, u.user_lastname AS lastname, tn.tenant_name AS tenant, c.category_name AS category, ticket_openDate, ticket_updateDate FROM tickets AS t INNER JOIN users AS u ON u.user_id = t.ticket_author INNER JOIN tenants as tn ON tn.tenant_id = t.ticket_tenant INNER JOIN categories AS c ON c.category_id = t.ticket_category WHERE t.ticket_isActive = 0;");
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