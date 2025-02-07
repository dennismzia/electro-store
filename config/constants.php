<?php 
    //start a session
    session_start();
    //constant to hold web address homepage
    define('SITEURL', 'http://localhost/electro-store/');
    
    //define constant variables for server connection
    // define('HOST', 'localhost');
    define('DB_SERVER', 'db'); 
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'db_electro-store');

    //Server connection
    // changed HOST to DB_SERVER below works well with docker
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME) or die("Connection failed".mysqli_connect_error());  
?>