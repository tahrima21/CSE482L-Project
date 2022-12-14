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
	
		<title>Admin</title>
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
					<a href="ad_dash.php"><i class='bx bxs-objects-vertical-center'></i><span class="menu-titles">Stats</span></a>
				</li>
				<li class="it" >
					<a  href="ad_profile.php"><i class='bx bxs-user-circle'></i><span class="menu-titles">Profile</span></a>
				</li>
				<li class="it">
					<a  href="req_que.php"><i class='bx bxs-message-square-edit'></i><span class="menu-titles">Request Queue</span></a>
				</li>
				<li class="it" >
					<a  href="ad-logout.php"><i class='bx bxs-exit'></i><span class="menu-titles">Logout</span></a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
			<div class="que">
                <h3>List of Requests</h3>
                <div class = "class-body">
					<!--Query section-->
                    <?php
                        $query = "SELECT * FROM product_req";
                        $query_run = mysqli_query($conn,$query);
                    ?>
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>REQ ID</th>
								<th>User ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Details</th>
								<th>Image</th>
                                <th>Accept</th>
                                <th>Decline</th>
                            </tr>
                        </thead>
                        <tbody class = "tbd">
							<!--Showing data on table-->
						<?php
                                if(mysqli_num_rows($query_run)>0)    //record is there or not
                                {
                                    foreach($query_run as $row)
                                    {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['req_id'];?></td>
												<td><?php echo $row['user_id'];?></td>
                                                <td><?php echo $row['pr_name'];?></td>
												<td><?php echo $row['category'];?></td>
                                                <td><?php echo $row['des'];?></td>
                                                <td><?php echo "<img src = '".$row['pr_src']."' height = '100' width = '100'/>";?></td>
                                                
                                                <td>
                                    				<a href = "acc_req.php?id=<?=$row['req_id'];?>" class = "btn-acc">Accept</a>
                                				</td>
                                				<td>
                                    				<a href = "del_req.php?id=<?=$row['req_id'];?>" class = "btn-dec">Decline</a>
                                				</td>
                                            </tr> 
                                        <?php
                                    }
                                }
                                else{
                                    ?>
                                    <tr>
                                        <td>No Request Pending</td>
                                    </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
		</div>
		
		<script src = "app.js"></script>
	</body>
</html>