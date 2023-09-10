<?php


    try{
        //host
        define("HOST", "localhost") ;
    
        //dbname
        define('DBNAME', 'Forum');
    
        //user
        define("USER", "root");
    
        //password
        define("PASS","");
    
        $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        /*
        if($conn == true) {
            echo "<h1>Connection Successful</h1>";
        } else {
            echo "error";
        }
        */
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
