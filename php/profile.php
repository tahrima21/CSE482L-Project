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
		<title>User Profile</title>
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
	    				<a href="Log_Home.php" class='nav-button'>Account</a>
	    			</li>
	            </ul>
	            <p><button class='nav-button'><?php echo $_SESSION["U_name"]?></button></p>
	        </nav>
			<nav class = 'navbartwo'>
	            <ul class='navmenu'>
	                <li class='navitem'>
					<a href = "product_gallery.php?type=headphone"><button class='nav-button'> Headphone </button></a>

	                </li>
	                <li class='navitem'>
					<a href = "product_gallery.php?type=smartphone"><button class='nav-button'>Smartphone</button></a>
                    </li>
	                <li class='navitem'>
					<a href = "product_gallery.php?type=computer"><button class='nav-button'>Computer</button></a>
                    </li>
	                <li class='navitem'>
					<a href = "product_gallery.php?type=TV"><button class='nav-button'>TV</button></a></li>
			        <li class='navitem'>
	                    <button class='nav-button'>More
			            <img src="https://i.ibb.co/1vrDrph/icons8-expand-arrow-24.png" alt="down arrow" class="downarrow"> </button>
                    </li>
	            </ul>
	        </nav>
		</div>
		<div class="side_dash">
			<ul class="d-items">
				<li class="it">
					<a href="user_dash.php" id = ><i class='bx bxs-objects-vertical-center'></i><span class="menu-titles">Reviews</span></a>
				</li>
				<li class="it current">
					<a href="profile.php"><i class='bx bxs-user-circle'></i><span class="menu-titles">Profile</span></a>
				</li>
				<li class="it">
					<a href="product_req.php"><i class='bx bxs-message-square-edit'></i><span class="menu-titles">Product Request</span></a>
				</li>
				<li class="it">
					<a  href="req_stat.php"><i class='bx bxs-bell-ring'></i><span class="menu-titles">Request Status</span></a>
				</li>
				<li class="it">
					<a href="u_logout.php"><i class='bx bxs-exit'></i><span class="menu-titles">Logout</span></a>
				</li>
			</ul>
		</div>
		<div class = "profile-form">
			<div class="form-container">
				<h3>Update Info</h3>
				<form class = "u-edit" action = "profile-update.php" method = "post">
				<div class="in_field">
				<input type="hidden" name ="usrid"  required value = "<?php echo $_SESSION['ID']?>">
			    </div>
				<div class="in_field">
				<input type="text" name ="usrname"  required value = "<?php echo $_SESSION["U_name"]?>">
				</div>
				<div class="in_field">
				<input type="email" name ="email"  required value = "<?php echo $_SESSION["Email"]?>">
				</div>
				<!-- Query for getting the password-->
				<?php
                    $con_query = "SELECT password FROM users WHERE userID=?";
					$con_query_stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($con_query_stmt, $con_query))
					{
						echo "Sql Statement failed";
					}
					else{
						//assign the placeholder original values
						mysqli_stmt_bind_param($con_query_stmt,'i',$_SESSION['ID']);
						//Run
						mysqli_stmt_execute($con_query_stmt);
						$con_query_result = mysqli_stmt_get_result($con_query_stmt);
						//fetch data into variables
						$row2 = mysqli_fetch_array($con_query_result);
						mysqli_stmt_close($con_query_stmt);
                	}
                ?>
				<div class="in_field">	
				<input type="password" name ="psw"  placeholder="Update password?">
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