<html lang="en">

<head>
  <title>Product</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../style.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <link rel="stylesheet" href="css\styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
          <h1>Smart wallet</h1>
          <h2>by studio and friends</h2>
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
  <?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$db="techrev";
$conn = mysqli_connect($servername, $username, $password,$db); 
if(!$conn){
    die("Sorry we failed to connect ".mysqli_connect_error());
}
else {
    echo "Connection was sucessfull<br>";
} $sql="select * from `users` ";
    $sql1="select * from `reviews` ";
    $result=mysqli_query($conn,$sql);//for product
    $result1=mysqli_query($conn,$sql1);
    //finding the number of records
    $num1=mysqli_num_rows($result);
  $num=mysqli_num_rows($result1);
  echo $num1;//for product
  echo "<br>";
  echo $num;
  echo "<br>";
  


  while($row=mysqli_fetch_assoc($result)){ 


        $user_id=$row['userID'];
        $user_name=$row['username'];
        $email=$row['email'];
        $pass=$row['password'];
        
         
          while($row=mysqli_fetch_assoc($result1)){

          $rev_serial=$row['review_serial'];
          $user_id=$row['userID'];
          $product_id=$row['product_serial'];
          $comment=$row['comments'];
          $rating=$row['rating'];
    
    //echo var_dump($row);
    echo" <div class='review'>
    <h1>Customer reviews</h1>
    <div class='r1'>
    
        <h3>$user_name</h3>
        <p> $comment</p>
    </div>
    <div class='r2'>
        <h3>$rev_serial.$user_name </h3>
        <p> $comment</p>
    </div>
    <div class='r3'>
        <h3>$rev_serial.$user_name</h3>
        <p> $comment</p>
    </div>
    
   

</div> ";
}
}


?>
    

</body>

</html>

