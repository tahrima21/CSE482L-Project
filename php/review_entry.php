<?php
    include_once "dbh-con.php";
    session_start();

    if(isset($_POST['submit']))
    {
        $pid = $_GET['pid'];
        $uid = $_SESSION['ID'];
        $review = $_POST['rev'];
        $rate = $_POST['rate'];
        $added_on = date('Y-m-d');

        $store_d = "INSERT INTO reviews (userID,product_serial,comments,rating,added_on) VALUES('$uid','$pid','$review','$rate','$added_on');";
        $store_d_run = mysqli_query($conn,$store_d);

        if($store_d_run)
        {
            header("location:./pp.php");
            exit();
        }
    }