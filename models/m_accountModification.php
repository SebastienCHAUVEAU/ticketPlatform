<?php
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);


function getUserModifAllInfos($id){
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :id;");
        $stmt->execute(["id" => $id]);

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

function setUpdateAccountWithoutPassword($firstname, $lastname,$email,$phone,$isAdmin,$society,$id)
{
    $conn = pdoConnexion();

    try {
        $stmt = $conn->prepare("UPDATE users SET user_firstname=:firstname, user_lastname=:lastname, user_email=:email, user_phone_number=:phone, user_isAdmin=:isAdmin, user_society=:society WHERE user_id = :id");
        $stmt->execute(["firstname" => $firstname, "lastname" => $lastname,  "email" => $email, "phone" => $phone, "isAdmin" => $isAdmin, "society" => $society, "id" => $id]);

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

function setUpdateAccountWithPassword($firstname, $lastname,$email,$phone,$isAdmin,$society,$id,$passwordUser)
{
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("UPDATE users SET user_firstname=:firstname, user_lastname=:lastname, user_email=:email, user_phone_number=:phone, user_isAdmin=:isAdmin, user_society=:society, user_password=:userpassword WHERE user_id = :id");
        $stmt->execute(["firstname" => $firstname, "lastname" => $lastname,  "email" => $email, "phone" => $phone, "isAdmin" => $isAdmin, "society" => $society, "userpassword" => $passwordUser, "id" => $id]);

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