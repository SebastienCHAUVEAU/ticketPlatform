<?php

//__________CALL THE MODEL
if(DIRECTORY_SEPARATOR === '/'){
    $path = dirname(dirname(__FILE__)) . "/models/m_login.php";
}else{
    $path = dirname(dirname(__FILE__)). "\\models\\m_login.php";
}

require_once($path);

//____________________CONTROLLER PART
session_start();



//__________CALL THE VIEW
if(DIRECTORY_SEPARATOR === '/'){
    $path = dirname(dirname(__FILE__)) . "/views/v_login.php";
}else{
    $path = dirname(dirname(__FILE__)). "\\views\\v_login.php";
}

require_once($path);