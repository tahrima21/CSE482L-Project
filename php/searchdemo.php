<?php
    $conn = mysqli_connect("localhost", "root", "", "techrev" );
    if ($conn-> connect_error){
        die("Connection failed:".$conn-> connect_error);
    }

    $sql = "SELECT title, product_serial from products";
    $result = mysqli_query($conn,$sql);
    
    
    
    ?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="srch1.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
		<title>Search</title>
	</head>
	<body>
		<div class="search-wrap">
            <div class="search-input">
                <select class="autocom-box">
                <option value="option" disabled selected>Search...</option>
                <?php
                // use a while loop to fetch data
                // from the result variable
                // and individually display as an option
                while ($products = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):;
            ?>
            <option value="option">
            <?php 
                echo"<a href='pp.php?ID={$products["product_serial"]}'> {$products["title"]}</a>";
                    
                    ?>
            </option>
                <?php
                endwhile;
                // While loop must be terminated
            ?>
                </select>
                <div class="icon"><a href="https://imgbb.com/"><img src="https://i.ibb.co/fGgCtjy/search.png" alt="search" height="16px" width="16px"></a></div>
            </div>

        </div>
	</body>
</html>