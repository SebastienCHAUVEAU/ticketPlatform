<?php

function requirePageOnAllSystem($directory,$file){
    if (DIRECTORY_SEPARATOR === '/') {
        $path = dirname(dirname(__FILE__)) . "/$directory/$file.php";
    } else {
        $path = dirname(dirname(__FILE__)) . "\\$directory\\$file.php";
    }
    
    require_once($path);

}