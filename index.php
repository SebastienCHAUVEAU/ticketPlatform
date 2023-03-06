<?php
/*

tickets : modifier mise en forme, retour sur tickets?, masquer fermés
ticket details : encodage des caractères

Suppression ticket
ROUTAGE DOUBLE ...
ENCODAGE TABLE : commentaires ; catégories
RESPONSIVE

RESOLUTION DE NOM SUR LISTE USER ET IS ADMIN EN OUI OU NON 
PHONE NUMBER EN STRING CAR RETIRE LE ZERO OU TEL
VERIFICATION SI CHAMPS VIDES
GESTION DES ERREURS
MODIF ALL CONNEXIONS PDO BDD TO LOCALHOST
TOAST NOTIFICATION ??

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

if ($explodedUrl[1] == '' || $explodedUrl[1] == 'login') {

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
    if (!isset($explodedUrl[2])) {
        if (DIRECTORY_SEPARATOR === '/') {
            $path = dirname(__FILE__) . "/controllers/c_ticketsList.php";
        } else {
            $path = dirname(__FILE__) . "\\controllers\\c_ticketsList.php";
        }
        require_once($path);
    } else if (isset($explodedUrl[2])) {
        $idTicket = htmlspecialchars($explodedUrl[2]);
        if (DIRECTORY_SEPARATOR === '/') {
            $path = dirname(__FILE__) . "/controllers/c_ticketDetails.php";
        } else {
            $path = dirname(__FILE__) . "\\controllers\\c_ticketDetails.php";
        }
        require_once($path);
    }
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
} else if ($explodedUrl[1] == 'account_modification') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_accountModification.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_accountModification.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'logout') {
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(__FILE__) . "/controllers/c_logout.php";
    } else {
        $path = dirname(__FILE__) . "\\controllers\\c_logout.php";
    }

    require_once($path);
} else if ($explodedUrl[1] == 'error'){
    echo "404 error page";
}else {
    echo "404 error page";
}
