<?php
   include_once "dbh-con.php";

    if(isset($_GET["id"]))
    {
        //Data id that was passed is taken into variable
        $data_id = mysqli_real_escape_string($conn,$_GET['id']);
        $get_d = "SELECT * FROM product_req WHERE req_id = '$data_id'";
        $get_d_run = mysqli_query($conn,$get_d);

        if($get_d_run)
        {
            $data = mysqli_fetch_array($get_d_run);
            $prdname = $data['pr_name'];
        }
        $del_d = "DELETE FROM product_req WHERE req_id = '$data_id'";

        $del_d_run = mysqli_query($conn,$del_d);
        
        $up_status = -1;
        $message = "UPDATE confirm_message SET stat = '$up_status' WHERE pr_name = '$prdname'";
        $message_run = mysqli_query($conn,$message);
        if($del_d_run and $message_run)
        {
            header("location:./req_que.php");
            exit();
        }
        

    }