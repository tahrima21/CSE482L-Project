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
	
		<title>User</title>
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
				<li class="it">
					<a  href="req_stat.php"><i class='bx bxs-bell-ring'></i>Request Status</a>
				</li>
				<li class="it" >
					<a  href="u_logout.php"><i class='bx bxs-exit'></i>Logout</a>
				</li>
			</ul>
		</div>
		<div class = "review-form">
			<div class="que">
                <h3>Request Status</h3>
                <div class = "class-body">
					<!--Query section-->
                    <?php
                        $user_id = $_SESSION["ID"];
                        $query = "SELECT * FROM confirm_message WHERE us_id = '$user_id'";
                        $query_run = mysqli_query($conn,$query);
                    ?>
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Request ID</th>
                                <th>Product Name</th>
                                <th>Status</th>
                                <th>Clear</th>
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
                                                <td><?php echo $row['m_id'];?></td>
												<td><?php echo $row['pr_name'];?></td>
                                                <td>
                                                    <?php 
                                                        if($row['stat']==0)
                                                        {
                                                            echo '<span class="btn-pending">Pending...</span>';
                                                        }
                                                        else if($row['stat']==1)
                                                        {
                                                            echo '<span class="btn-acc">Approved!!</span>';
                                                        }
                                                        else
                                                        {
                                                            echo '<span class="btn-dec">Rejected!!</span>';
                                                        }
                                                    ?>
                                                </td>
                                                    <?php 
                                                        if($row['stat']!=0)
                                                        { ?>
                                                            <td>
                                                            <a href = "clear_message.php?id=<?=$row['m_id'];?>" class = "btn-dec">Delete</a>
                                                            </td>;
                                                            <?php
                                                        }
                                                    ?>
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