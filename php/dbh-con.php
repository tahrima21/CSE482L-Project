<?php
    $host = "localhost";
    $uername = "techrevUser";
    $password = "Z*RQ9fL]s6dss58w";
    $dbname = "techrevuser";

    $conn = mysqli_connect($host,$uername,$password,$dbname);

    if(!$conn)
    {
        die("Connection failed: ".msqli_connect_error());
    }