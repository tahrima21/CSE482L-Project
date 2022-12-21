<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<title>User Dashboard</title>
	</head>
	<body style="background: #E9EFC0;">
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4E944F;">
  <div class="container-fluid">
    <img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo" style="height: 50px; width: 50px; background-color: #4E944F; color: #4E944F;">
				<a href="Homepage.php" style="text-decoration: none; color: white; margin-right: 200px; font-size: 25px;">TechRev</a>
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
          <a class="nav-link" style="color: white; margin-right: 20px;" href="Log_Home.php">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" style="color: white; margin-right: 20px;" ><?php echo $_SESSION["U_name"]?></a>
          </li>
          
        
        
      </ul>
    </div>
  </div>
</nav>
</div>
		<div class="side_dash" id="pic">
			<ul class="d-items">
				<li class="it" >
					<a href="user_dash.php"><i class='bx bxs-objects-vertical-center'></i><span class="menu-titles">Reviews</span></a>
				</li>
				<li class="it" >
					<a  href="profile.php"><i class='bx bxs-user-circle'></i><span class="menu-titles">Profile</span></a>
				</li>
				<li class="it">
					<a  href="product_req.php"><i class='bx bxs-message-square-edit'></i><span class="menu-titles">Product Request</span></a>
				</li>
				<li class="it">
					<a  href="req_stat.php"><i class='bx bxs-bell-ring'></i><span class="menu-titles">Request Status</span></a>
				</li>
				<li class="it" >
					<a  href="u_logout.php"><i class='bx bxs-exit'></i><span class="menu-titles">Logout</span></a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
			<h4 class = "tot_rev">Total reviews</h4>
			<div class="dottedline"></div>
            <?php
                include_once "dbh-con.php";
                $query = "SELECT * FROM reviews NATURAL JOIN products WHERE userID = ?";
                $query_stmt = mysqli_stmt_init($conn);
                //Prepare the query
                if(!mysqli_stmt_prepare($query_stmt, $query))
                {
                echo "Sql Statement failed";
                }
            else{
                //assign the placeholder original values
                mysqli_stmt_bind_param($query_stmt,'i',$_SESSION["ID"]);
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
                        <div class="rev-cont">
				        <div class="pr-dt">
					        <h5><?php echo $row['title']?></h5>
					        <p><?php echo $row['comments']?></p>
				        </div>
			            </div>
                    <?php
                }
          }
          else
          {
              ?>
                  <h3 class = "card-title">No reviews yet</h3>
              <?php
                    
          }
            ?>
			
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>