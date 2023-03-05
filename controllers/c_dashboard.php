<?php
//__________CALL THE MODEL
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/models/m_dashboard.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\models\\m_dashboard.php";
}

require_once($path);



//____________________CONTROLLER PART
$totalCurrentOpenedTickets = getTotalOpenedTickets();





//__________CALL THE VIEW
if (DIRECTORY_SEPARATOR === '/') {
    $path = dirname(dirname(__FILE__)) . "/views/v_dashboard.php";
} else {
    $path = dirname(dirname(__FILE__)) . "\\views\\v_dashboard.php";
}

require_once($path);