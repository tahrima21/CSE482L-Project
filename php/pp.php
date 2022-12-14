<?php
	include_once "dbh-con.php";
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../ss.css">
		<title>Home</title>
	</head>
	<body>
		<div class="navcontainer">
			<nav class = 'navbar'>
				<img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo">
				<a href="Homepage.html"><p style="text-decoration: none;">TechRev</p></a>
	    <ul class='navmenuone'>
	    <li class='navitem'>
	    <input
	    class='nav-input'
	    type='text'
	    placeholder='Search...'
	    />
	    </li>
	    <li class='navitem'>
        <?php if(isset($_SESSION["session_on"])) {?>
      <a href="user_dash.php"><button class='nav-button1'>Account</button></a>
      <?php } else {?>
			<a href="login.php"><button class='nav-button1'>Account</button></a>
      <?php }?>
	    </li>
	    </ul>
      <?php if(isset($_SESSION["session_on"])) {?>
        <p><button class='nav-button'>LoggedIn</button></p><?php } else {?>
		<p><a href="ad_login.php"><button class='nav-button1'>Admin</button></a></p>
	    <p><a href="./login.php"><button class='nav-button1'>Login</button></a></p>
		<p><a href="./sign-up.php"><button class='nav-button1'>Signup</button></a></p>
    <?php }?>
	    </nav>
			<nav class = 'navbartwo'>
	    <ul class='navmenu'>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=headphone"><button class='nav-button'> Headphone </button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=smartphone"><button class='nav-button'>Smartphone</button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=computer"><button class='nav-button'>Computer</button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=TV"><button class='nav-button'>TV</button></a>

	</li>
			<li class='navitem'

	    >
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
            { 
              $pid = $row['product_serial'];
              ?>
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

        <!--Comment fetch part-->
        <?php
          $retrieve_info = "SELECT * FROM (users NATURAL JOIN reviews) NATURAL JOIN products;";

          $retrieve_user_run = mysqli_query($conn,$retrieve_info);
          if($retrieve_user_run)
          {
            $info = mysqli_fetch_array($retrieve_user_run);
          }
        ?>
      <!--Break Start -->
      <div class="card-container">
        <div class="box-top">
          <div class="profile">
            <div class="username">
              <strong><?php echo $info[2];?></strong>
              <span><?php echo date('d M Y',strtotime($info[8]));?></span> 
            </div>
          </div>
          <div class="review-rating">
            <h4><?php echo $info[7];?></h4>
          </div>
        </div>

        <!--Comment part of card-->
        <div class="comment">
          <p><?php echo $info[6];?></p>
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
  <!--Condition for entering the section-->
  <?php
    if(isset($_SESSION["session_on"])){
  ?>
  <div class="review-card">
    <div class="form-card-container">
      <form action="review_entry.php?pid=<?php echo $pid;?>" method = "post">
        <div class="rate-options">
          <select name = "rate" required>
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
          <textarea name = "rev" placeholder="Enter Review.."></textarea>
        </div>
        <div class="sub-btn">
          <button class="btn-submit" name = "submit">Submit</button>
        </div>
        <?php } else { echo "<h2>Please Login to Submit your review</h2>";} ?>
      </form>
    </div>
  </div>
</section>


</body>

</html>

