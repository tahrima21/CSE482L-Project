<?php 
	session_start();
	include_once "dbh-con.php";
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
		<title>Admin Profile</title>
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
	            </ul>
	            <p><button class='nav-button'>ADMIN</button></p>
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
		<div class="side_dash">
			<header class="d-items head" style="font-size: larger; color:#4E944F; font-weight: bold;">My Account</header>
			<ul class="d-items">
				<li class="it">
					<a href="ad_dash.php" id = ><i class='bx bxs-objects-vertical-center'></i>Stats</a>
				</li>
				<li class="it current">
					<a href="ad_profile.php"><i class='bx bxs-user-circle'></i>Profile</a>
				</li>
				<li class="it">
					<a href="req_que.php"><i class='bx bxs-message-square-edit'></i>Request Queue</a>
				</li>
				<li class="it">
					<a href="ad-logout.php"><i class='bx bxs-exit'></i>Logout</a>
				</li>
			</ul>
		</div>
		<div class = "profile-form">
			<div class="form-container">
				<h3>Update Info</h3>
				<form class = "u-edit" action = "ad-update.php" method = "post">
				<div class="in_field">
				<input type="hidden" name ="usrid"  required value = "<?php echo $_SESSION['ID']?>">
			    </div>
				<div class="in_field">
				<input type="email" name ="email"  required value = "<?php echo $_SESSION["Email"]?>">
				</div>
				<!-- Query for getting the password-->
				<?php
                    $con_query = "SELECT password FROM admin WHERE serial='".$_SESSION['ID']."'";
                    $con_query_run = mysqli_query($conn,$con_query);

                    if($con_query_run)
                	{
                        $row2 = mysqli_fetch_array($con_query_run);
                                            }
                ?>
				<div class="in_field">	
				<input type="password" name ="psw"  required value = "<?php echo $row2[0]?>">
				</div>
				<div class="in_field">
				<input type="password" name ="uppsw"  required>
				</div>
				<div class="up-btn">
					<button name = "update">
						Update Info
					</button>
				</div>
				</form>
			</div>
		</div>
	</body>
</html>