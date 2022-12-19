<?php
    include_once "dbh-con.php";
    session_start();

    if(isset($_POST['submit']))
    {
        $pid = mysqli_real_escape_string($conn,strip_tags($_GET['pid']));
        $uid = mysqli_real_escape_string($conn,strip_tags($_SESSION['ID']));
        $review = mysqli_real_escape_string($conn,strip_tags($_POST['rev']));
        $rate = mysqli_real_escape_string($conn,strip_tags($_POST['rate']));
        $added_on = date('Y-m-d');

        $store_d = "INSERT INTO reviews (userID,product_serial,comments,rating,added_on) VALUES('$uid','$pid','$review','$rate','$added_on');";
        $store_d_run = mysqli_query($conn,$store_d);

        if($store_d_run)
        {
            header("location:./pp.php?pid=$pid");
            exit();
        }
    }