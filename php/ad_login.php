<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link rel="stylesheet" href="../page.css">
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

		<title>Home</title>
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

		<section id="loginRegister">
			<div id='login-form'class='login-page'>
				<div class="form-box">
                    <div class='button-box'>
						<div id='btn'></div>
						<button type='button' class='toggle-btn'>Admin Login</button>
					</div>
					<!--Error handler-->
					<?php
                        if(isset($_GET["error"]))
                        {
                
                            if($_GET["error"]== "emptyInput")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>All fields must be filled</strong>
                                </div>;
                                <?php
                            }
							if($_GET["error"]== "wrongLogin")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Wrong email or password</strong>
                                </div>;
                                <?php
                            }
						}
					?>
				<!--Creation the Login Form-->
					<form action = "ad-login-process.php" id='login' class='input-group-login' method = "post">
						<input type='text'name = "email" class='input-field'placeholder='Email Id'>
						<input type='password' name = "psw" class='input-field'placeholder='Enter Password'required>
						<button type='submit' name = "login" class='submit-btn'>Login</button>
					</form>
			
					<!--Animation-->
			
			
				</div>
			</div>
		
				



	</body>
</html>