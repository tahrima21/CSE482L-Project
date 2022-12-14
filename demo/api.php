<?php

    if(count($_POST)>0){
        $text = $_POST['text'];
        $string = "mysql:host=localhost; dbname=techrev";

        try{
            $con = new PDO($string,"root","");
        }catch(PDOException $e){
            die($e->getMessage());
        }

        $stm = $con->query("SELECT title, description FROM products");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }
    
    
    ?>