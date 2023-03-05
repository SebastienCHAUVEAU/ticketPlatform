<?php

//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_login.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_login.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
/*
echo "<pre>";
var_dump($explodedUrl[1] == '');
var_dump(isset($_SESSION["idUser"]));
var_dump(session_id());
echo "</pre>";*/


$errorConnexionMessage = "";

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $connexionCheck = checkConnexion($username, $password);

    if($connexionCheck == false){
        $_SESSION["connecter"] = "no";
        $errorConnexionMessage = '<p class="errorMessage">Identifiants inconnus veuillez essayer de nouveau.</p>';
    }else{
        $_SESSION["connecter"] = "yes";
        $_SESSION["idUser"] = $connexionCheck["user_id"];
        header("location:dashboard");
    }
}







//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_login.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_login.php";
}

require_once($path);
