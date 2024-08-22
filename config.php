<?php

function connect_db(){

    try{
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "project1";
        $port = 3306;

        $conn = mysqli_connect($host, $username, $password, $database, $port);

        if($conn){
            echo "connection succeeded\n";
            return $conn;
        }else{
            echo "connection failed\n";
            return false;
           
        }

        
    }catch(Exception $e){
        echo "connection failed\n";
        $e->getMessage();
    }
    
}

?>