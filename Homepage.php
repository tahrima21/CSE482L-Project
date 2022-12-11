<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" href="styles.css">
    <link href="http://fonts.cdnfonts.com/css/bukhari-script" rel="stylesheet">
	<link rel="stylesheet" href="page.css">
		<title>Home</title>
	</head>
	<body>
		<div class="navcontainer">
			<nav class = 'navbar'>
				<img src="https://i.ibb.co/G78rr2S/logo.png" alt="logo" class="logo">
				<a href="Homepage.html"><p style="text-decoration: none;">TechRev</p></a>
	    <ul class='navmenuone'>
	    <li class='navitem'>
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
	    </li>
	    <li class='navitem'>
			<a href="login.php"><button class='nav-button1'>Account</button></a>
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
					<img class="lazy-load" src="https://i.ibb.co/9Wj1rMq/tv.jpg" alt="tv">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/7kskYFG/cam2.jpg" alt="dslr">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/hcr0xCw/laptop.jpg" alt="laptop">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/T1Wc8fZ/headphone.jpg" alt="headphone">
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
					<img class="lazy-load" src="https://i.ibb.co/ZmpBT2G/headphone2.jpg" alt="headphone">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/q9Tcv5M/tv2.jpg" alt="tv">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/Tvfqmpn/phone.jpg" alt="phone">
				</div>
				<div class="slide">
					<img class="lazy-load" src="https://i.ibb.co/j6vpHtR/cam.jpg" alt="camera">
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
				<img class="lazy-load" src="https://i.ibb.co/yB71mGS/laptop2.jpg" alt="laptop">
			</div>
			<div class="slide">
				<img class="lazy-load" src="https://i.ibb.co/q0Pw7MZ/phone2.jpg" alt="phone">
			</div>
			<div class="slide">
				<img class="lazy-load" src="https://i.ibb.co/Tvfqmpn/phone.jpg" alt="phone">
			</div>
			<div class="slide">
				<img class="lazy-load" src="https://i.ibb.co/j6vpHtR/cam.jpg" alt="camera">
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
