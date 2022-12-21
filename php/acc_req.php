<?php
    include_once "dbh-con.php";

    if(isset($_GET["id"]))
    {
        //Data id that was passed is taken into variable
        $data_id = mysqli_real_escape_string($conn,strip_tags($_GET['id']));

        //the accepted data is being taken from the required table and values are fetched
        $get_d = "SELECT * FROM product_req WHERE req_id = ?";
        //Prepared statement
        $get_d_stmt = mysqli_stmt_init($conn);
        //Prepare the query
        if(!mysqli_stmt_prepare($get_d_stmt, $get_d))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($get_d_stmt,'i',$data_id);
            //Run
            mysqli_stmt_execute($get_d_stmt);
            $get_d_result = mysqli_stmt_get_result($get_d_stmt);

            //fetch data into variables
            while($data = mysqli_fetch_assoc($get_d_result))
            {
                $prdname = $data['pr_name'];
                $prdcat = $data['category'];
                $text = $data['des'];
                $imgr = $data['pr_src'];
            }
            mysqli_stmt_close($get_d_stmt);
        }
        //Confirm message status
        $up_status = 1;
        $message = "UPDATE confirm_message SET stat = ? WHERE pr_name = ?";
        $message_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($message_stmt, $message))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($message_stmt,'is',$up_status,$prdname);
            //Run
            mysqli_stmt_execute($message_stmt);
            mysqli_stmt_close($message_stmt);
        }
        //Insert product 
        $store_d = "INSERT INTO products (title,category,description,image) VALUES(?,?,?,?);";
        $store_d_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($store_d_stmt, $store_d))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($store_d_stmt,'ssss',$prdname,$prdcat,$text,$imgr);
            //Run
            mysqli_stmt_execute($store_d_stmt);
            mysqli_stmt_close($store_d_stmt);
        }
        //Delete product from request after inserting
        $del_d = "DELETE FROM product_req WHERE req_id = ?";
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
           
        header("location:./req_que.php");
        exit();
        
        

    }