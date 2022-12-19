<?php 
    include_once "dbh-con.php";
    if(isset($_POST["update"]))
    {
        $user_id = mysqli_real_escape_string($conn,strip_tags($_POST["usrid"]));
        $username = mysqli_real_escape_string($conn,strip_tags($_POST["usrname"]));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST["email"]));
        $password = mysqli_real_escape_string($conn,strip_tags($_POST["psw"]));
        
        if(empty($password))
        {
            $query = "UPDATE users SET username = ?,email = ? WHERE userID = ?";


            $query_stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($query_stmt, $query))
            {
                echo "Sql Statement failed";
            }
            else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($query_stmt,'ssi',$username,$email,$user_id);
            //Run
            mysqli_stmt_execute($query_stmt);
            mysqli_stmt_close($query_stmt);
            }

            header("location: u_logout.php");
            exit();
        }
        else{
            $query2 = "UPDATE users SET username = ?,email = ?,password = ? WHERE userID = ?";


        $query2_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($query2_stmt, $query2))
        {
            echo "Sql Statement failed";
        }
        else{
            $hashedPass = password_hash($password,PASSWORD_DEFAULT);
            //assign the placeholder original values
            mysqli_stmt_bind_param($query2_stmt,'sssi',$username,$email,$hashedPass,$user_id);
            //Run
            mysqli_stmt_execute($query2_stmt);
            mysqli_stmt_close($query2_stmt);
        }

            header("location: u_logout.php");
            exit();
        }
            
        
        
    }