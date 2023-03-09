<?php
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);


function getAllTenants(){
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("SELECT * FROM tenants;");
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


function insertNewAccount($firstname, $lastname, $email, $phone, $passwordUser, $admin, $society)
{
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("INSERT INTO users (user_firstname,user_lastname,user_email,user_phone_number,user_password,user_isAdmin,user_society) VALUES (:firstname,:lastname,:email,:phone,:passwordUser,:admin,:society)");
        $stmt->execute(["firstname" => $firstname, "lastname" => $lastname, "email" => $email, "phone" => $phone, "passwordUser" => $passwordUser, "admin" => $admin, "society" => $society]);

        $insertedIdToReturn = $conn->lastInsertId();

        return $insertedIdToReturn;
        
    } catch (PDOException $e) {
        $conn->rollback();
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };

    $conn = null;
}