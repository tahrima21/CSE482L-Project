<?php

    $conn = new mysqli("localhost","techrevUser","Z*RQ9fL]s6dss58w","techrevuser");
    if($conn->connect_error){
        die("Failed to connect".$conn->connect_error);
    }
    if(isset($_POST['query']))
    {
        $inpText = $_POST['query'];
        $data_fetch = "SELECT * FROM products WHERE title LIKE '%$inpText%'";

        $result = $conn->query($data_fetch);

        if($result->num_rows>0)
        {
            while($row = mysqli_fetch_assoc($result)){
                echo "<a href='pp.php?pid=".$row['product_serial']." class ='list-group-item list-group-item-action border-1' style='color:black;background-color:white; height:30px; text-decoration: none; '>".$row['title']."</a>";
            }
        }
        else{
            echo "<p class ='list-group-item  border-1' >No record</p>";
        }
    }