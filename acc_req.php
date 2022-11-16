<?php
    include_once "dbh-con.php";

    if(isset($_GET["id"]))
    {
        //Data id that was passed is taken into variable
        $data_id = mysqli_real_escape_string($conn,$_GET['id']);

        //the accepted data is being taken from the required table and values are fetched
        $get_d = "SELECT * FROM product_req WHERE pr_id = '$data_id'";
        $get_d_run = mysqli_query($conn,$get_d);

        if($get_d_run)
        {
            $data = mysqli_fetch_array($get_d_run);
            $prdname = $data['pr_name'];
            $brd_name = $data['br_name'];
            $text = $data['des'];
            $imgr = $data['pr_src'];
        }

        $store_d = "INSERT INTO main_product (name,brand,descr,pic_source) VALUES('$prdname','$brd_name','$text',' $imgr');";
        $del_d = "DELETE FROM product_req WHERE pr_id = '$data_id'";

        $store_d_run = mysqli_query($conn,$store_d);
        $del_d_run = mysqli_query($conn,$del_d);

        if($store_d_run and $del_d_run)
        {
            header("location:./req_que.php");
            exit();
        }
        

    }