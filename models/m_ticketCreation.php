<?php
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);


function insertNewTicket($title, $content, $author, $tenant)
{
    $conn = pdoConnexion();

    try {
        $conn->beginTransaction();
        $stmt = $conn->prepare("INSERT INTO tickets (ticket_title,ticket_content,ticket_author,ticket_tenant) 
                                VALUES (:title,:content,:author,:tenant)");

        $stmt->execute(["title" => $title, "content" => $content, "author" => $author, "tenant" => $tenant]);

        $conn->commit();

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


function getUserTenant($idUser)
{
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT user_society FROM users WHERE user_id = :idUser");
        $stmt->execute(['idUser' => $idUser]);

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;

    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}
