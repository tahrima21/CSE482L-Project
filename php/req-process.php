<?php
   include_once "dbh-con.php";

    if(isset($_POST["submit"]))
    {
        $filename = $_FILES["filei"]["name"];
        $tmpname = $_FILES["filei"]["tmp_name"];
        $folder = "uploads/". $filename;
         
        $prdname = $_POST["p_name"];
        $brd_name = $_POST["b_name"];
        $text = $_POST["txt"];

        //move the uploaded file to the website directory in a new folder
        move_uploaded_file($tmpname,$folder);
        //insert data in the databse
        if($filename!="" && $prdname!="" && $brd_name!="" && $text!="")
        {    $query = "INSERT INTO product_req(pr_name,br_name,des,pr_src) VALUES(' $prdname','$brd_name','$text','$folder');";

              $query_run = mysqli_query($conn,$query);
        }
        if($query_run)
        {
            header("location:./product_req.php?error=done");
            exit();

        }
        

    }