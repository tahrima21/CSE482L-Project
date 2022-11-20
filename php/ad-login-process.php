<?php
    if(isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $pwd = $_POST["psw"];

        require __DIR__."/dbh-con.php";
        require __DIR__."/data-checker.php";

        /* if any of the fields are empty */
        if(empty($email) || empty($pwd))
        {
            header("location:ad_login.php?error=emptyInput");
            exit();
        }

        /* Session or cookie creation */

        $uidExists = ADUidExists($conn,$email,$email);

        //if function returns false
        if($uidExists == false)
        {
            header('location: ./ad_login.php?error=wrongLogin');
            exit();
        }

        $pwdHashed = $uidExists["password"];

        //$checkPwd = password_verify($pwd,$pwdHashed);

        if($pwd !== $pwdHashed)
        {
            header('location: ./ad_login.php?error=wrongLogin');
            exit();
        }
        else if($pwd == $pwdHashed)
        {
            if(isset($_POST["check"]))
            {
                setcookie("userid",$uidExists["serial"],time()+ 86400,"/");
            }
            else{
                $_SESSION["ID"] = $uidExists["serial"];
                $_SESSION["Email"] = $uidExists["email"];
            }
            header("location: ./ad_dash.php");
            exit();
        }
    }
    else
    {
        header("location: ./ad_login.php");
        exit();
    }