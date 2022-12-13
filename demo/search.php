<?php
    $con = new PDO("mysql:host=localhost; dbname=techrev",'root','');

    if(isset ($_POST["submit"])){
        $str = $_POST["search"];
        $sql = $con->prepare("SELECT * from `products` WHERE description = '$str'");

        $sql->setFetchMode(PDO: : FETCH_OBJ);
        $sql -> execute();

    }

    $sql = "SELECT title, product_serial from products";
    $result = mysqli_query($conn,$sql);
?>