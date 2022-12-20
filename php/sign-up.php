

<!DOCTYPE html>

<?php 
	include('config.php');
	$login_button = '';

if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $service = new Google_Service_Oauth2($client);

  //Get user profile data from google
  $data = $service->userinfo->get();


  
	

  if(!empty($data['given_name']))
  {
   $_SESSION['U_name'] = $data['given_name'];
  }


  if(!empty($data['email']))
  {
   $_SESSION['Email'] = $data['email'];
  }
  if(!empty($data['id']))
  {
	$_SESSION['ID'] = $data['id'];
  }
  //Entry data in database
	$query = "SELECT * FROM users WHERE username = '$data->given_name'";
	$result = mysqli_query( $conn,$query);

	$row = mysqli_fetch_array($result);

	//if data is not available in database
     if($row==0)
	 {
		$store_d = "INSERT INTO users (username,email) VALUES(?,?);";
		$store_d_stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($store_d_stmt, $store_d))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($store_d_stmt,'ss',$data->given_name,$data->email);
            //Run
            mysqli_stmt_execute($store_d_stmt);
            mysqli_stmt_close($store_d_stmt);
        }
		//$store_d_run = mysqli_query($conn,$store_d);

		//fetch user id
		$get_d = "SELECT * FROM users WHERE username = ?";
        //Prepared statement
        $get_d_stmt = mysqli_stmt_init($conn);
        //Prepare the query
        if(!mysqli_stmt_prepare($get_d_stmt, $get_d))
        {
            echo "Sql Statement failed";
        }
        else{
            //assign the placeholder original values
            mysqli_stmt_bind_param($get_d_stmt,'s',$data->given_name);
            //Run
            mysqli_stmt_execute($get_d_stmt);
            $get_d_result = mysqli_stmt_get_result($get_d_stmt);

            //fetch data into variables
            while($data = mysqli_fetch_assoc($get_d_result))
            {
                $userid = $data['userID'];
            }
            mysqli_stmt_close($get_d_stmt);
        }
            header("location:./Log_Home.php?id='$userid'");
            exit();
	 }
	 else
	 {
		header("location:./Log_Home.php?id='$userid'");
            exit();
	 }
	 

 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = $client->createAuthUrl();
}

?>

<html>
	<head>
    
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link rel="stylesheet" href="../page.css">
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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
          <a class="nav-link" style="color: white; margin-right: 20px;" href="profile.html">Account</a>
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
			<div id='login-form'class='login-page'>
				<div class="form-box">
					<div class='button-box'>
						<div id='btn'></div>
						<button type='button' class='toggle-btn'> User Signup</button>
					</div>
                    <!-- Error handler-->
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
                            if($_GET["error"]== "emInvalid")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Invalid Email</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "pser")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Password must be atleast 8 characters</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "pserl")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Password must contain atleast one letter</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "psern")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Password must contain atleast one number</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "nomatch")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Passwors must match</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "usernametaken")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Username taken</strong>
                                </div>;
                                <?php
                            }
                            if($_GET["error"]== "success")
                            {
                                ?>
                                <div class="alert" style = "background-color: rgb(103, 153, 116); border: 3px rgba(13, 42, 25, 0.929) solid;"> 
                                        <strong>Signup successful</strong>
                                </div>;
                                <?php
                            }
                        }
                    ?>
                    
                    <!--Creation the Registration Form-->
					<form action = "sign-process.php"class='input-group-register' method = "post" novalidate>
						<input type='text' name="usrname" class='input-field'placeholder='Username'>
						<input type='email' name="email" class='input-field'placeholder='Email Id'>
						<input type='password' name="psw" class='input-field'placeholder='Enter Password'>
						<input type='password' name="cpsw" class='input-field'placeholder='Confirm Password'>
						
						<button type='submit' name="reg"class='submit-btn'>Register</button>
						
						<?php if(!empty($login_button)){?>
						<a href="<?php echo $login_button?>"><img style="position:absolute; top:320px; width:120px; margin-left: 100px;" src="../images/sign-in-with-google-icon-3.jpg" /></a>
						<?php } ?>
						
					</form>
					
            </div>
			</div>
			</div>
		</div>
				<div class="container">
			<div class="slider">
				<h2 class="sliderh2">Top Rated</h2>
				<div class="slides">
					<input type="radio" name="radio-btn" id="radio1">
					<input type="radio" name="radio-btn" id="radio2">
					<input type="radio" name="radio-btn" id="radio3">
					<input type="radio" name="radio-btn" id="radio4">
				<div class="slide first">
					<img src="https://i.ibb.co/9Wj1rMq/tv.jpg" alt="tv">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/7kskYFG/cam2.jpg" alt="dslr">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/hcr0xCw/laptop.jpg" alt="laptop">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/T1Wc8fZ/headphone.jpg" alt="headphone">
				</div>
				<div class="nav-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>
			</div>
				<div class="nav-manual">
					<label for="radio1" class="manual-btn"></label>
					<label for="radio2" class="manual-btn"></label>
					<label for="radio3" class="manual-btn"></label>
					<label for="radio4" class="manual-btn"></label>

				</div>
			</div>
			<div class="slider">
				<h2 class="sliderh2">Most Reviewed</h2>
				<div class="slides">
					<input type="radio" name="radio-btn" id="radio5">
					<input type="radio" name="radio-btn" id="radio6">
					<input type="radio" name="radio-btn" id="radio7">
					<input type="radio" name="radio-btn" id="radio8">
				<div class="slide first">
					<img src="https://i.ibb.co/ZmpBT2G/headphone2.jpg" alt="headphone">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/q9Tcv5M/tv2.jpg" alt="tv">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/Tvfqmpn/phone.jpg" alt="phone">
				</div>
				<div class="slide">
					<img src="https://i.ibb.co/j6vpHtR/cam.jpg" alt="camera">
				</div>
				<div class="nav-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>
			</div>
				<div class="nav-manual">
					<label for="radio5" class="manual-btn"></label>
					<label for="radio6" class="manual-btn"></label>
					<label for="radio7" class="manual-btn"></label>
					<label for="radio8" class="manual-btn"></label>

				</div>
			</div>
		</div>
		<div class="container2">

	<div class="slider">
		<h2 class="sliderh2">New Poducts</h2>
		<div class="slides">
			<input type="radio" name="radio-btn" id="radio9">
			<input type="radio" name="radio-btn" id="radio10">
			<input type="radio" name="radio-btn" id="radio11">
			<input type="radio" name="radio-btn" id="radio12">
			<div class="slide first">
				<img src="https://i.ibb.co/yB71mGS/laptop2.jpg" alt="laptop">
			</div>
			<div class="slide">
				<img src="https://i.ibb.co/q0Pw7MZ/phone2.jpg" alt="phone">
			</div>
			<div class="slide">
				<img src="https://i.ibb.co/Tvfqmpn/phone.jpg" alt="phone">
			</div>
			<div class="slide">
				<img src="https://i.ibb.co/j6vpHtR/cam.jpg" alt="camera">
			</div>
		<div class="nav-auto">
			<div class="auto-btn1"></div>
			<div class="auto-btn2"></div>
			<div class="auto-btn3"></div>
			<div class="auto-btn4"></div>
		</div>
	</div>
		<div class="nav-manual">
			<label for="radio9" class="manual-btn"></label>
			<label for="radio10" class="manual-btn"></label>
			<label for="radio11" class="manual-btn"></label>
			<label for="radio12" class="manual-btn"></label>

		</div>
	</div>
</div>

	</body>
</html>