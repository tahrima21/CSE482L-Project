<?php 
    include_once "dbh-con.php";
    if(isset($_POST["update"]))
    {
        
        $user_id = $_POST["usrid"];
        $username = $_POST["usrname"];
        $email = $_POST["email"];
        $password = $_POST["psw"];

        //Query for update

<<<<<<< HEAD
        $query = "UPDATE users SET username = ' $username',email = '$email',password = '$password' WHERE serial = '$user_id'";
=======
        $query = "UPDATE users SET username = '$username',email = '$email',password = '$password' WHERE userID = '$user_id'";
>>>>>>> Demo2

        $query_run = mysqli_query($conn,$query);
        
        if($query_run)
        {
            header("location: u_logout.php");
            exit();
            
        }
        
    }