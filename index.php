<?php
/*
Il faut que la session commence
Il faut regarder si la variable isConnected est isset(); 
Sinon il faut mettre à 0 

ticket list (open / close)
ticket details (with comments)
login page 
dashboard = ticket details 
 
title des pages
favicons 
nav selected
revoir style du nav

*/




//__________SIMPLE ROUTER FOR OUR PAGES
///session_start();
$explodedUrl = explode('/', $_SERVER['REQUEST_URI']);
/*
echo "<pre>";
var_dump($explodedUrl);
echo "</pre>";
*/
//_____HOME AND DEFAULT

if ($explodedUrl[1] == '') {

    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_login.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_login.php";
    }

    require_once($path);

    //_____TICKETS LIST 
} else if ($explodedUrl[1] == 'dashboard') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_dashboard.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_dashboard.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'tickets') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_ticketsList.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_ticketsList.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'ticket_creation') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_ticketCreation.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_ticketCreation.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'tenants') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_tenantsList.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_tenantsList.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'tenant_creation') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_tenantCreation.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_tenantCreation.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'accounts') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_accountsList.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_accountsList.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'account_creation') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_accountCreation.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_accountCreation.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'logout') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_logout.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_logout.php";
    }

    require_once($path);
} else {
    echo "404 error page";
}
