<?php
	include_once "dbh-con.php";
?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="../styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../page.css">
		<title>Home</title>
	</head>
	<body>
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
			<a href="login.php"><button class='nav-button1'>Account</button></a>
	    </li>
	    </ul>
		<p><a href="ad_login.php"><button class='nav-button1'>Admin</button></a></p>
	    <p><a href="./login.php"><button class='nav-button1'>Login</button></a></p>
		<p><a href="./sign-up.php"><button class='nav-button1'>Signup</button></a></p>
	    </nav>
			<nav class = 'navbartwo'>
	    <ul class='navmenu'>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=headphone"><button class='nav-button'> Headphone </button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=smartphone"><button class='nav-button'>Smartphone</button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=computer"><button class='nav-button'>Computer</button></a>

	    </li>
	    <li class='navitem'

	    >
	    <a href = "product_gallery.php?type=TV"><button class='nav-button'>TV</button></a>

	</li>
			<li class='navitem'

	    >
	    <button class='nav-button'>More
			<img src="https://i.ibb.co/1vrDrph/icons8-expand-arrow-24.png" alt="down arrow" class="downarrow"> </button>

	    </li>
	    </ul>
	    </nav>

		

		</div>
				
			<div class="product-container">
					<!--Query section-->
                    <?php
                        if(isset($_GET['type']))
						{
							$category = $_GET['type'];
                        	$query = "SELECT * FROM products WHERE category = '$category'";
                        	$query_run = mysqli_query($conn,$query);
							if(mysqli_num_rows($query_run)>0)
							{
								foreach($query_run as $row)
								{
									?>
									<div class="prod-card">
                        				<a href = "#">
                            			<?php echo "<img src = '".$row['image']."' width = '60%' height = '50%'>";?>
                        				</a>
                            			<h4 class = "card-title"><?php echo $row['title'];?></h4>
                    				</div>
									<?php
								}
							}
							else
							{
								?>
									<h3 class = "card-title">No Product found</h3>
								<?php
							
							}
						}
					?>
						
						
                    
                    
            </div>



<!--JS file-->
<script>
var x=document.getElementById('login');
var y=document.getElementById('register');
var z=document.getElementById('btn');
function register()
{
	x.style.left='-400px';
	y.style.left='50px';
	z.style.left='100px'

}
function login()
{
	x.style.left='50px';
	y.style.left='450px';
	z.style.left='0px'

}
</script>
<script>

		window.onclick=function(event)
 		{
			if(event.target==document.getElementById("login-form"))
			{
				document.getElementById("login-form").style.display = "none";
			}
		}
</script>

	</body>
</html>