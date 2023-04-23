<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_tenantsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_tenantsList.php";
}

require_once($path);



//____________________CONTROLLER PART
session_start();
if(!isset($_SESSION["connecter"])){
    header("location:login");
    exit();
}

$titlePage = "Sociétés";

$isActiveDashboard = '';
$isActiveTickets = '';
$isActiveSocieties = 'class="active"';
$isActiveAccounts = '';



$tenantNames = getAllTenantNames();


$displayTenantNames = [];
foreach($tenantNames as $name){
    $displayTenantNames[] =  $name["tenant_name"];
}

$errorMessageNewTenant = "";

if(isset($_POST["tenantName"])){
    if(empty($_POST["tenantName"])){
        $errorMessageNewTenant = '<p class="errorMessage">Veuillez renseigner le champ description.</p>';
    }

    if($errorMessageNewTenant === ""){
        $insetTenant = insertNewTenant(htmlentities($_POST["tenantName"]));
        header("location:tenants");
    }

}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_tenantsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_tenantsList.php";
}

require_once($path);
