<?php 
//__________CALL THE MODEL PDO CONNEXION
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_databaseConnexion.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_databaseConnexion.php";
}
require_once($path);


function checkConnexion($usernameUser){
    $conn = pdoConnexion();

    try {

        $stmt = $conn->prepare("SELECT user_id, user_password FROM users WHERE user_email=:usernameUser");
        $stmt->execute(['usernameUser' => $usernameUser]);

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