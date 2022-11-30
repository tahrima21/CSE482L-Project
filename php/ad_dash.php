<?phpsession_start();?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="srch1.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	
		<title>Admin Dashboard</title>
	</head>
	<body>
		<div class="navcontainer">
			<nav class = 'navbar'>
	            <img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo">
				<a href="Homepage.html"><p style="text-decoration: none;">TechRev</p></a>
	            <ul class='navmenuone'>
	                <li class='navitem'>
					<div class="search-wrap">
            <div class="search-input">
                <select class="autocom-box">
                <option value="option" disabled selected>Search...</option>
                <?php
                // use a while loop to fetch data
                // from the result variable
                // and individually display as an option
                while ($products = mysqli_fetch_array(
                        $result,MYSQLI_ASSOC)):;
            ?>
            <option value="option">
            <?php 
                echo"<a href='pp.php?ID={$products["product_serial"]}'> {$products["title"]}</a>";
                    
                    ?>
            </option>
                <?php
                endwhile;
                // While loop must be terminated
            ?>
                </select>
                <div class="icon"><a href="https://imgbb.com/"><img src="https://i.ibb.co/fGgCtjy/search.png" alt="search" height="16px" width="16px"></a></div>
            </div>

        </div>
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
		<div class="side_dash" id="pic">
			<header class="d-items head" style="font-size: larger; color:#4E944F; font-weight: bold;">My Account</header>
			<ul class="d-items">
				<li class="it" >
					<a href="ad_dash.php"><i class='bx bxs-objects-vertical-center'></i>Stats</a>
				</li>
				<li class="it" >
					<a  href="ad_profile.php"><i class='bx bxs-user-circle'></i>Profile</a>
				</li>
				<li class="it">
					<a  href="req_que.php"><i class='bx bxs-message-square-edit'></i>Request Queue</a>
				</li>
				<li class="it" >
					<a  href="ad-logout.php"><i class='bx bxs-exit'></i>Logout</a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
				<div class="stat-cont">
					<div class="stat-dt">
						<div class="crd">
							<h5>Total Products</h5>
							<h1>34</h1>
						</div>
					</div>
					<div class="stat-dt">
						<div class="crd">
							<h5>Total Brands</h5>
							<h1>25</h1>
						</div>
					</div>
					<div class="stat-dt">
						<div class="crd">
							<h5>Total Reviews</h5>
							<h1>500</h1>
						</div>
					</div>
				</div>
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>