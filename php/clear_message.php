<?php
   include_once "dbh-con.php";

    if(isset($_GET["id"]))
    {
        //Data id that was passed is taken into variable
        $data_id = mysqli_real_escape_string($conn,strip_tags($_GET['id']));
        $del_d = "DELETE FROM confirm_message WHERE m_id = ?";

        //Delete product from request after inserting
        $del_d_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($del_d_stmt, $del_d))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($del_d_stmt,'i',$data_id);
            //Run
            mysqli_stmt_execute($del_d_stmt);
            mysqli_stmt_close($del_d_stmt);
        }
        
            header("location:./req_stat.php");
            exit();
    }