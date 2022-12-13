<?php
   include_once "dbh-con.php";

    if(isset($_POST["submit"]))
    {
        $filename = $_FILES["filei"]["name"];
        $tmpname = $_FILES["filei"]["tmp_name"];
        $folder = "../uploads/". $filename;
         
        $prdname = $_POST["p_name"];
        $prdcat = $_POST["p_cat"];
        $user_id = $_GET['id'];
        $text = $_POST["txt"];
        $stat = 0;
        //move the uploaded file to the website directory in a new folder
        move_uploaded_file($tmpname,$folder);
        //insert data in the databse
        if($filename!="" && $prdname!="" && $text!="")
        {    $query = "INSERT INTO product_req(user_id,pr_name,category,des,pr_src,status) VALUES('$user_id','$prdname','$prdcat','$text','$folder','$stat');";
             $query2 = "INSERT INTO confirm_message(us_id,pr_name,stat) VALUES('$user_id','$prdname','$stat');";

              $query_run = mysqli_query($conn,$query);
              $query_run1 = mysqli_query($conn,$query2);
        }
        if($query_run &&  $query_run1)
        {
            header("location:./product_req.php?error=done");
            exit();

        }
        

    }