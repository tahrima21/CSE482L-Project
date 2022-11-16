<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
		<title>User Dashboard</title>
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
		<div class="side_dash" id="pic">
			<header class="d-items head" style="font-size: larger; color:#4E944F; font-weight: bold;">My Account</header>
			<ul class="d-items">
				<li class="it" >
					<a href="user_dash.php"><i class='bx bxs-objects-vertical-center'></i>Reviews</a>
				</li>
				<li class="it" >
					<a  href="profile.php"><i class='bx bxs-user-circle'></i>Profile</a>
				</li>
				<li class="it">
					<a  href="product_req.php"><i class='bx bxs-message-square-edit'></i>Product Request</a>
				</li>
				<li class="it" >
					<a  href="u_logout.php"><i class='bx bxs-exit'></i>Logout</a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
			<h4 class = "tot_rev">Total 2 reviews</h4>
			<div class="dottedline"></div>
			<div class="rev-cont">
				<div class="pr-dt">
					<h5>ProductName1       ProductBrand1</h5>
					<p>Dummy review 1: kjfnsfowkfpf nksjfwpkpwkcm kdnosjpwdmpmc 
						cjsicnsjlcnslc slcsmponsjlnc ksjda;hdaplbf kajdakdbalkbfkjfnsfowkfpf nksjfwpkpwkcm kdnosjpwdmpmc 
						cjsicnsjlcnslc slcsmponsjlnc ksjda;hdaplbf kajdakdbalkbf
					</p>
					<div class="show-btn">
					<button>
						More
					</button>
					</div>
				</div>
			</div>
			<div class="rev-cont">
				<div class="pr-dt">
					<h5>ProductName2       ProductBrand2</h5>
					<p>Dummy review 1: kjfnsfowkfpf nksjfwpkpwkcm kdnosjpwdmpmc 
						cjsicnsjlcnslc slcsmponsjlnc ksjda;hdaplbf kajdakdbalkbfkjfnsfowkfpf nksjfwpkpwkcm kdnosjpwdmpmc 
						cjsicnsjlcnslc slcsmponsjlnc ksjda;hdaplbf kajdakdbalkbf
					</p>
					<div class="show-btn">
					<button>
						More
					</button>
					</div>
				</div>
			</div>
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>