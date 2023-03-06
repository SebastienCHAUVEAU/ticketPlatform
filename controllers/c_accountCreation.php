<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_accountCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_accountCreation.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Création de compte";

$isActiveDashboard = '';
$isActiveTickets = '';
$isActiveSocieties = '';
$isActiveAccounts = 'class="active"';

$userCreation_allTenants = getAllTenants();

//_____ADD NEW USER
if(isset($_POST["userfirstname"])){
    $user_firstname = htmlentities($_POST["userfirstname"]);
    $user_lastname = htmlentities($_POST["userlastname"]);
    $user_email = htmlentities($_POST["useremail"]);
    $user_phone = htmlentities($_POST["userphone"]);
    $user_password = htmlentities($_POST["userpassword"]);
    $user_admin = htmlentities($_POST["useradmin"]);
    $user_society = htmlentities($_POST["usersociety"]);

    $user_password = password_hash($user_password, PASSWORD_DEFAULT);

    $insertNewuser = insertNewAccount($user_firstname, $user_lastname, $user_email, $user_phone, $user_password, $user_admin, $user_society);

    header("location:accounts");
}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_accountCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_accountCreation.php";
}

require_once($path);
