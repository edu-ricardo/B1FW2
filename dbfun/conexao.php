<?php
    // A simple PHP script demonstrating how to connect to MySQL.
    // Press the 'Run' button on the top to start the web server,
    // then click the URL that is emitted to the Output tab of the console.

    $servername = '127.0.0.1';
    $username = 'root';
    $password = "";
    $database = "b1fw2";
    $dbport = 3306;

    // Create connection
    $con = mysqli_connect($servername, $username, $password, $database);
    
    if (mysqli_connect_errno()) {
        echo "Erro de Conexão a Base de Dados. ".mysqli_connect_error();
    }
    

     
    //echo "Connected successfully (".$db->host_info.") com o usuario getenv('C9_USER')";
?>