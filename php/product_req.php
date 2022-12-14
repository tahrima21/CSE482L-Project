<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
		<title>Request Product</title>
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
			<div class="req-cont">
                <form action="req-process.php?id=<?= $_SESSION["ID"];?>" method = "post" enctype="multipart/form-data">
				<?php
                        if(isset($_GET["error"]))
                        {
                
                            if($_GET["error"]== "done")
                            {
                                ?>
                                <div class="alert"> 
                                        <strong>Request submitted wait for approval</strong>
                                </div>;
                                <?php
                            }
						}
					?>
					<h4 style="margin-left:280px; color = red;"></h4>
                    <h3>ENTER DATA</h3>
                    <div class="in_fieldnew">
                    <input type="text" name ="p_name" required placeholder = "Enter Product name">
                    </div>
					<div class="in_fieldnew">
                    <input type="text" name ="p_cat" required placeholder = "Enter Product Category">
                    </div>
                    <div class="in_fieldtext">
                        <textarea name = "txt" placeholder="Enter product details...."></textarea>
                    </div>
                    <div class="in_fieldnew">
                    <input type="file" name = "filei" value = "image" class = "form-btn">
                    </div>
                    <div class="up-btn">
                        <button name ="submit">
                            Submit Request
                        </button>
                    </div>
                </form>
            </div>
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>