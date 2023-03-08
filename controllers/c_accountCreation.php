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
if (!isset($_SESSION["connecter"])) {
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
$errorMessageUserCreation = "";

if (isset($_POST["userfirstname"])) {
    $user_firstname = htmlentities($_POST["userfirstname"]);
    $user_lastname = htmlentities($_POST["userlastname"]);
    $user_email = htmlentities($_POST["useremail"]);
    $user_phone = htmlentities($_POST["userphone"]);
    $user_password = htmlentities($_POST["userpassword"]);
    $user_admin = htmlentities($_POST["useradmin"]);
    $user_society = htmlentities($_POST["usersociety"]);

    if (empty($user_firstname)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ prénom.</p>';
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $user_firstname)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Le prénom ne peut contenir que des lettres.</p>';
    }

    if (empty($user_lastname)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ nom.</p>';
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $user_lastname)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Le nom ne peut contenir que des lettres.</p>';
    }

    if (empty($user_email)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ email.</p>';
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Format de l\'email incorrect.</p>';
    }

    if (empty($user_phone)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ téléphone.</p>';
    }

    if (empty($user_password)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ mot de passe.</p>';
    }

    if (empty($user_admin)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ administrateur.</p>';
    }

    if ($user_admin !== "1" && $user_admin !== "0") {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ administrateur.</p>';
    }

    if (empty($user_society)) {
        $errorMessageUserCreation .= '<p class="errorMessage">Veuillez renseigner le champ société.</p>';
    }

    if ($errorMessageUserCreation === "") {
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $insertNewuser = insertNewAccount($user_firstname, $user_lastname, $user_email, $user_phone, $user_password, $user_admin, $user_society);
        header("location:accounts");
    }
}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_accountCreation.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_accountCreation.php";
}

require_once($path);
