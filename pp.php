<?php
    if(isset($_GET['ID'])){
      require 'livesearch.php';
    $conn = mysqli_connect("localhost", "root", "", "techrev" );
    $ID = mysqli_real_escape_string($conn, $_GET['ID']);
    if ($conn-> connect_error){
        die("Connection failed:".$conn-> connect_error);
    }

    $sql = "SELECT * from products WHERE product_serial='$ID' ";
    $result = mysqli_query($conn,$sql) or die("Bad Query:$sql");
    $row = mysqli_fetch_array("$result");
    }
    
    
    
    ?>
<html lang="en">

<head>
  <title>Product</title>
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <link rel="stylesheet" href="ss.css">
</head>

<body>
    
  <div class="navcontainer">
    <nav class = 'navbar'>
            <img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo">
      <a href="Homepage.html"><p style="text-decoration: none;">TechRev</p></a>
            <ul class='navmenuone'>
                <li class='navitem'>
                    <input class='nav-input' type='text' placeholder='Search...'/>
                </li>
                <li class='navitem'>
                    <button class='nav-button'>Account</button>
                </li>
            </ul>
            <p><button class='nav-button'>Sign Up/Login</button></p>
        </nav>
    <nav class = 'navbartwo'>
            <ul class='navmenu'>
                <li class='navitem'>
                    <button class='nav-button'> Headphone </button>

                </li>
                <li class='navitem'>
                    <button class='nav-button'>Smartphone</button>
                  </li>
                <li class='navitem'>
                    <button class='nav-button'>Computer</button>
                  </li>
                <li class='navitem'>
                    <button class='nav-button'>TV</button></li>
            <li class='navitem'>
                    <button class='nav-button'>More
                <img src="https://i.ibb.co/1vrDrph/icons8-expand-arrow-24.png" alt="down arrow" class="downarrow"> </button>
                  </li>
            </ul>
        </nav>
  </div>
  <div class="wrapcontainer">
    <div class="wrapper">
      <div class="product-img">
        <a href="https://ibb.co/ZfMDFLj"><img src="https://i.ibb.co/D1R2vVJ/smart-wallet.jpg" alt="smart-wallet" height="420" width="327"></a>
      </div>
      <div class="product-info">
        <div class="product-text">
          <h1><?php echo $row["title"] ?></h1>
          <h2><?php echo $row["description"] ?></h2>
          <p>Product Type: Men'z Wallet.<br>
              Material: 100% Genuine Leather<br>
              Size-4.5 inch/4 inch;<br>
              Wt: >100 gms</br>
                Gender: Men
                  Pocket/Slote: 12+<br>
               </p>
               <p>Price: 78$</p>
        </div>
        <div class="product-price-btn">
          
          <button type="button">buy now</button>
        </div>
      </div>
    </div>
  </div>
  <div class="rev">
    
    <div class="card">
        <h3 class="card-title">Customer reviews</h3>
        <div class="card-rating">
          <div class="ratings">
   
              <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
              <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
              <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
               <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star.svg" alt="">
              <img src="https://raw.githubusercontent.com/mustafadalga/ratings-card/461b28d30e6d5b4475e0f78d2f65700674808565/assets/img/star2.svg" alt="">
          </div>
          <div class="card-rating-text">4.7 out of 5</div>
      </div>
        <h2>Reviews</h2>
        <p class="rating-count">40 customer ratings</p>
        
        
    
    
    </div>
  </div>


  



</body>

</html>

