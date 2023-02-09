<?php 

//__________SIMPLE ROUTER FOR OUR PAGES
$explodedUrl = explode('/',$_SERVER['REQUEST_URI']);
/*
echo "<pre>";
var_dump($explodedUrl);
echo "</pre>";
*/
//_____HOME AND DEFAULT
if($explodedUrl[1] == ''){
    
    if(DIRECTORY_SEPARATOR === '/'){
        $path = dirname(__FILE__) . "/controllers/c_login.php";
    }else{
        $path = dirname(__FILE__) . "\\controllers\\c_login.php";
    }
    
    require_once($path);

//_____TICKET DETAILS
}else{
    echo "404 error page";
}