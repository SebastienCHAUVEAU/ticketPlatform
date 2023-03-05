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

$tenantNames = getAllTenantNames();


$displayTenantNames = [];
foreach($tenantNames as $name){
    $displayTenantNames[] =  $name["tenant_name"];
}

if(isset($_POST["tenantName"])){
    $insetTenant = insertNewTenant(htmlentities($_POST["tenantName"]));
}

//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_tenantsList.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_tenantsList.php";
}

require_once($path);
