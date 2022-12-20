<?php

    if(count($_POST)>0){
        $text = $_POST['text'];
        $string = "mysql:host=localhost; dbname=techrevuser";

        try{
            $con = new PDO($string,"techrevUser","Z*RQ9fL]s6dss58w");
        }catch(PDOException $e){
            die($e->getMessage());
        }
        $text = addslashes($text);
        $stm = $con->query("SELECT title FROM products WHERE title LIKE '%$text%'");
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($result);
    }
    
    
    ?>