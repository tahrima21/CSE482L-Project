<?php
    $host = "localhost";
    $uername = "root";
    $password = "";
    $dbname = "products";

    $conn = mysqli_connect($host,$uername,$password,$dbname);

    if(!$conn)
    {
        die("Connection failed: ".msqli_connect_error());
    }