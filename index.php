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

insert en deux fois une société 


dashboard : bienvenue untel, vous avez actuellement tant de ticket ouverts (tout si isAdmin)
tickets : modifier mise en forme, ajout commentaire, retour sur tickets?, masquer fermés 
sociétés : double ajout ?? , comment supprimer ou select supprimer, 
Comptes : listing, modifier, créer, supprimer 
logout : voir destruction variables session session_start(); session_destroy(); header("location:login.php");

GESTION DES ERREURS

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
