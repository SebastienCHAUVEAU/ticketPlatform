<?php
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);

function getAllUser(){
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT user_id,user_firstname,user_lastname,user_email,user_phone_number,user_password,user_isAdmin,user_society,t.tenant_name AS tenant FROM users AS u INNER JOIN tenants AS t ON t.tenant_id = u.user_society;");
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