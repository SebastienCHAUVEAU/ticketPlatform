<?php

class PdoConnexion {
	private $login = 'root';
	private $pass = '';
    private $host = 'localhost';
    private $db = 'u206479934_gestiontickets';
    

	public function connexion(){
		try
		{
	        $bdd = new PDO('mysql:host=' . $this->host . ';dbname='. $this->db, $this->login,$this->pass);  
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $bdd;

		}
		catch (PDOException $e)
		{
            $errorToDisplay = "Error " . $e->getMessage();
            //echo $errorToDisplay;
            return false;
		}
	}
}



function pdoConnexion()
{
    $servername  = "localhost";
    $username = "root";
    $password = "";
    $dbname = "u206479934_gestiontickets";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
        
    } catch (PDOException $e) {
        $errorToDisplay = "Error " . $e->getMessage();
        //echo $errorToDisplay;
        return false;
    };
}

