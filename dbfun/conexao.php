<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "b1fw2";
    $dbport = 3306;

    // Create connection
    $con = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 
    //echo "Connected successfully (".$db->host_info.") com o usuario getenv('C9_USER')";
?>