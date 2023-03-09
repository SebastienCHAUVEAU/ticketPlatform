<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_accountModification.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_accountModification.php";
}

require_once($path);

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

$titlePage = "Modification d'un compte";

$isActiveDashboard = '';
$isActiveTickets = '';
$isActiveSocieties = '';
$isActiveAccounts = 'class="active"';

//_____CHECK IF POST DATA IS OK
if (isset($_POST["id"])) {
    $userUpate_userId = htmlentities($_POST["id"]);

    $infosUser = getUserModifAllInfos($_POST["id"]);
    if ($infosUser === false) {
        header("location:error");
        exit();
    }
}

$userCreation_allTenants = getAllTenants();

$errorMessageUpdateAccount = "";
if (isset($_POST['userfirstname'])) {
    $user_firstname = htmlentities($_POST["userfirstname"]);
    $user_lastname = htmlentities($_POST["userlastname"]);
    $user_email = htmlentities($_POST["useremail"]);
    $user_phone = htmlentities($_POST["userphone"]);
    $user_password = htmlentities($_POST["userpassword"]);
    $user_admin = htmlentities($_POST["useradmin"]);
    $user_society = htmlentities($_POST["usersociety"]);
    $user_key = htmlentities($_POST["key"]);

    if(empty($user_firstname)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ prénom.</p>';
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $user_firstname)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Le prénom ne peut contenir que des lettres.</p>';
    }

    if (empty($user_lastname)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ nom.</p>';
    }

    if (!preg_match("/^[a-zA-Z-' ]*$/", $user_lastname)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Le nom ne peut contenir que des lettres.</p>';
    }

    if (empty($user_email)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ email.</p>';
    }

    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Format de l\'email incorrect.</p>';
    }

    if (empty($user_phone)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ téléphone.</p>';
    }

    if (empty($user_admin)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ administrateur.</p>';
    }

    if ($user_admin !== "1" && $user_admin !== "0") {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ administrateur.</p>';
    }

    if (empty($user_society)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez renseigner le champ société.</p>';
    }

    if (empty($user_key)) {
        $errorMessageUpdateAccount .= '<p class="errorMessage">Veuillez modifier votre saisie.</p>';
    }



    if ($errorMessageUpdateAccount === "") {
        
        if ($user_password === "") {
            $updateUser = setUpdateAccountWithoutPassword($user_firstname, $user_lastname, $user_email, $user_phone, $user_admin, $user_society, $user_key);
            header("location:accounts");
        } else {
            $user_password = password_hash($user_password, PASSWORD_DEFAULT);
            $updateUserWithPassword = setUpdateAccountWithPassword($user_firstname, $user_lastname, $user_email, $user_phone, $user_admin, $user_society, $user_key, $user_password);
            header("location:accounts");
        }
    }
}



//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_accountModification.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_accountModification.php";
}

require_once($path);
