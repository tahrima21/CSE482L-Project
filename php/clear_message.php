<?php
   include_once "dbh-con.php";

    if(isset($_GET["id"]))
    {
        //Data id that was passed is taken into variable
        $data_id = mysqli_real_escape_string($conn,$_GET['id']);
        $del_d = "DELETE FROM confirm_message WHERE m_id = '$data_id'";

        $del_d_run = mysqli_query($conn,$del_d);

        if($del_d_run)
        {
            header("location:./req_stat.php");
            exit();
        }
        

    }