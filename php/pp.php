<?php
	include_once "dbh-con.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Product</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="../ss.css">
    <meta  name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!--Product info fetch-->
    <?php
        if(isset($_GET['pname']))
				{
					$pname = $_GET['pname'];
          $query = "SELECT * FROM products WHERE title = '$pname'";
          $query_run = mysqli_query($conn,$query);
				  if(mysqli_num_rows($query_run)>0)
					{
            foreach($query_run as $row)
            { ?>
              <div class="wrapper">
                <div class="product-img">
                  <a href="#"><?php echo "<img src = '".$row['image']."' width = '327' height = '420'>";?></a>
                </div>
                <div class="product-info">
                  <div class="product-text">
                    <div class="pr-title">
                      <h1><?php echo $pname?></h1>
                    </div>
                    <div class="descrip">
                      <p><?php echo $row['description']?></p>
                    </div>
                    <p>Price: 78$</p>
                  </div>
                  <div class="product-price-btn">
                
                    <button type="button">buy now</button>
                  </div>
                </div>
              </div>
              <?php
            }
				  }
				  else
				  {
					  ?>
						  <h3 class = "card-title">No Product found</h3>
					  <?php
							
				  }
			  }
		  ?>

  </div>
  
  <!--Review section-->
  <section id = "review-section">
    <!--Heading-->
    <div class="review-section-heading">
        <span>Comments</span>
        <h1>Reviewers Says</h1>
    </div>

    <!--Review Card-->
    <div class="review-card">

      <!--Break Start -->
      <div class="card-container">
        <div class="box-top">
          <div class="profile">
            <div class="username">
              <strong>Mariya Sharmin</strong>
              <span>March 12, 2022</span> 
            </div>
          </div>
          <div class="review-rating">
            <h4>Rating: 4.75</h4>
          </div>
        </div>

        <!--Comment part of card-->
        <div class="comment">
          <p>HELLO THERE EVERYONE</p>
        </div>
      </div>

      <!--Break End-->
    </div>
  </section>

<!--Enter Review Section-->
<section id = "review-section">
  <!--Heading-->
  <div class="review-section-heading">
      <h1>Enter Review</h1>
  </div>

  <!--Review Card-->
  <div class="review-card">
    <div class="form-card-container">
      <form action="" method = "post">
        <div class="rate-options">
          <select>
            <option value="" disabled selected>Select Rating</option>
            <option value="1">1</option>
            <option value="1.5">1.5</option>
            <option value="2">2</option>
            <option value="2.5">2.5</option>
            <option value="3">3</option>
            <option value="3.5">3.5</option>
            <option value="4">4</option>
            <option value="4.5">4.5</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="text-area">
          <textarea placeholder="Enter Review.."></textarea>
        </div>
        <div class="sub-btn">
          <button class="btn-submit" name = "submit">Submit</button>
        </div>
        
      </form>
    </div>
  </div>
</section>


</body>

</html>

