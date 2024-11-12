<?php

    $database= new mysqli("localhost","root","","guidance_database");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>