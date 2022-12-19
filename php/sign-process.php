<?php
    if(isset($_POST["reg"]))
    {
        require __DIR__."/dbh-con.php";
        /* form validation */
        $username = mysqli_real_escape_string($conn,strip_tags($_POST["usrname"]));
        $email = mysqli_real_escape_string($conn,strip_tags($_POST["email"]));
        $psswd = mysqli_real_escape_string($conn,strip_tags($_POST["psw"]));
        $cpsswd = mysqli_real_escape_string($conn,strip_tags($_POST["cpsw"]));
        //$username = $_POST["usrname"];
        //$email = $_POST["email"];
       // $psswd = $_POST["psw"];
        //$cpsswd = $_POST["cpsw"];

        //require __DIR__."/dbh-con.php";
        require __DIR__."/data-checker.php";

        /* if any of the fields are empty */
        if(empty($username) || empty($email) || empty($psswd) || empty($cpsswd))
        {
            header("location:sign-up.php?error=emptyInput");
            exit();
        }
        /* proper email*/
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            header("location:sign-up.php?error=emInvalid");
            exit();
        }
        /* password length*/
        if(strlen($psswd)<8)
        {
            header("location:sign-up.php?error=pser");
            exit();
        }
        /* password must contain a letter*/
        if(!preg_match("/[a-z]/i",$psswd))
        {
            header("location:sign-up.php?error=pserl");
            exit();
        }
        /* password must contain a number*/
        if(!preg_match("/[0-9]/",$psswd))
        {
            header("location:sign-up.php?error=psern");
            exit();
        }
        /* password must contain a number*/
        if($psswd !== $cpsswd)
        {
            header("location:sign-up.php?error=nomatch");
            exit();
        }
        //if username is already taken
        if(UidExists($conn,$username,$email)!== false)
        {
            header("location: ./sign-up.php?error=usernametaken");
            exit();
        }

        createUser($conn,$username,$email,$psswd);
    }
    else
    {
        header("location: ./sign-up.php");
        exit();
    }

    
