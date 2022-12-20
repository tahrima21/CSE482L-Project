<?php
	include_once "dbh-con.php";
  session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../ss.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    
     <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script>
        function mouseover() {
            document.getElementById("gfg").style.background = "#B4E197";
        }

        function mouseout() {
                document.getElementById("gfg").style.background = "#4E944F";
            }
        function mouseover1() {
            document.getElementById("gfg2").style.background = "#B4E197";
        }

        function mouseout1() {
                document.getElementById("gfg2").style.background = "#4E944F";
            }
        function mouseover2() {
            document.getElementById("gfg3").style.background = "#B4E197";
        }

        function mouseout2() {
                document.getElementById("gfg3").style.background = "#4E944F";
            }
            function mouseover3() {
            document.getElementById("gfg4").style.background = "#B4E197";
        }

        function mouseout3() {
                document.getElementById("gfg4").style.background = "#4E944F";
            }
         
    </script>
    <script type="text/javascript">
        function get_data(text){
            if(text.trim()==""){
                return
            }
            if(text.trim().length < 2){
                return
            }
            var text = document.querySelector(".js-search").value;
            var form = new FormData();
            form.append('text',text);
            var ajax = new XMLHttpRequest();
            ajax.addEventListener('readystatechange',function(e){
                if(ajax.readyState == 4 && ajax.status == 200){
                    handle_result(ajax.responseText);
                }
            });
            ajax.open('post','api.php',true);
            ajax.send(form);
        }
        function handle_result(result){
            //console.log(result);
            var result_div = document.querySelector(".js-results");
            var str = "";

            var obj = JSON.parse(result);
            for(var i = obj.length - 1; i>=0; i--){
                //console.log(obj[i].title);
                str += `<a href='pp.php?ID={$products["product_serial"]}' <div>` + obj[i].title + "</div></a><br>";
            }
            result_div.innerHTML = str;
            if(obj.length > 0){
                show_results();
            }
            else{
                hide_results();
            }
        }
        function show_results(){
            var result_div = document.querySelector(".js-results");
            result_div.classList.remove("hide");
        }
        function hide_results(){
            var result_div = document.querySelector(".js-results");
            result_div.classList.add("hide");
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<title>Home</title>
	</head>
	<body style="background: #E9EFC0;">
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4E944F;">
  <div class="container-fluid">
    <img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo" style="height: 50px; width: 50px; background-color: #4E944F; color: #4E944F;">
				<a href="Homepage.html" style="text-decoration: none; color: white; margin-right: 200px; font-size: 25px;">TechRev</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: white; margin-right: 600px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #4E944F;">
              <li><a href = "product_gallery.php?type=smartphone" onmouseover="mouseover()" onmouseout="mouseout()" id="gfg" class="dropdown-item" href="#" style="color: white;">Smartphone</a></li>
              <li><a href = "product_gallery.php?type=computer" onmouseover="mouseover1()" onmouseout="mouseout1()" id="gfg2" class="dropdown-item" href="#" style="color: white;">Computer</a></li>
              <li><a href = "product_gallery.php?type=headphone" onmouseover="mouseover3()" onmouseout="mouseout3()" id="gfg4" class="dropdown-item" href="#" style="color: white;">Headphone</a></li>
              <li><a href = "product_gallery.php?type=TV" onmouseover="mouseover2()" onmouseout="mouseout2()" id="gfg3" class="dropdown-item" href="#" style="color: white;">TV</a></li>
            </ul>
          </li>
          <li class="nav-item">
          <?php if(isset($_SESSION["session_on"])) {?>
      <a href="user_dash.php"><button class='nav-button1'>Account</button></a>
      <?php } else {?>
			<a href="login.php"><button class='nav-button1'>Account</button></a>
      <?php }?>
<<<<<<< HEAD
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
=======
          </li>
        <li class="nav-item">
          <a class="nav-link" style="color: white; margin-right: 20px;" href="ad_login.php">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white; margin-right: 20px;" href="./sign-up.php">Signup</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" style="color: white; margin-right: 20px;" href="./login.php">Login</a>
          </li>
        
        
      </ul>
    </div>
  </div>
</nav>
</div>
<form class="form-inline p-3" style="display: center; justify-content: center;">
    <input autofocus="true" onblur="hide_results()" oninput="get_data(this.value)" class="form-control me-2 search js-search" type="search" placeholder="Search" aria-label="Search" name="search" id="search" style="width: 360px;" autocomplete="off" required>
    
  </form>
  <div id="list" class="col-md-5" style="position: relative; margin-left: 705px; margin-top: -15px; width: 390px;">
    <div class="results js-results hide">
        
    </div>
  </div>
		
>>>>>>> demo
  <div class="wrapcontainer">
    <!--Product info fetch-->
    <?php
        if(isset($_GET['pid']))
				{
					$pid = mysqli_real_escape_string($conn,strip_tags($_GET['pid']));
          $query = "SELECT * FROM products WHERE product_serial = ?";
          $query_stmt = mysqli_stmt_init($conn);
          //Prepare the query
          if(!mysqli_stmt_prepare($query_stmt, $query))
          {
              echo "Sql Statement failed";
          }
          else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($query_stmt,'i',$pid);
            //Run
            mysqli_stmt_execute($query_stmt);
            $query_result = mysqli_stmt_get_result($query_stmt);
            mysqli_stmt_close($query_stmt);
          }
				  if(mysqli_num_rows($query_result)>0)
					{
            while($row = mysqli_fetch_assoc($query_result))
            { 
              ?>
              <div class="wrapper">
                <div class="product-img">
                  <a href="#"><?php echo "<img src = '".$row['image']."' width = '327' height = '420'>";?></a>
                </div>
                <div class="product-info">
                  <div class="product-text">
                    <div class="pr-title">
                      <h1><?php echo $row['title']?></h1>
                    </div>
                    <div class="descrip">
                      <p><?php echo $row['description']?></p>
                    </div>
                    <p>Price: 78$</p>
                  </div>
                  <!--
                  <div class="product-price-btn">
                
                    <button type="button">buy now</button>
                  </div>
                  -->
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
          if(isset($_GET['pid']))
          {
            $pid = mysqli_real_escape_string($conn,strip_tags($_GET['pid']));
          $retrieve_info = "SELECT * FROM (users NATURAL JOIN reviews) NATURAL JOIN products WHERE product_serial = ?;";

          $retrieve_info_stmt = mysqli_stmt_init($conn);
          //Prepare the query
          if(!mysqli_stmt_prepare($retrieve_info_stmt, $retrieve_info))
          {
              echo "Sql Statement failed";
          }
          else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($retrieve_info_stmt,'i',$pid);
            //Run
            mysqli_stmt_execute($retrieve_info_stmt);
            $retrieve_user_result = mysqli_stmt_get_result($retrieve_info_stmt);
            mysqli_stmt_close($retrieve_info_stmt);
          }
          //$retrieve_user_run = mysqli_query($conn,$retrieve_info);

          if(mysqli_num_rows($retrieve_user_result)>0)
					{
                while($info = mysqli_fetch_assoc($retrieve_user_result))
								{
									?>
                  <div class="card-container">
                    <div class="box-top">
                      <div class="profile">
                        <div class="username">
                          <strong><?php echo $info['username'];?></strong>
                          <span><?php echo date('d M Y',strtotime($info['added_on']));?></span> 
                        </div>
                      </div>
                      <div class="review-rating">
                        <h4><?php echo $info['rating'];?></h4>
                      </div>
                    </div>

                    <!--Comment part of card-->
                    <div class="comment">
                        <p><?php echo $info['comments'];?></p>
                    </div>
                  </div>
                  <!--Break End-->
                  <?php
                  

								}
					}
					else
					{
							?>
									<h3 class = "card-title">No Reviews found</h3>
								<?php
							
					}
          }
          
        ?>
      <!--Break Start -->
      
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

