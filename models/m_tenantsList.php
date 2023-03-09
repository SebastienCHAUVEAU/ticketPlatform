<?php
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);


function getAllTenantNames()
{
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT tenant_name FROM tenants;");
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}

function insertNewTenant($name)
{
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("INSERT INTO tenants (tenant_name) VALUES (:name)");
        $stmt->execute(["name" => $name]);

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
