<?php

class DB{
//MySQL Connection Info:

    private $DB_Server;
    private $DB_Username;
    private $DB_Password;
    private $DB_DBName;

    protected function connect(){
        $this->DB_Server = 'localhost';    						    //MySQL Server 
        $this->DB_Username = 'root'; 								//MySQL User Name 
        $this->DB_Password = '';    			                    //MySQL Password 
        $this->DB_DBName = 'booking';    							//MySQL Database Name 

        $conn = new mysqli($this->DB_Server,$this->DB_Username,$this->DB_Password,$this->DB_DBName) 
        or die("Unable to connect");  

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        return $conn;
    }
}
?>