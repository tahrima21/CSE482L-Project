

<!DOCTYPE html>

<?php 
	include('config.php');
	$login_button = '';

if(isset($_GET["code"]))
{
 //It will Attempt to exchange a code for an valid authentication token.
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

 //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
 if(!isset($token['error']))
 {
  //Set the access token used for requests
  $google_client->setAccessToken($token['access_token']);

  //Store "access_token" value in $_SESSION variable for future use.
  $_SESSION['access_token'] = $token['access_token'];

  //Create Object of Google Service OAuth 2 class
  $google_service = new Google_Service_Oauth2($google_client);

  //Get user profile data from google
  $data = $google_service->userinfo->get();

  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }


 }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if(!isset($_SESSION['access_token']))
{
 //Create a URL to obtain user authorization
 $login_button = '<a href="'.$google_client->createAuthUrl().'"><img style="position:absolute; top:320px; width:120px;" src="../images/sign-in-with-google-icon-3.jpg" /></a>';
}


?>

<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link rel="stylesheet" href="../page.css">
		<title>Home</title>
	</head>
	<body>
		<?php
			if($login_button == '')
   						{
   						 echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
   						 
   						 echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].'</h3>';
   						 echo "<br>";
   						 echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
   						 echo "<br>";
   						 echo '<h3><a href="u_logout.php">Logout</h3></div>';
   						}
		?>
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
			<a href="profile.html"><button class='nav-button1'>Account</button></a>
	    </li>
	    </ul>
		<p><a href="ad_login.php"><button class='nav-button1'>Admin</button></a></p>
	    <p><a href="login.php"><button class='nav-button1'>Login</button></a></p>
		<p><a href="sign-up.php"><button class='nav-button1'>Signup</button></a></p>
	    </nav>
			<nav class = 'navbartwo'>
	    <ul class='navmenu'>
	    <li class='navitem'

	    >
	    <button class='nav-button'> Headphone </button>

	    </li>
	    <li class='navitem'

	    >
	    <button class='nav-button'>Smartphone</button>

	    </li>
	    <li class='navitem'

	    >
	    <button class='nav-button'>Computer</button>

	    </li>
	    <li class='navitem'

	    >
	    <button class='nav-button'>TV</button>

	</li>
			<li class='navitem'

	    >
	    <button class='nav-button'>More
			<img src="https://i.ibb.co/1vrDrph/icons8-expand-arrow-24.png" alt="down arrow" class="downarrow"> </button>

	    </li>
	    </ul>
	    </nav>
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
						<?php
						


    						echo '<div align="center">'.$login_button . '</div>';
  						?>
						
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