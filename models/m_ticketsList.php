<?php
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);



function getOpenedTicketInfosObject()
{
    $pdoCo = new PdoConnexion;
    $conn = $pdoCo->connexion();

    try {

        $stmt = $conn->prepare("SELECT ticket_id, 
                                    ticket_title, 
                                    u.user_firstname AS firstname, 
                                    u.user_lastname AS lastname, 
                                    tn.tenant_name AS tenant, 
                                    c.category_name AS category, 
                                    ticket_openDate, ticket_updateDate 
                                FROM tickets AS t 
                                INNER JOIN users AS u ON u.user_id = t.ticket_author 
                                INNER JOIN tenants as tn ON tn.tenant_id = t.ticket_tenant 
                                INNER JOIN categories AS c ON c.category_id = t.ticket_category 
                                WHERE t.ticket_isActive = 1;");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (PDOException $e) {
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}


function getClosedTicketInfos()
{

    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT ticket_id, ticket_title, u.user_firstname AS firstname, u.user_lastname AS lastname, tn.tenant_name AS tenant, c.category_name AS category, ticket_openDate, ticket_updateDate FROM tickets AS t INNER JOIN users AS u ON u.user_id = t.ticket_author INNER JOIN tenants as tn ON tn.tenant_id = t.ticket_tenant INNER JOIN categories AS c ON c.category_id = t.ticket_category WHERE t.ticket_isActive = 0;");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $data;
    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}
