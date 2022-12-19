<?php
   include_once "dbh-con.php";

    if(isset($_POST["submit"]))
    {
        $filename = $_FILES["filei"]["name"];
        $tmpname = $_FILES["filei"]["tmp_name"];
        $folder = "../uploads/". $filename;
        
        $prdname = mysqli_real_escape_string($conn,strip_tags($_POST["p_name"]));
        $prdcat = mysqli_real_escape_string($conn,strip_tags($_POST["p_cat"]));
        $user_id = mysqli_real_escape_string($conn,strip_tags($_GET['id']));
        $text = mysqli_real_escape_string($conn,strip_tags($_POST["txt"]));
        strtolower($prdcat);
        $stat = 0;
        //move the uploaded file to the website directory in a new folder
        move_uploaded_file($tmpname,$folder);
        //insert data in the databse
        if($filename!="" && $prdname!="" && $text!="")
        {    $query = "INSERT INTO product_req(user_id,pr_name,category,des,pr_src,status) VALUES(?,?,?,?,?,?);";
             $query_stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query_stmt, $query))
            {
                echo "Sql Statement failed";
            }
            else{
            //assign the placeholder original values
                mysqli_stmt_bind_param($query_stmt,'issssi',$user_id,$prdname,$prdcat,$text,$folder,$stat);
            //Run
                mysqli_stmt_execute($query_stmt);
                mysqli_stmt_close($query_stmt);
        }
             $query2 = "INSERT INTO confirm_message(us_id,pr_name,stat) VALUES(?,?,?);";
             $query2_stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query2_stmt, $query2))
            {
                echo "Sql Statement failed";
            }
            else{
            //assign the placeholder original values
                mysqli_stmt_bind_param($query2_stmt,'isi',$user_id,$prdname,$stat);
            //Run
                mysqli_stmt_execute($query2_stmt);
                mysqli_stmt_close($query2_stmt);
        }

        }
            header("location:./product_req.php?error=done");
            exit();
    }