<?php 
    include_once "dbh-con.php";
    if(isset($_POST["update"]))
    {
        $user_id = mysqli_real_escape_string($conn,strip_tags($_POST["usrid"]));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST["email"]));
        $password = mysqli_real_escape_string($conn,strip_tags($_POST["psw"]));

        //Query for update

        $query = "UPDATE admin SET email = ?,password = ? WHERE serial = ?";

        $query_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query_stmt, $query))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($query_stmt,'ssi',$email,$password,$user_id);
            //Run
            mysqli_stmt_execute($query_stmt);
            mysqli_stmt_close($query_stmt);
        }
        
        
            header("location: ad-logout.php");
            exit();
        
    }