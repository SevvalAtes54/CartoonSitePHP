<?php
    // Database connection
    $host = "localhost";
    $username = "root";
    $password = ""; 
    $database = "db_for_cartoon"; 

    $conn = mysqli_connect($host, $username, $password, $database);


    // Check the connectio
    if(!$conn)
    {
        header("Location:../errors/db.php");
        error_reporting(E_ALL); 
        ini_set('display_errors', 1);
        die("Connection failed: " . mysqli_connect_error());
       
    }
    else{
     //   echo "Database Connected.!......";
    
    }


    
?>