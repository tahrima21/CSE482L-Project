<?php
session_start();
    
    //check if the user name is unavailable
    function UidExists($conn,$username,$email)
    {
        //check if it is in the database
        $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";

        //prepare statement to submit to database

        $stmt = mysqli_stmt_init($conn);

        //if query is not correctly done
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ./sign-up.php?error=stmtfailed");
            exit();  
        }
        
        //if no error found then user data is sent for check
        mysqli_stmt_bind_param($stmt,"ss", $username,$email);

        mysqli_stmt_execute($stmt);

        //checking if the user is not in the database

        $resultdata = mysqli_stmt_get_result($stmt);

        //check the result of the check

        if($row = mysqli_fetch_assoc($resultdata)) //if any data is found in database matching the user
        {                                          //then return true
            //if result is found to be in database grab the data
            //and use it for login                                  
            return $row;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }
    //ADMIN UID CHECK
    function ADUidExists($conn,$username,$pass)
    {
        //check if it is in the database
        $sql = "SELECT * FROM admin WHERE password = ? OR email = ?;";

        //prepare statement to submit to database

        $stmt = mysqli_stmt_init($conn);

        //if query is not correctly done
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ./ad_login.php?error=stmtfailed");
            exit();  
        }
        
        //if no error found then user data is sent for check
        mysqli_stmt_bind_param($stmt,"ss", $username,$pass);

        mysqli_stmt_execute($stmt);

        //checking if the user is not in the database

        $resultdata = mysqli_stmt_get_result($stmt);

        //check the result of the check

        if($row = mysqli_fetch_assoc($resultdata)) //if any data is found in database matching the user
        {                                          //then return true
            //if result is found to be in database grab the data
            //and use it for login                                  
            return $row;
        }
        else
        {
            $result = false;
            return $result;
        }
        mysqli_stmt_close($stmt);
    }

    //enter the values in the database
    function createUser($conn,$username,$email,$psswd)
    {
        //insert data in the databse
        $sql = "INSERT INTO users(username,email,password) VALUES(?,?,?);";

        //prepare statement to submit to database

        $stmt = mysqli_stmt_init($conn);

        //if the prepare statement will execute the query (problem with query)
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("location: ../sign-up.php?error=stmtfailed");
            exit();  
        }
        
        //if no error found then user data is sent for binding
        mysqli_stmt_bind_param($stmt,"sss", $username,$email,$psswd);

        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        header("location:./sign-up.php?error=success");
        exit();
    }
    


    