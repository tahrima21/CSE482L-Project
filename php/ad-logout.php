<?php

    session_start();
    session_unset();
    header("location: ad_login.php");