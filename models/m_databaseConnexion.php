<?php

class connexionPDO
{
    private $servername  = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "u206479934_gestiontickets";

    public function makeConnexion()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $conn;
        } catch (PDOException $e) {
            $conn->rollback();
            $errorToDisplay = "Error " . $e->getMessage();
            //echo $errorToDisplay;
        };
    }
}



$DB = new connexionPDO;

$db = $DB->makeConnexion();

$q = $db->prepare("SELECT COUNT(ticket_id) FROM tickets WHERE ticket_isActive=1");
$q->execute();
$data = $q->fetch(PDO::FETCH_ASSOC);

var_dump($data);
