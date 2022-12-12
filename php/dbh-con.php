<?php
    $host = "localhost";
    $uername = "root";
    $password = "";
<<<<<<< HEAD
    $dbname = "products";
=======
    $dbname = "techrev";
>>>>>>> Demo2

    $conn = mysqli_connect($host,$uername,$password,$dbname);

    if(!$conn)
    {
        die("Connection failed: ".msqli_connect_error());
    }